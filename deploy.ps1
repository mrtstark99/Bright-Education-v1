# ==============================================================================
# 1-Click Deployment Script for Bright Education v1
# Target: brhub-web (VM101, 192.168.0.110)
# ==============================================================================

param(
    [string]$ServerHost = "192.168.0.110",
    [string]$ServerUser = "stark",
    [string]$KeyPath = "C:\Users\user\.ssh\brhub_key",
    [string]$RemoteDir = "/www/wwwroot/blog"
)

$ErrorActionPreference = "Stop"

Write-Host "==========================================================" -ForegroundColor Cyan
Write-Host "  BRIGHT EDUCATION v1 - AUTOMATED PRODUCTION DEPLOYMENT   " -ForegroundColor Cyan
Write-Host "  Target: $ServerUser@$ServerHost:$RemoteDir               " -ForegroundColor Cyan
Write-Host "==========================================================" -ForegroundColor Cyan

# 1. Run local test suite before deploying
Write-Host "`n[1/6] Running regression and feature test suites..." -ForegroundColor Yellow
$test1 = php tests/run_tests.php
if ($LASTEXITCODE -ne 0) {
    Write-Host "[FAIL] Core tests failed! Aborting deployment." -ForegroundColor Red
    exit 1
}
$test2 = php tests/bright_edu_feature_test.php
if ($LASTEXITCODE -ne 0) {
    Write-Host "[FAIL] Bright Education feature tests failed! Aborting deployment." -ForegroundColor Red
    exit 1
}
Write-Host "[OK] All local tests passed cleanly." -ForegroundColor Green

# 2. Test SSH connectivity
Write-Host "`n[2/6] Testing SSH connectivity to $ServerHost..." -ForegroundColor Yellow
$sshCheck = ssh -i $KeyPath -o StrictHostKeyChecking=no -o ConnectTimeout=5 "$ServerUser@$ServerHost" "echo 'SSH_OK'"
if ($sshCheck -ne "SSH_OK") {
    Write-Host "[FAIL] Unable to connect to $ServerHost via SSH. Check network / key." -ForegroundColor Red
    exit 1
}
Write-Host "[OK] SSH connection established." -ForegroundColor Green

# 3. Create server database backup
Write-Host "`n[3/6] Backing up existing database on server..." -ForegroundColor Yellow
ssh -i $KeyPath -o StrictHostKeyChecking=no "$ServerUser@$ServerHost" @"
    sudo mkdir -p $RemoteDir/database/backups
    if [ -f $RemoteDir/database/blog.db ]; then
        sudo cp -p $RemoteDir/database/blog.db $RemoteDir/database/backups/blog.db.\$(date +%Y%m%d_%H%M%S).bak
        echo "[OK] Remote database backed up."
    else
        echo "[INFO] No existing remote database found."
    fi
"@

# 4. Package application
Write-Host "`n[4/6] Creating deployment package..." -ForegroundColor Yellow
$tarFile = "$PSScriptRoot\deploy_package.tar.gz"
if (Test-Path $tarFile) { Remove-Item $tarFile -Force }

# Use tar to bundle all code files
tar --exclude=".git" `
    --exclude="database/blog.db*" `
    --exclude="database/.secret_key" `
    --exclude="error.log" `
    --exclude="*.log" `
    --exclude="deploy_package.tar.gz" `
    -czf $tarFile -C "$PSScriptRoot" .

Write-Host "[OK] Package created: $([math]::Round((Get-Item $tarFile).Length / 1MB, 2)) MB" -ForegroundColor Green

# 5. Transfer & Extract
Write-Host "`n[5/6] Transferring and extracting on remote server..." -ForegroundColor Yellow
scp -i $KeyPath -o StrictHostKeyChecking=no $tarFile "$ServerUser@$ServerHost:/tmp/deploy_package.tar.gz"

ssh -i $KeyPath -o StrictHostKeyChecking=no "$ServerUser@$ServerHost" @"
    set -e
    echo "==> Extracting files to $RemoteDir..."
    sudo mkdir -p $RemoteDir
    sudo tar -xzf /tmp/deploy_package.tar.gz -C $RemoteDir/
    rm -f /tmp/deploy_package.tar.gz

    # Ensure uploads and database folders exist
    sudo mkdir -p $RemoteDir/database $RemoteDir/public/uploads

    # Set ownership and permissions
    sudo chown -R www:www $RemoteDir
    sudo chmod -R 755 $RemoteDir
    sudo chmod -R 775 $RemoteDir/database $RemoteDir/public/uploads

    # Run database migrations
    echo "==> Running database migrations..."
    if [ -f $RemoteDir/database/migrate_bright_edu.php ]; then
        sudo -u www php $RemoteDir/database/migrate_bright_edu.php
    fi
    if [ -f $RemoteDir/database/migrate_consultations_and_qa.php ]; then
        sudo -u www php $RemoteDir/database/migrate_consultations_and_qa.php
    fi

    # Reload PHP-FPM 8.2 and Nginx
    echo "==> Reloading web services..."
    if systemctl is-active --quiet php-fpm-82; then
        sudo systemctl reload php-fpm-82
    elif [ -f /etc/init.d/php-fpm-82 ]; then
        sudo /etc/init.d/php-fpm-82 reload
    fi

    if systemctl is-active --quiet nginx; then
        sudo systemctl reload nginx
    elif [ -f /etc/init.d/nginx ]; then
        sudo /etc/init.d/nginx reload
    fi

    echo "==> Remote server update complete!"
"@

Remove-Item $tarFile -Force

# 6. Verify health
Write-Host "`n[6/6] Verifying live endpoints..." -ForegroundColor Yellow
Start-Sleep -Seconds 2

try {
    $res = Invoke-WebRequest -Uri "https://blog.dev-br.xyz" -UseBasicParsing -TimeoutSec 10
    Write-Host "[SUCCESS] https://blog.dev-br.xyz is LIVE! Status code: $($res.StatusCode) (Bytes: $($res.RawContentLength))" -ForegroundColor Green
} catch {
    Write-Host "[WARNING] Public HTTPS check returned: $_. Testing direct LAN IP..." -ForegroundColor Yellow
    try {
        $lanRes = Invoke-WebRequest -Uri "http://192.168.0.110" -Headers @{ "Host" = "blog.dev-br.xyz" } -UseBasicParsing -TimeoutSec 5
        Write-Host "[SUCCESS] Direct host response: Status $($lanRes.StatusCode)" -ForegroundColor Green
    } catch {
        Write-Host "[ERROR] Could not reach endpoint: $_" -ForegroundColor Red
    }
}

Write-Host "`n==========================================================" -ForegroundColor Cyan
Write-Host "  DEPLOYMENT COMPLETED SUCCESSFULLY!                      " -ForegroundColor Cyan
Write-Host "==========================================================" -ForegroundColor Cyan

#!/usr/bin/env bash
# ==============================================================================
# Linux/CI 1-Click Deployment Script for Bright Education v1
# Target: brhub-web (VM101, 192.168.0.110)
# ==============================================================================

set -euo pipefail

SERVER_HOST="${1:-192.168.0.110}"
SERVER_USER="${2:-stark}"
REMOTE_DIR="${3:-/www/wwwroot/blog}"
SSH_KEY="${SSH_KEY_PATH:-$HOME/.ssh/brhub_key}"

echo "=========================================================="
echo "  BRIGHT EDUCATION v1 - LINUX DEPLOYMENT SCRIPT           "
echo "  Target: $SERVER_USER@$SERVER_HOST:$REMOTE_DIR           "
echo "=========================================================="

echo "==> [1/5] Testing SSH connection to $SERVER_HOST..."
ssh -i "$SSH_KEY" -o StrictHostKeyChecking=no "$SERVER_USER@$SERVER_HOST" "echo 'SSH_OK'"

echo "==> [2/5] Creating remote database backup..."
ssh -i "$SSH_KEY" -o StrictHostKeyChecking=no "$SERVER_USER@$SERVER_HOST" "
    sudo mkdir -p $REMOTE_DIR/database/backups
    if [ -f $REMOTE_DIR/database/blog.db ]; then
        sudo cp -p $REMOTE_DIR/database/blog.db $REMOTE_DIR/database/backups/blog.db.\$(date +%Y%m%d_%H%M%S).bak
        echo '[OK] Database backed up.'
    fi
"

echo "==> [3/5] Packaging and transferring application..."
TMP_ARCHIVE="/tmp/bright_edu_deploy.tar.gz"
tar --exclude=".git" \
    --exclude="database/blog.db*" \
    --exclude="database/.secret_key" \
    --exclude="error.log" \
    --exclude="*.log" \
    -czf "$TMP_ARCHIVE" .

scp -i "$SSH_KEY" -o StrictHostKeyChecking=no "$TMP_ARCHIVE" "$SERVER_USER@$SERVER_HOST:/tmp/deploy_package.tar.gz"
rm -f "$TMP_ARCHIVE"

echo "==> [4/5] Extracting & Applying Updates..."
ssh -i "$SSH_KEY" -o StrictHostKeyChecking=no "$SERVER_USER@$SERVER_HOST" "
    set -e
    sudo mkdir -p $REMOTE_DIR
    sudo tar -xzf /tmp/deploy_package.tar.gz -C $REMOTE_DIR/
    rm -f /tmp/deploy_package.tar.gz

    sudo mkdir -p $REMOTE_DIR/database $REMOTE_DIR/public/uploads
    sudo chown -R www:www $REMOTE_DIR
    sudo chmod -R 755 $REMOTE_DIR
    sudo chmod -R 775 $REMOTE_DIR/database $REMOTE_DIR/public/uploads

    echo '==> Running migrations...'
    if [ -f $REMOTE_DIR/database/migrate_bright_edu.php ]; then
        sudo -u www php $REMOTE_DIR/database/migrate_bright_edu.php
    fi
    if [ -f $REMOTE_DIR/database/migrate_consultations_and_qa.php ]; then
        sudo -u www php $REMOTE_DIR/database/migrate_consultations_and_qa.php
    fi

    echo '==> Reloading web services...'
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
"

echo "==> [5/5] Performing health check..."
HTTP_CODE=$(curl -sk -o /dev/null -w "%{http_code}" https://blog.dev-br.xyz || echo "000")
echo "HTTP Response: $HTTP_CODE"
if [ "$HTTP_CODE" -eq 200 ] || [ "$HTTP_CODE" -eq 301 ] || [ "$HTTP_CODE" -eq 302 ]; then
    echo "==> DEPLOYMENT SUCCESSFUL! Website is online."
else
    echo "==> Health check warning: returned code $HTTP_CODE"
fi

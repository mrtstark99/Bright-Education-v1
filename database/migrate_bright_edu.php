<?php
/**
 * @file database/migrate_bright_edu.php
 * @description Migration script creating services and contacts tables with baseline seeds.
 *
 * Layer:
 * - Persistence / Database Migration
 *
 * Responsibilities:
 * - Provision `services` table schema and indexes.
 * - Provision `contacts` table schema and indexes.
 * - Seed default study abroad service packages.
 * - Ensure idempotent execution for subsequent runs.
 *
 * Security:
 * - Safe SQLite DDL execution with parameter binding for seed inserts.
 *
 * Dependencies:
 * - PDO SQLite database instance from Database::getInstance().
 *
 * Constraints:
 * - Keep this file focused on a single responsibility.
 * - Keep this file under 300 lines whenever practical.
 * - All comments and documentation must be written in English.
 * - Follow the project engineering rules.
 *
 * AI Maintenance Rules:
 * - Preserve existing behavior unless change is explicitly required.
 * - Update this header if responsibilities or dependencies change.
 * - Do not place secrets, credentials, or sensitive data in this file.
 */

require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/config/database.php';

try {
    $db = Database::getInstance();
    echo "Starting Bright-Education-v1 schema migration...\n";

    // 1. Create services table
    $db->exec("
        CREATE TABLE IF NOT EXISTS services (
            id             INTEGER PRIMARY KEY AUTOINCREMENT,
            name           TEXT,
            title          TEXT NOT NULL,
            slug           TEXT UNIQUE NOT NULL,
            description    TEXT,
            content        TEXT,
            icon           TEXT,
            price          REAL DEFAULT 0,
            display_order  INTEGER NOT NULL DEFAULT 0,
            status         TEXT NOT NULL DEFAULT 'active' CHECK(status IN ('active','inactive')),
            created_at     TEXT NOT NULL DEFAULT (datetime('now','localtime')),
            updated_at     TEXT NOT NULL DEFAULT (datetime('now','localtime'))
        );
        CREATE INDEX IF NOT EXISTS idx_services_slug   ON services(slug);
        CREATE INDEX IF NOT EXISTS idx_services_status ON services(status);
        CREATE INDEX IF NOT EXISTS idx_services_order  ON services(display_order);
    ");
    echo "[OK] Table 'services' checked/created.\n";

    // 2. Create contacts table
    $db->exec("
        CREATE TABLE IF NOT EXISTS contacts (
            id             INTEGER PRIMARY KEY AUTOINCREMENT,
            name           TEXT NOT NULL,
            email          TEXT NOT NULL,
            phone          TEXT,
            subject        TEXT,
            message        TEXT,
            intake_period  TEXT,
            japanese_level TEXT,
            status         TEXT NOT NULL DEFAULT 'new' CHECK(status IN ('new','read','replied','processing','completed','archived')),
            assigned_to    INTEGER,
            notes          TEXT,
            ip_address     TEXT,
            user_agent     TEXT,
            created_at     TEXT NOT NULL DEFAULT (datetime('now','localtime')),
            updated_at     TEXT NOT NULL DEFAULT (datetime('now','localtime')),
            FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
        );
        CREATE INDEX IF NOT EXISTS idx_contacts_status  ON contacts(status);
        CREATE INDEX IF NOT EXISTS idx_contacts_created ON contacts(created_at);
    ");
    echo "[OK] Table 'contacts' checked/created.\n";

    // 3. Seed baseline services if table is empty
    $count = (int)$db->query("SELECT COUNT(*) FROM services")->fetchColumn();
    if ($count === 0) {
        $stmt = $db->prepare("
            INSERT INTO services (name, title, slug, description, content, icon, price, display_order, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'active')
        ");

        $defaultServices = [
            [
                'Du học Trường Nhật ngữ',
                'Chương trình Du học Trường Nhật ngữ',
                'du-hoc-truong-nhat-ngu',
                'Khóa học tiếng Nhật tập trung từ 1.5 - 2 năm tại các thành phố lớn của Nhật Bản (Tokyo, Osaka, Fukuoka, Nagoya).',
                '<p>Chương trình phù hợp cho các bạn học sinh vừa tốt nghiệp THPT, sinh viên đại học mong muốn nâng cao năng lực tiếng Nhật đạt chuẩn N2 - N1 để chuyển tiếp lên chuyên ngành hoặc đi làm tại Nhật Bản.</p>',
                'bi-translate',
                15000000,
                1
            ],
            [
                'Du học Trường Chuyên môn (Senmon)',
                'Chương trình Du học Trường Chuyên môn (Senmon)',
                'du-hoc-truong-chuyen-mon-senmon',
                'Đào tạo nghề thực hành 2-3 năm với các chuyên ngành CNTT, Điều dưỡng, Cơ khí ô tô, Du lịch khách sạn.',
                '<p>Cấp bằng Chuyên môn gia (Senmonshi) có giá trị quốc tế, hỗ trợ 100% giới thiệu việc làm chính thức tại các tập đoàn Nhật Bản ngay sau khi tốt nghiệp.</p>',
                'bi-briefcase',
                20000000,
                2
            ],
            [
                'Du học Kỹ năng đặc định (SSW)',
                'Chương trình Du học Kỹ năng đặc định (SSW)',
                'du-hoc-ky-nang-dac-dinh-ssw',
                'Chuyển đổi visa kỹ năng đặc định diện 1 và 2, làm việc dài hạn với mức thu nhập tương đương người bản xứ.',
                '<p>Dành cho học viên đã có chứng chỉ tiếng Nhật N4 và đỗ kỳ thi kỹ năng tay nghề tương ứng theo quy định của Cục Quản lý Xuất nhập cảnh Nhật Bản.</p>',
                'bi-tools',
                18000000,
                3
            ],
            [
                'Du học Đại học & Cao học Nhật Bản',
                'Chương trình Du học Đại học & Cao học Nhật Bản',
                'du-hoc-dai-hoc-va-cao-hoc',
                'Luyện thi EJU, săn học bổng MEXT, JASSO và ứng tuyển trực tiếp vào các trường đại học quốc lập và tư thục hàng đầu.',
                '<p>Hỗ trợ chuẩn bị đề cương nghiên cứu, kết nối giáo sư hướng dẫn, phỏng vấn và hoàn thiện hồ sơ học bổng toàn phần/bán phần.</p>',
                'bi-mortarboard',
                25000000,
                4
            ]
        ];

        foreach ($defaultServices as $svc) {
            $stmt->execute($svc);
        }
        echo "[OK] Seeded 4 default study abroad services.\n";
    } else {
        echo "[INFO] Table 'services' already has $count records, skipping seed.\n";
    }

    echo "Migration completed successfully!\n";
} catch (Exception $e) {
    echo "[ERROR] Migration failed: " . $e->getMessage() . "\n";
    exit(1);
}
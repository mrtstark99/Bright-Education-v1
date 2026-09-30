<?php
/**
 * @file app/Models/Service.php
 * @description Service model for study abroad packages and consulting programs.
 *
 * Layer:
 * - Domain / Persistence Model
 *
 * Responsibilities:
 * - Query active service packages for public frontend presentation.
 * - Retrieve individual service details by ID or slug.
 * - Support administration CRUD workflows for services.
 *
 * Security:
 * - All queries use parameterized PDO prepared statements to eliminate SQL injection.
 *
 * Dependencies:
 * - Database singleton for SQLite PDO connection.
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

namespace Models;

use Database;
use PDO;

class Service {
    /**
     * Retrieve all active services for frontend display.
     *
     * @return array
     */
    /**
     * Alias for getActive().
     *
     * @return array
     */
    public static function getAllActive() {
        return self::getActive();
    }

    /**
     * Alias for findBySlug().
     *
     * @param string $slug
     * @return array|null
     */
    public static function getBySlug($slug) {
        return self::findBySlug($slug);
    }

    public static function getActive() {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT * FROM services 
            WHERE status = 'active' 
            ORDER BY display_order ASC, id ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieve all services for administrative dashboard with pagination.
     *
     * @param int $page
     * @param int $perPage
     * @param string $search
     * @return array
     */
    public static function getPaginated($page = 1, $perPage = 20, $search = '') {
        $db = Database::getInstance();
        $offset = ($page - 1) * $perPage;
        $where = [];
        $params = [];

        if (!empty($search)) {
            $where[] = "(title LIKE ? OR name LIKE ? OR description LIKE ?)";
            $term = '%' . $search . '%';
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        $whereClause = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

        $countStmt = $db->prepare("SELECT COUNT(*) FROM services $whereClause");
        $countStmt->execute($params);
        $total = (int)$countStmt->fetchColumn();

        $query = "
            SELECT * FROM services 
            $whereClause 
            ORDER BY display_order ASC, id ASC 
            LIMIT $perPage OFFSET $offset
        ";
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'items' => $items,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => (int)ceil($total / $perPage)
        ];
    }

    /**
     * Find service by primary ID.
     *
     * @param int $id
     * @return array|null
     */
    public static function findById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM services WHERE id = ? LIMIT 1");
        $stmt->execute([(int)$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Find service by unique URL slug.
     *
     * @param string $slug
     * @return array|null
     */
    public static function findBySlug($slug) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM services WHERE slug = ? LIMIT 1");
        $stmt->execute([$slug]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Create a new service record.
     *
     * @param array $data
     * @return int Inserted ID
     */
    public static function create(array $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            INSERT INTO services (name, title, slug, description, content, icon, price, display_order, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['name'] ?? '',
            $data['title'],
            $data['slug'],
            $data['description'] ?? '',
            $data['content'] ?? '',
            $data['icon'] ?? 'bi-briefcase',
            (float)($data['price'] ?? 0),
            (int)($data['display_order'] ?? 0),
            $data['status'] ?? 'active'
        ]);
        return (int)$db->lastInsertId();
    }

    /**
     * Update an existing service record.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public static function update($id, array $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            UPDATE services SET 
                name = ?, title = ?, slug = ?, description = ?, content = ?,
                icon = ?, price = ?, display_order = ?, status = ?,
                updated_at = datetime('now','localtime')
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['name'] ?? '',
            $data['title'],
            $data['slug'],
            $data['description'] ?? '',
            $data['content'] ?? '',
            $data['icon'] ?? 'bi-briefcase',
            (float)($data['price'] ?? 0),
            (int)($data['display_order'] ?? 0),
            $data['status'] ?? 'active',
            (int)$id
        ]);
    }

    /**
     * Delete service by ID.
     *
     * @param int $id
     * @return bool
     */
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM services WHERE id = ?");
        return $stmt->execute([(int)$id]);
    }
}
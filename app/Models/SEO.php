<?php
/**
 * SEO planning data models: keyword mapping & topic clustering
 */

namespace Models;

use Database;
use PDO;

class SEO {
    // Clusters
    public static function getClusters() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM seo_topic_clusters ORDER BY planning_month DESC, name ASC");
        return $stmt->fetchAll();
    }

    public static function createCluster($planningMonth, $name, $pillarTitle, $pillarUrl = '', $description = '') {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            INSERT INTO seo_topic_clusters (planning_month, name, pillar_title, pillar_url, description)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$planningMonth, $name, $pillarTitle, $pillarUrl, $description]);
    }

    // Keywords
    public static function getKeywords() {
        $db = Database::getInstance();
        $stmt = $db->query("
            SELECT k.*, c.name as cluster_name 
            FROM seo_keyword_map k 
            LEFT JOIN seo_topic_clusters c ON k.cluster_id = c.id 
            ORDER BY k.planning_month DESC, k.keyword ASC
        ");
        return $stmt->fetchAll();
    }

    public static function findKeywordById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM seo_keyword_map WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function findKeywordByVal($month, $kw) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM seo_keyword_map WHERE planning_month = ? AND keyword = ? LIMIT 1");
        $stmt->execute([$month, $kw]);
        return $stmt->fetch();
    }

    public static function createKeyword($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            INSERT INTO seo_keyword_map (planning_month, keyword, intent, target_url, cluster_id, content_role, priority, status, notes)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['planning_month'], $data['keyword'], $data['intent'] ?? 'informational', $data['target_url'] ?? null,
            $data['cluster_id'] ?? null, $data['content_role'] ?? 'satellite', $data['priority'] ?? 'medium',
            $data['status'] ?? 'idea', $data['notes'] ?? null
        ]);
    }

    public static function updateKeyword($id, $fields) {
        $db = Database::getInstance();
        $sets = [];
        $params = [];
        foreach ($fields as $key => $val) {
            $sets[] = "{$key} = ?";
            $params[] = $val;
        }
        $params[] = $id;
        $sql = "UPDATE seo_keyword_map SET " . implode(", ", $sets) . ", updated_at = datetime('now','localtime') WHERE id = ?";
        return $db->prepare($sql)->execute($params);
    }

    public static function deleteKeyword($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM seo_keyword_map WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

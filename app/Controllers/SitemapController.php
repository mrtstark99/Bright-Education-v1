<?php
/**
 * Sitemap Controller & XML Generator
 */

namespace Controllers;

use Models\Category;

class SitemapController {

    public static function generateSitemapFile(): string {
        $baseUrl = BlogController::getBaseUrl();
        $db = \Database::getInstance();

        // 1. Get all published posts
        $stmt = $db->query("SELECT slug, updated_at, created_at FROM posts WHERE status = 'published' ORDER BY updated_at DESC");
        $posts = $stmt->fetchAll();

        // 2. Get all categories
        $categories = Category::getAll();

        // 3. Get all published pages
        $stmtPages = $db->query("SELECT slug, updated_at, created_at FROM pages WHERE status = 'published' ORDER BY sort_order ASC, updated_at DESC");
        $pages = $stmtPages->fetchAll();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Homepage
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$baseUrl}/</loc>\n";
        $xml .= "    <changefreq>daily</changefreq>\n";
        $xml .= "    <priority>1.0</priority>\n";
        $xml .= "  </url>\n";

        // Static Pages
        foreach ($pages as $p) {
            $pUrl = htmlspecialchars("{$baseUrl}/page/{$p['slug']}");
            $pMod = date('c', strtotime($p['updated_at'] ?: $p['created_at']));
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$pUrl}</loc>\n";
            $xml .= "    <lastmod>{$pMod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.85</priority>\n";
            $xml .= "  </url>\n";
        }

        // Category pages
        foreach ($categories as $cat) {
            $catUrl = htmlspecialchars("{$baseUrl}/category/{$cat['slug']}");
            $catMod = date('c', strtotime($cat['updated_at'] ?? $cat['created_at'] ?? 'now'));
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$catUrl}</loc>\n";
            $xml .= "    <lastmod>{$catMod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.8</priority>\n";
            $xml .= "  </url>\n";
        }

        // Post pages
        foreach ($posts as $post) {
            $postUrl = htmlspecialchars("{$baseUrl}/blog/{$post['slug']}");
            $lastmod = date('c', strtotime($post['updated_at'] ?: $post['created_at']));
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$postUrl}</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.9</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        @file_put_contents(APP_ROOT . '/public/sitemap.xml', $xml);
        return $xml;
    }

    public function sitemap() {
        header("Content-Type: application/xml; charset=utf-8");
        $xml = self::generateSitemapFile();
        echo $xml;
        exit;
    }
}

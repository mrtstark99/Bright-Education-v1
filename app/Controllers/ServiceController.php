<?php
/**
 * @file app/Controllers/ServiceController.php
 * @description Public presentation controller for study abroad services and program packages.
 *
 * Layer:
 * - Presentation / Controller
 *
 * Responsibilities:
 * - Render services catalog page with program cards and pricing tiers.
 * - Render detailed program view with curriculum outline and consultation intake.
 *
 * Security:
 * - Input validation on service URL slug.
 * - Entity encoding on dynamic output.
 *
 * Dependencies:
 * - Models\Service
 * - Helpers (seo_helper, template_helper)
 *
 * Constraints:
 * - Keep this file under 300 lines whenever practical.
 * - All comments and documentation must be written in English.
 * - Follow the project engineering rules.
 *
 * AI Maintenance Rules:
 * - Preserve existing behavior unless change is explicitly required.
 * - Update this header if responsibilities or dependencies change.
 * - Do not place secrets, credentials, or sensitive data in this file.
 */

namespace Controllers;

use Models\Service;

class ServiceController {
    /**
     * Render services directory page (/services).
     */
    public function index() {
        $services = Service::getActive();
        $baseUrl = getSystemBaseUrl();
        $siteTitle = getSetting('site_name', 'Bright Education');

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Dịch Vụ & Chương Trình Du Học - ' . $siteTitle,
            'description' => 'Khám phá các chương trình du học Nhật ngữ, Senmon, Đại học và kỹ năng đặc định.',
            'itemListElement' => array_map(function($svc, $index) use ($baseUrl) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $svc['title'],
                    'url' => "{$baseUrl}/services/{$svc['slug']}"
                ];
            }, $services, array_keys($services))
        ];

        view('blog/services', [
            'services' => $services,
            'page_title' => 'Dịch Vụ & Chương Trình Du Học - ' . $siteTitle,
            'meta_description' => 'Khám phá các gói dịch vụ du học Nhật Bản: trường Nhật ngữ, trường chuyên môn Senmon, SSW và luyện thi Đại học.',
            'canonical_url' => "{$baseUrl}/services",
            'og_type' => 'website',
            'schema_json' => $schema,
            'page_css' => 'home'
        ]);
    }

    /**
     * Render detailed program overview (/services/{slug}).
     *
     * @param string $slug
     */
    public function show($slug) {
        $service = Service::findBySlug($slug);
        if (!$service || $service['status'] !== 'active') {
            header('HTTP/1.0 404 Not Found');
            die('Dịch vụ không tồn tại');
        }

        $allServices = Service::getActive();
        $baseUrl = getSystemBaseUrl();
        $canonicalUrl = "{$baseUrl}/services/{$service['slug']}";

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service['title'],
            'serviceType' => $service['name'] ?? $service['title'],
            'description' => $service['description'],
            'url' => $canonicalUrl,
            'provider' => [
                '@type' => 'EducationalOrganization',
                'name' => getSetting('site_name', 'Bright Education'),
                'url' => "{$baseUrl}/"
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => (float)$service['price'],
                'priceCurrency' => 'VND'
            ]
        ];

        view('blog/service_detail', [
            'service' => $service,
            'all_services' => $allServices,
            'page_title' => $service['title'] . ' - ' . getSetting('site_name', 'Bright Education'),
            'meta_description' => $service['description'] ?: 'Chi tiết chương trình ' . $service['title'],
            'canonical_url' => $canonicalUrl,
            'og_type' => 'website',
            'schema_json' => $schema,
            'page_css' => 'home'
        ]);
    }
}
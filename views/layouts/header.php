<?php
/**
 * @file views/layouts/header.php
 * @description Master layout header integrating navigation and theme setup.
 *
 * Layer:
 * - Presentation / Master Layout
 *
 * Responsibilities:
 * - Initialize SEO titles, canonical URLs, and branding metadata.
 * - Render HTML head and inject responsive navigation components.
 * - Display flash notification banners when present.
 *
 * Security:
 * - Escapes all dynamic meta and branding strings.
 *
 * Dependencies:
 * - template_helper.php and head_meta.php partial.
 *
 * Constraints:
 * - Keep this file focused on layout orchestration.
 * - Keep this file under 300 lines.
 * - All comments and documentation must be written in English.
 * - Follow the project engineering rules.
 *
 * AI Maintenance Rules:
 * - Preserve existing behavior unless change is explicitly required.
 * - Update this header if responsibilities or dependencies change.
 * - Do not place secrets, credentials, or sensitive data in this file.
 */

$siteBaseUrl = getSystemBaseUrl();
$currentUrl = $canonical_url ?? ($siteBaseUrl . ($_SERVER['REQUEST_URI'] ?? '/'));

$siteTitle = getSetting('site_name', 'Bright Education');
$siteSlogan = getSetting('site_slogan', 'Đồng hành cùng học viên Việt Nam du học Nhật Bản');
$siteLogoUrl = getSetting('site_logo_url', '/assets/images/logo.svg');
$siteFaviconUrl = getSetting('site_favicon_url', '/assets/images/favicon.png');
$customHeaderCode = getSetting('custom_header_code', '');

$defaultOgImg = getSetting('default_og_image', '/assets/images/hero-new.webp');
$defaultMetaDesc = getSetting('default_meta_description', $siteSlogan);
$defaultMetaKeys = getSetting('default_meta_keywords', 'du học nhật bản, bright education, học bổng nhật bản');

$pageTitleFull = htmlspecialchars($page_title ?? ($siteTitle . ' | ' . $siteSlogan));
$metaDesc = htmlspecialchars($meta_description ?? $defaultMetaDesc);
$metaKeys = htmlspecialchars($meta_keywords ?? $defaultMetaKeys);
$ogType = htmlspecialchars($og_type ?? 'website');
$ogImg = htmlspecialchars($og_image ?? $defaultOgImg);

$gaId = getSetting('ga_id', '');
$gscVerification = getSetting('gsc_verification', '');

// Load head meta & style definitions
include __DIR__ . '/partials/head_meta.php';
?>
<body class="text-ink font-sans antialiased bg-rice selection:bg-sage-200 selection:text-sage-900">
    <?php 
    // Desktop Navigation Header
    include __DIR__ . '/partials/navbar.php'; 
    
    // Mobile Navigation Drawer
    include __DIR__ . '/partials/mobile_drawer.php'; 
    ?>

    <!-- Global Flash Notification Container -->
    <div class="fixed top-24 right-5 z-[999] max-w-md w-full px-4 pointer-events-none">
        <div class="pointer-events-auto">
            <?php displayFlashMessage(); ?>
        </div>
    </div>
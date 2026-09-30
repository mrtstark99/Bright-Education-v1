<?php
/**
 * @file views/layouts/partials/head_meta.php
 * @description Head meta tags, SEO schema, Open Graph, fonts, and stylesheets.
 *
 * Layer:
 * - Presentation / View Partial
 *
 * Responsibilities:
 * - Render HTML head elements, dynamic meta tags, and Open Graph headers.
 * - Load Google Fonts (Quicksand, Inter) and Bootstrap Icons.
 * - Inject Tailwind CSS client engine with Bright Education design tokens.
 * - Include Post Element Contract stylesheets and Google Analytics when configured.
 *
 * Security:
 * - HTML entity encoding for all user-controllable meta values to prevent XSS.
 *
 * Dependencies:
 * - App configuration constants and getSetting helper.
 * - SchemaBuilder helper for JSON-LD structured data.
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
?>
<!DOCTYPE html>
<html lang="vi" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitleFull; ?></title>
    <meta name="description" content="<?php echo $metaDesc; ?>">
    <?php if ($metaKeys !== ''): ?>
    <meta name="keywords" content="<?php echo $metaKeys; ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($currentUrl); ?>">
    <link rel="icon" type="image/png" href="<?php echo !empty($siteFaviconUrl) ? htmlspecialchars($siteFaviconUrl) : '/assets/images/favicon.png'; ?>">

    <!-- Search Engine & Social Meta Tags -->
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="<?php echo $ogType; ?>">
    <meta property="og:title" content="<?php echo $pageTitleFull; ?>">
    <meta property="og:description" content="<?php echo $metaDesc; ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($currentUrl); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteTitle); ?>">
    <meta property="og:image" content="<?php echo $ogImg; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $pageTitleFull; ?>">
    <meta name="twitter:description" content="<?php echo $metaDesc; ?>">
    <meta name="twitter:image" content="<?php echo $ogImg; ?>">

    <?php if (!empty($gscVerification)): ?>
        <?php if (str_starts_with($gscVerification, '<meta')): ?>
            <?php echo $gscVerification . "\n"; ?>
        <?php else: ?>
            <meta name="google-site-verification" content="<?php echo htmlspecialchars($gscVerification); ?>">
        <?php endif; ?>
    <?php endif; ?>

    <!-- Fonts: Inter for body, Quicksand for headings (Bright Education style) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Tailwind CSS Client Engine & Theme Configuration -->
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
              display: ['Quicksand', 'ui-sans-serif', 'system-ui', 'sans-serif']
            },
            colors: {
              primary: {
                DEFAULT: '#0d243e',
                50: '#f2f5f9',
                100: '#e1e8f0',
                200: '#c5d3df',
                300: '#9bb7ca',
                400: '#6b92af',
                500: '#487596',
                600: '#345b7b',
                700: '#2a4964',
                800: '#253e54',
                900: '#0d243e',
              },
              sage: { 50: '#f2f5f9', 100: '#e1e8f0', 200: '#c5d3df', 300: '#9bb7ca', 400: '#345b7b', 500: '#0d243e', 600: '#0d243e', 900: '#0d243e' },
              sakura: { 50: '#f2f5f9', 100: '#e1e8f0', 200: '#c5d3df', 300: '#9bb7ca', 400: '#345b7b', 500: '#0d243e', 600: '#0d243e', 900: '#0d243e' },
              sand: { 50: '#ffffff', 100: '#f8fafc', 200: '#e2e8f0' },
              midnight: '#0d243e',
              ink: '#111827',
              muted: '#6b7280',
              rice: '#ffffff'
            },
            boxShadow: {
              'soft': '0 4px 20px -2px rgba(1, 53, 103, 0.05)',
              'medium': '0 12px 32px -4px rgba(1, 53, 103, 0.08)',
              'hard': '0 24px 48px -12px rgba(1, 53, 103, 0.12)',
              'tinted': '0 20px 40px -8px rgba(1, 53, 103, 0.15)',
            },
            borderRadius: {
              '4xl': '2rem',
              '5xl': '2.5rem',
              'blob': '40% 60% 70% 30% / 40% 50% 60% 50%',
            }
          }
        }
      }
    </script>

    <!-- Global Component Styles & Home Sections Stylesheet -->
    <link rel="stylesheet" href="/assets/css/components.css?v=<?php echo file_exists(APP_ROOT . '/public/assets/css/components.css') ? filemtime(APP_ROOT . '/public/assets/css/components.css') : '1.0'; ?>">
    <link rel="stylesheet" href="/assets/css/home.css?v=<?php echo file_exists(APP_ROOT . '/public/assets/css/home.css') ? filemtime(APP_ROOT . '/public/assets/css/home.css') : '1.0'; ?>">

    <!-- Post Element Contract and Blog Stylesheets -->
    <link rel="stylesheet" href="/assets/css/style.css?v=<?php echo file_exists(APP_ROOT . '/public/assets/css/style.css') ? filemtime(APP_ROOT . '/public/assets/css/style.css') : '1.0'; ?>">
    <?php if (($page_css ?? '') === 'post'): ?>
        <?php foreach ([
            'layout_header', 'hero_article_toc', 'typography_toc', 'ui_takeaways_headings',
            'ui_callouts', 'ui_comparisons_tables', 'ui_steps_timeline_metrics',
            'ui_faq_cta_download', 'sidebar_widgets', 'related_author_footer'
        ] as $postStyle):
            $postStyleFile = APP_ROOT . '/public/assets/css/post/' . $postStyle . '.css';
            if (file_exists($postStyleFile)):
        ?>
    <link rel="stylesheet" href="/assets/css/post/<?php echo $postStyle; ?>.css?v=<?php echo filemtime($postStyleFile); ?>">
        <?php endif; endforeach; ?>
    <?php elseif (isset($page_css)): ?>
    <?php $pageStyleFile = APP_ROOT . '/public/assets/css/' . $page_css . '.css'; ?>
    <link rel="stylesheet" href="/assets/css/<?php echo htmlspecialchars($page_css); ?>.css?v=<?php echo is_file($pageStyleFile) ? filemtime($pageStyleFile) : '1'; ?>">
    <?php endif; ?>

    <style>
      /* Enforce Quicksand for headings */
      h1, h2, h3, h4, h5, h6 { font-family: 'Quicksand', ui-sans-serif, system-ui, sans-serif !important; }
      table th, table td { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; }
    </style>

    <!-- Structured Data (Schema JSON-LD) -->
    <?php if (isset($schema_json) && !empty($schema_json)): ?>
    <script type="application/ld+json">
    <?php echo json_encode($schema_json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <?php else: ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "Bright Education",
      "url": "<?php echo htmlspecialchars($siteBaseUrl, ENT_QUOTES, 'UTF-8'); ?>/",
      "logo": "<?php echo htmlspecialchars($siteBaseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/images/logo.svg",
      "description": "<?php echo htmlspecialchars($siteSlogan); ?>",
      "inLanguage": "vi-VN"
    }
    </script>
    <?php endif; ?>

    <!-- Google Analytics GA4 -->
    <?php if (!empty($gaId) && preg_match('/^G-[A-Z0-9]+$/', $gaId)): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($gaId); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo htmlspecialchars($gaId); ?>');
    </script>
    <?php endif; ?>

    <?php if (!empty($customHeaderCode)): ?>
        <?php echo $customHeaderCode . "\n"; ?>
    <?php endif; ?>
</head>

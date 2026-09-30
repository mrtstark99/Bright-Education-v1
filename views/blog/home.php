<?php
/**
 * @file views/blog/home.php
 * @description Modernized homepage landing view integrating all promotional and advisory modules.
 *
 * Layer:
 * - Presentation / View Page
 *
 * Responsibilities:
 * - Render Bright Education corporate landing page.
 * - Compose modular sections (Hero, Trust, Programs, Process, Info Portal, Calculator, Blog, Zoom, Contact).
 * - Display active announcements and recent published blog content.
 *
 * Security:
 * - Safe rendering with all form handlers using CSRF verification.
 *
 * Dependencies:
 * - Master header/footer layouts and partial home sections.
 *
 * Constraints:
 * - Keep this file focused on section orchestration.
 * - Keep this file under 300 lines.
 * - All comments and documentation must be written in English.
 * - Follow the project engineering rules.
 *
 * AI Maintenance Rules:
 * - Preserve existing behavior unless change is explicitly required.
 * - Update this header if responsibilities or dependencies change.
 * - Do not place secrets, credentials, or sensitive data in this file.
 */

include APP_ROOT . '/views/layouts/header.php';
?>

<main id="hero" class="w-full overflow-hidden">
  <!-- 1. Hero Banner Section -->
  <?php include __DIR__ . '/home_sections/hero.php'; ?>

  <!-- 2. Trust Commitment Bar -->
  <section class="home-trust py-6 bg-slate-50 border-y border-slate-100" aria-label="Cam kết của Bright Education">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-white shadow-soft border border-slate-100/80">
          <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-2xl flex-shrink-0">
            <i class="bi bi-person-check"></i>
          </div>
          <div>
            <strong class="block text-sm font-bold text-primary font-display">Tư vấn 1–1</strong>
            <small class="text-xs text-muted">Lộ trình theo từng hồ sơ</small>
          </div>
        </div>

        <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-white shadow-soft border border-slate-100/80">
          <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-2xl flex-shrink-0">
            <i class="bi bi-receipt"></i>
          </div>
          <div>
            <strong class="block text-sm font-bold text-primary font-display">Chi phí minh bạch</strong>
            <small class="text-xs text-muted">Dự toán rõ ngay từ đầu</small>
          </div>
        </div>

        <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-white shadow-soft border border-slate-100/80">
          <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-2xl flex-shrink-0">
            <i class="bi bi-file-earmark-check"></i>
          </div>
          <div>
            <strong class="block text-sm font-bold text-primary font-display">Hồ sơ trọn gói</strong>
            <small class="text-xs text-muted">Theo sát từng cột mốc</small>
          </div>
        </div>

        <div class="flex items-center gap-3.5 p-4 rounded-2xl bg-white shadow-soft border border-slate-100/80">
          <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-2xl flex-shrink-0">
            <i class="bi bi-globe2"></i>
          </div>
          <div>
            <strong class="block text-sm font-bold text-primary font-display">Hỗ trợ Việt – Nhật</strong>
            <small class="text-xs text-muted">Đồng hành trước và sau nhập cảnh</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. Programs Section -->
  <?php include __DIR__ . '/home_sections/programs.php'; ?>

  <!-- 4. 7-Step Process Section -->
  <?php include __DIR__ . '/home_sections/process_steps.php'; ?>

  <!-- 5. Info Portal & FAQ -->
  <?php include __DIR__ . '/home_sections/info_portal.php'; ?>

  <!-- 6. Cost Calculator -->
  <?php include __DIR__ . '/home_sections/cost_calculator.php'; ?>

  <!-- 7. Recent Blog Insights -->
  <?php include __DIR__ . '/home_sections/blog_preview.php'; ?>

  <!-- 8. Interactive Zoom Sessions -->
  <?php include __DIR__ . '/home_sections/zoom_sessions.php'; ?>

  <!-- 9. Fast Contact Consultation Form -->
  <?php include __DIR__ . '/home_sections/contact_form.php'; ?>

  <!-- Floating Scrollspy Quick Navigator -->
  <?php include __DIR__ . '/home_sections/scrollspy.php'; ?>
</main>

<?php include APP_ROOT . '/views/layouts/footer.php'; ?>
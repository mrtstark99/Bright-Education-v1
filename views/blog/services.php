<?php
/**
 * @file views/blog/services.php
 * @description Study abroad services catalog view with package cards and pricing table.
 *
 * Layer:
 * - Presentation / View Page
 *
 * Responsibilities:
 * - Render promotional service packages with feature checklists.
 * - Render pricing comparison matrix.
 * - Provide direct call-to-actions linking to inquiry intake.
 *
 * Security:
 * - Sanitized rendering of titles and descriptions.
 *
 * Dependencies:
 * - Layout master header and footer.
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

include APP_ROOT . '/views/layouts/header.php';

$packageImages = [
    'du-hoc-truong-nhat-ngu' => '/assets/images/program_language.jpg',
    'du-hoc-truong-chuyen-mon-senmon' => '/assets/images/program_senmon.jpg',
    'du-hoc-ky-nang-dac-dinh-ssw' => '/assets/images/program_ssw.jpg',
    'du-hoc-dai-hoc-va-cao-hoc' => '/assets/images/program_university.webp',
];
?>

<main class="pt-24 bg-slate-50 min-h-screen pb-20">
  <!-- Page Header / Hero -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 mt-6 mb-16">
    <div class="flex flex-col lg:flex-row gap-12 items-center">
      <!-- Left Text -->
      <div class="w-full lg:w-1/2 pr-0 lg:pr-8 text-center lg:text-left">
        <span class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-4 py-1.5 text-xs font-bold text-primary uppercase tracking-widest mb-6">
          <i class="bi bi-compass"></i> Dịch vụ chuyên nghiệp
        </span>
        <h1 class="text-4xl lg:text-5xl font-black leading-[1.2] mb-6 text-primary font-display">
          Tối ưu chi phí, <br class="hidden lg:block"> <span class="text-amber-600 drop-shadow-sm">quy trình linh hoạt</span>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 mb-8 font-medium leading-relaxed max-w-xl mx-auto lg:mx-0">
          Các gói dịch vụ chuyên nghiệp, minh bạch và tiết kiệm chi phí giúp bạn hoàn thành mọi thủ tục đi Nhật một cách nhanh chóng và an tâm tuyệt đối.
        </p>
        <a href="/contact" class="inline-flex px-8 py-4 bg-primary text-white font-bold rounded-full text-sm hover:bg-slate-800 transition-all shadow-md hover:-translate-y-0.5">
          Nhận Tư Vấn Miễn Phí
        </a>
      </div>

      <!-- Right Image Banner -->
      <div class="w-full lg:w-1/2 relative mt-4 lg:mt-0">
        <div class="absolute -inset-4 bg-primary-50 rounded-[3rem] -z-10 transform rotate-2"></div>
        <img src="/assets/images/hero-new.webp" alt="Dịch vụ Bright Education" class="w-full h-[320px] lg:h-[420px] object-cover rounded-[2.5rem] shadow-hard">
      </div>
    </div>
  </section>

  <!-- Service Cards Section -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 mb-24">
    <div class="flex flex-col gap-8 w-full">
      <?php foreach ($services as $index => $svc): 
        $img = $packageImages[$svc['slug']] ?? '/assets/images/program_language.jpg';
      ?>
      <div class="bg-white rounded-[2.5rem] p-4 shadow-soft hover:shadow-medium transition-all border border-slate-100 flex flex-col md:flex-row items-stretch gap-6 group">
        <!-- Image Card -->
        <div class="w-full md:w-1/3 shrink-0 rounded-[2rem] overflow-hidden relative min-h-[240px] md:min-h-[280px]">
          <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($svc['title']); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-primary/45 to-transparent"></div>
          <div class="absolute bottom-6 left-6 right-6 text-left">
            <div class="w-12 h-12 bg-white/20 backdrop-blur-md text-white rounded-2xl flex items-center justify-center mb-3 border border-white/30 shadow-sm">
              <i class="bi <?php echo htmlspecialchars($svc['icon'] ?: 'bi-briefcase'); ?> text-2xl"></i>
            </div>
            <h2 class="text-xl lg:text-2xl font-black text-white leading-tight font-display"><?php echo htmlspecialchars($svc['title']); ?></h2>
          </div>
        </div>

        <!-- Description & Features -->
        <div class="w-full md:w-5/12 flex flex-col justify-center py-4 px-2 lg:px-4">
          <p class="text-slate-500 text-sm mb-6 leading-relaxed font-medium">
            <?php echo htmlspecialchars($svc['description']); ?>
          </p>
          <ul class="space-y-3">
            <li class="flex items-start gap-3 text-sm font-semibold text-slate-700">
              <i class="bi bi-check-circle-fill text-primary text-base shrink-0 mt-0.5"></i>
              <span>Phí xử lý hồ sơ (Dịch thuật, công chứng trọn gói)</span>
            </li>
            <li class="flex items-start gap-3 text-sm font-semibold text-slate-700">
              <i class="bi bi-check-circle-fill text-primary text-base shrink-0 mt-0.5"></i>
              <span>Luyện phỏng vấn visa & phỏng vấn trường đối tác</span>
            </li>
            <li class="flex items-start gap-3 text-sm font-semibold text-slate-700">
              <i class="bi bi-check-circle-fill text-primary text-base shrink-0 mt-0.5"></i>
              <span>Hỗ trợ thủ tục COE và chuyển giao hồ sơ sang Nhật</span>
            </li>
          </ul>
        </div>

        <!-- Price & Action -->
        <div class="w-full md:w-1/4 shrink-0 bg-slate-50 rounded-[2rem] p-6 lg:p-8 flex flex-col justify-between border border-slate-100">
          <div>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Chi phí dự kiến</span>
            <div class="text-2xl lg:text-3xl font-black text-primary font-display mb-2">
              <?php echo $svc['price'] > 0 ? formatMoney($svc['price']) : 'Liên hệ'; ?>
            </div>
            <p class="text-xs text-slate-500 mb-6 font-medium">Chi phí minh bạch, cam kết không phát sinh phụ phí ẩn.</p>
          </div>
          <div class="space-y-2">
            <a href="/services/<?php echo htmlspecialchars($svc['slug']); ?>" class="w-full py-3 bg-white border border-slate-200 hover:border-primary text-primary font-bold rounded-xl text-xs flex items-center justify-center gap-1 transition-all">
              Xem chi tiết <i class="bi bi-chevron-right text-[10px]"></i>
            </a>
            <a href="/contact?service=<?php echo urlencode($svc['title']); ?>" class="w-full py-3 bg-primary hover:bg-slate-800 text-white font-bold rounded-xl text-xs flex items-center justify-center gap-1 shadow-sm transition-all">
              Đăng ký tư vấn
            </a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Pricing Comparison Cards -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 mb-20">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-3">
        <i class="bi bi-tags-fill"></i> Bảng giá minh bạch
      </span>
      <h2 class="text-3xl font-bold text-primary font-display">Các Gói Dịch Vụ Hồ Sơ</h2>
      <p class="text-sm text-muted mt-2">Lựa chọn gói dịch vụ phù hợp với nhu cầu và năng lực tài chính của bạn.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
      <!-- Standard Plan -->
      <div class="rounded-3xl bg-white border border-slate-200/80 p-8 flex flex-col relative shadow-soft hover:shadow-medium transition-all">
        <h4 class="text-xl font-bold text-primary mb-2 font-display">Tiêu Chuẩn</h4>
        <p class="text-xs text-muted mb-6">Đầy đủ thủ tục cơ bản, giải pháp an toàn và tiết kiệm nhất.</p>
        <div class="mb-6">
          <span class="text-3xl font-bold text-primary font-display">15.000.000</span>
          <span class="text-xs text-muted font-bold ml-1">VNĐ</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1 text-xs text-slate-600 font-medium">
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Tư vấn chọn trường và ngành học</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Dịch thuật & công chứng hồ sơ</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Nộp hồ sơ xin tư cách lưu trú (COE)</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Hỗ trợ xin visa tại Đại sứ quán</span></li>
        </ul>
        <a href="/contact?package=standard" class="w-full text-center py-3 rounded-xl border-2 border-slate-200 hover:border-primary text-primary font-bold text-xs transition-colors">
          Đăng ký gói Tiêu chuẩn
        </a>
      </div>

      <!-- Recommended Plan -->
      <div class="rounded-3xl bg-primary text-white p-8 flex flex-col relative shadow-hard transform md:-translate-y-2">
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-amber-400 text-slate-900 px-4 py-1 rounded-full text-[11px] font-black uppercase tracking-wider shadow-md">
          <i class="bi bi-star-fill mr-1"></i>Khuyên Dùng
        </div>
        <h4 class="text-xl font-bold text-white mb-2 font-display mt-2">An Tâm</h4>
        <p class="text-xs text-primary-200 mb-6">Trọn gói từ A-Z, đồng hành trước và sau khi nhập cảnh.</p>
        <div class="mb-6">
          <span class="text-3xl font-bold text-white font-display">20.000.000</span>
          <span class="text-xs text-primary-200 font-bold ml-1">VNĐ</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1 text-xs text-primary-100 font-medium">
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-amber-400"></i><span>Bao gồm toàn bộ quyền lợi Gói Tiêu Chuẩn</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-amber-400"></i><span>Luyện phỏng vấn 1-1 không giới hạn</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-amber-400"></i><span>Hỗ trợ tìm nhà ở, ký túc xá bên Nhật</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-amber-400"></i><span>Đón sân bay và làm thẻ cư trú tại Nhật</span></li>
        </ul>
        <a href="/contact?package=antam" class="w-full text-center py-3 rounded-xl bg-white text-primary font-bold text-xs hover:bg-slate-100 transition-colors shadow-sm">
          Đăng ký gói An Tâm
        </a>
      </div>

      <!-- VIP Plan -->
      <div class="rounded-3xl bg-white border border-slate-200/80 p-8 flex flex-col relative shadow-soft hover:shadow-medium transition-all">
        <h4 class="text-xl font-bold text-primary mb-2 font-display">Chuyên Sâu</h4>
        <p class="text-xs text-muted mb-6">Luyện thi EJU, săn học bổng và kết nối việc làm chuyên môn.</p>
        <div class="mb-6">
          <span class="text-3xl font-bold text-primary font-display">25.000.000</span>
          <span class="text-xs text-muted font-bold ml-1">VNĐ</span>
        </div>
        <ul class="space-y-3 mb-8 flex-1 text-xs text-slate-600 font-medium">
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Bao gồm toàn bộ quyền lợi Gói An Tâm</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Hướng dẫn hồ sơ săn học bổng MEXT/JASSO</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Định hướng nghề nghiệp và phỏng vấn việc làm</span></li>
          <li class="flex items-start gap-2.5"><i class="bi bi-check-circle-fill text-primary"></i><span>Hỗ trợ pháp lý & gia hạn visa năm 2</span></li>
        </ul>
        <a href="/contact?package=pro" class="w-full text-center py-3 rounded-xl border-2 border-slate-200 hover:border-primary text-primary font-bold text-xs transition-colors">
          Đăng ký gói Chuyên Sâu
        </a>
      </div>
    </div>
  </section>
</main>

<?php include APP_ROOT . '/views/layouts/footer.php'; ?>
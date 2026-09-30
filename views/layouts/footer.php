<?php
/**
 * @file views/layouts/footer.php
 * @description Master corporate footer component.
 *
 * Layer:
 * - Presentation / Master Layout
 *
 * Responsibilities:
 * - Render 4-column corporate footer with branding, quick links, services, and contacts.
 * - Display social media links and phone hotlines (VN and JP).
 * - Inject custom analytics or footer tracking scripts when configured.
 *
 * Security:
 * - Sanitizes dynamic branding settings before output.
 *
 * Dependencies:
 * - getSetting helper and theme tokens.
 *
 * Constraints:
 * - Keep this file under 300 lines.
 * - All comments and documentation must be written in English.
 * - Follow the project engineering rules.
 *
 * AI Maintenance Rules:
 * - Preserve existing behavior unless change is explicitly required.
 * - Update this header if responsibilities or dependencies change.
 * - Do not place secrets, credentials, or sensitive data in this file.
 */

$footerDesc = getSetting('site_footer_desc', 'Đồng hành cùng hàng ngàn học viên Việt Nam trên con đường chinh phục tri thức và xây dựng sự nghiệp tại Nhật Bản.');
$facebookUrl = trim((string)getSetting('facebook_url', 'https://facebook.com'));
$youtubeUrl = trim((string)getSetting('youtube_url', 'https://youtube.com'));
$tiktokUrl = trim((string)getSetting('tiktok_url', ''));
$siteAddress = getSetting('site_address', 'Số 45 ngõ 207 Quang Trung, Phường Thành Đông, TP Hải Phòng, Việt Nam');
$sitePhoneVN = getSetting('site_phone', '+84 0971044576');
$sitePhoneJP = getSetting('site_phone_jp', '+81 08037316436');
$siteEmail = getSetting('site_email', 'contact@brighteducation.net');
$workingHours = getSetting('working_hours', 'Thứ 2 - Thứ 7: 8:00 - 17:30');
$customFooterCode = getSetting('custom_footer_code', '');
?>
  <footer class="bg-primary pt-16 pb-8 border-t border-primary-800 text-white mt-auto">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
        
        <!-- Column 1: Brand & Socials -->
        <div class="space-y-6">
          <a class="flex items-center group" href="/">
            <img src="/assets/images/logo.svg" alt="Bright Education" class="h-14 w-auto transition-transform group-hover:scale-105" style="filter: brightness(0) invert(1);">
          </a>
          <p class="text-primary-100 text-sm leading-relaxed">
            <?php echo htmlspecialchars($footerDesc); ?>
          </p>
          <div class="flex items-center gap-3 pt-2">
            <?php if (!empty($facebookUrl) && $facebookUrl !== '#'): ?>
              <a href="<?php echo htmlspecialchars($facebookUrl); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="h-10 w-10 rounded-full bg-primary-800 flex items-center justify-center text-white hover:bg-white hover:text-primary transition-colors">
                <i class="bi bi-facebook text-lg"></i>
              </a>
            <?php endif; ?>
            <?php if (!empty($youtubeUrl) && $youtubeUrl !== '#'): ?>
              <a href="<?php echo htmlspecialchars($youtubeUrl); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="h-10 w-10 rounded-full bg-primary-800 flex items-center justify-center text-white hover:bg-white hover:text-primary transition-colors">
                <i class="bi bi-youtube text-lg"></i>
              </a>
            <?php endif; ?>
            <?php if (!empty($tiktokUrl) && $tiktokUrl !== '#'): ?>
              <a href="<?php echo htmlspecialchars($tiktokUrl); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok" class="h-10 w-10 rounded-full bg-primary-800 flex items-center justify-center text-white hover:bg-white hover:text-primary transition-colors">
                <i class="bi bi-tiktok text-lg"></i>
              </a>
            <?php endif; ?>
          </div>
        </div>

        <!-- Column 2: Quick Links -->
        <div>
          <h3 class="text-white font-bold font-display tracking-wide mb-6 text-base">Liên Kết Nhanh</h3>
          <ul class="space-y-3 text-sm text-primary-100">
            <li><a href="/" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Trang chủ</a></li>
            <li><a href="/about" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Về chúng tôi</a></li>
            <li><a href="/schools" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Hệ thống trường</a></li>
            <li><a href="/qa" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Hỏi & Đáp</a></li>
            <li><a href="/blog" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Tin tức & Cẩm nang</a></li>
            <li><a href="/contact" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Liên hệ</a></li>
          </ul>
        </div>

        <!-- Column 3: Study Abroad Services -->
        <div>
          <h3 class="text-white font-bold font-display tracking-wide mb-6 text-base">Dịch Vụ Của Chúng Tôi</h3>
          <ul class="space-y-3 text-sm text-primary-100">
            <li><a href="/services" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Tất cả dịch vụ</a></li>
            <li><a href="/courses" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Khóa học tiếng Nhật</a></li>
            <li><a href="/process" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Quy trình thủ tục</a></li>
            <li><a href="/documents" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Kho tài liệu</a></li>
            <li><a href="/cost" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Dự toán chi phí</a></li>
            <li><a href="/consultation" class="hover:text-white transition-colors flex items-center gap-2"><i class="bi bi-chevron-right text-[10px]"></i> Đăng ký tư vấn Zoom</a></li>
          </ul>
        </div>

        <!-- Column 4: Contact Info -->
        <div>
          <h3 class="text-white font-bold font-display tracking-wide mb-6 text-base">Thông Tin Liên Hệ</h3>
          <ul class="space-y-4 text-sm text-primary-100">
            <li class="flex items-start gap-3">
              <i class="bi bi-geo-alt-fill text-white mt-1"></i>
              <span><?php echo htmlspecialchars($siteAddress); ?></span>
            </li>
            <li class="flex items-start gap-3">
              <i class="bi bi-telephone-fill text-white mt-1"></i>
              <div class="flex flex-col gap-1">
                <a href="tel:<?php echo preg_replace('/[^\d+]/', '', $sitePhoneVN); ?>" class="hover:text-white transition-colors">VN: <?php echo htmlspecialchars($sitePhoneVN); ?></a>
                <a href="tel:<?php echo preg_replace('/[^\d+]/', '', $sitePhoneJP); ?>" class="hover:text-white transition-colors">JP: <?php echo htmlspecialchars($sitePhoneJP); ?></a>
              </div>
            </li>
            <li class="flex items-center gap-3">
              <i class="bi bi-envelope-fill text-white"></i>
              <a href="mailto:<?php echo htmlspecialchars($siteEmail); ?>" class="hover:text-white transition-colors"><?php echo htmlspecialchars($siteEmail); ?></a>
            </li>
            <li class="flex items-center gap-3">
              <i class="bi bi-clock-fill text-white"></i>
              <span><?php echo htmlspecialchars($workingHours); ?></span>
            </li>
          </ul>
        </div>

      </div>

      <!-- Bottom Copyright Bar -->
      <div class="pt-8 border-t border-primary-800/60 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-primary-200">
        <p>© <?php echo date('Y'); ?> Bright Education Japan. All rights reserved.</p>
        <div class="flex gap-6">
          <a href="/page/chinh-sach-bao-mat" class="hover:text-white transition-colors">Chính sách bảo mật</a>
          <a href="/page/dieu-khoan-su-dung" class="hover:text-white transition-colors">Điều khoản dịch vụ</a>
          <a href="/sitemap.xml" class="hover:text-white transition-colors">Sitemap</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll-to-top interaction helper -->
  <script>
    window.addEventListener('scroll', function() {
      const header = document.getElementById('header-inner');
      if (header) {
        if (window.scrollY > 20) {
          header.classList.add('shadow-soft');
        } else {
          header.classList.remove('shadow-soft');
        }
      }
    });
  </script>

  <?php if (!empty($customFooterCode)): ?>
    <?php echo $customFooterCode . "\n"; ?>
  <?php endif; ?>
</body>
</html>
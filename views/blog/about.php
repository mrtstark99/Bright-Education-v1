<?php


$page_title = 'Về Bright Education - Hồ sơ năng lực';
$page_description = 'Thông tin, kinh nghiệm và phạm vi hỗ trợ du học Nhật Bản của Bright Education.';
include APP_ROOT . '/views/layouts/header.php';
?>

<main class="pt-20 bg-slate-50 min-h-screen">
  <!-- Company profile header -->
  <section class="relative overflow-hidden bg-primary py-14 sm:py-16 lg:py-20">
    <div class="absolute -right-24 -top-32 h-80 w-80 rounded-full bg-white/[.06]"></div>
    <div class="absolute -bottom-24 -left-16 h-56 w-56 rounded-full bg-primary-400/10"></div>
    <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
      <p class="text-[11px] font-extrabold uppercase tracking-[.2em] text-primary-300">Company profile</p>
      <h1 class="mt-3 text-4xl font-black tracking-tight text-white font-display sm:text-5xl">Về Bright Education</h1>
      <nav class="mt-6 flex items-center gap-2 text-xs font-semibold text-white/65" aria-label="Breadcrumb">
        <a href="/" class="transition hover:text-white">Trang chủ</a>
        <i class="bi bi-chevron-right text-[10px]"></i>
        <span class="text-white">Về chúng tôi</span>
      </nav>
    </div>
  </section>

  <!-- Single profile table -->
  <section class="py-14 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
      <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_16px_45px_rgba(13,36,62,.08)]">
        <table class="w-full border-collapse text-left text-sm sm:text-[15px]">
          <tbody class="divide-y divide-slate-200">
            <tr>
              <th scope="row" class="w-[31%] min-w-[118px] bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Tên đơn vị</th>
              <td class="px-4 py-5 font-semibold text-slate-800 sm:px-7 sm:py-6">Bright Education</td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Tên pháp nhân hoạt động</th>
              <td class="px-4 py-5 font-semibold text-slate-800 sm:px-7 sm:py-6"><?php echo htmlspecialchars(getSetting('legal_entity_name', 'VICTORIA UNIVERSAL CO.,LTD')); ?></td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Người sáng lập</th>
              <td class="px-4 py-5 sm:px-7 sm:py-6">
                <div class="w-full overflow-hidden rounded-2xl border border-slate-200 bg-white">
                  <div class="h-20 bg-gradient-to-r from-primary via-primary-800 to-primary-600"></div>
                  <div class="relative px-5 pb-5 pt-12 sm:px-6">
                    <img src="/assets/images/about_team.jpg" alt="Hoàng Minh Hiếu" class="absolute -top-10 left-5 h-20 w-20 rounded-full border-4 border-white bg-white object-cover object-top shadow-md sm:left-6">
                    <p class="text-lg font-bold text-primary font-display">Hoàng Minh Hiếu</p>
                    <p class="mt-0.5 text-xs font-medium text-slate-500">Founder · Bright Education</p>
                    <p class="mt-3 text-xs leading-5 text-slate-500">Kinh nghiệm học tập và làm việc trong môi trường giáo dục Nhật Bản từ năm 2019.</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                      <a href="https://www.facebook.com/Mrtn.Stark/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-primary-50 px-3.5 py-2 text-xs font-bold text-primary transition hover:bg-primary-100">
                        <i class="bi bi-facebook"></i> Facebook
                      </a>
                      <a href="https://zalo.me/0971044576" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-primary-50 px-3.5 py-2 text-xs font-bold text-primary transition hover:bg-primary-100">
                        <span class="font-black">Zalo</span>
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Định hướng</th>
              <td class="px-4 py-5 leading-7 text-slate-600 sm:px-7 sm:py-6">
                Tư vấn du học Nhật Bản dựa trên thông tin minh bạch, quy trình rõ ràng và kinh nghiệm thực tế tại Nhật.
              </td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Phạm vi dịch vụ</th>
              <td class="px-4 py-5 leading-7 text-slate-600 sm:px-7 sm:py-6">
                <ul class="space-y-1.5">
                  <li>Tư vấn hệ học, ngành học và lựa chọn trường</li>
                  <li>Xử lý hồ sơ trường, dịch thuật, COE và visa</li>
                  <li>Dự toán chi phí và kế hoạch trước nhập cảnh</li>
                  <li>Hỗ trợ học tập, đời sống và thủ tục tại Nhật</li>
                </ul>
              </td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Kinh nghiệm thực tế</th>
              <td class="px-4 py-5 text-slate-600 sm:px-7 sm:py-6">
                <div>
                  <p class="font-bold text-primary">Quá trình học tập & Làm việc:</p>
                  <div class="mt-3 space-y-2 leading-7">
                    <p><strong class="text-slate-800">Năm 2019 – 2023:</strong> Du học sinh tại Nhật Bản.</p>
                    <p><strong class="text-slate-800">Năm 2023 – 2026:</strong> Giáo viên phụ trách tại Trường Nhật ngữ (Kawagoe, Saitama).</p>
                  </div>

                  <p class="mt-6 font-bold text-primary">Chi tiết công việc:</p>
                  <div class="mt-3 space-y-2 leading-7">
                    <p>Quản lý và hỗ trợ học sinh; phụ trách công tác tuyển sinh của trường.</p>
                    <p>Thực hiện các thủ tục pháp lý, xử lý hồ sơ xin cấp mới và gia hạn visa cho du học sinh.</p>
                    <p>Tư vấn, hướng dẫn và hỗ trợ du học sinh đến từ đa dạng quốc gia và nền văn hóa nhanh chóng hòa nhập với đời sống và văn hóa Nhật Bản.</p>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Nguyên tắc</th>
              <td class="px-4 py-5 leading-7 text-slate-600 sm:px-7 sm:py-6">
                Minh bạch điều kiện và chi phí · Đúng quy trình · Đồng hành trước và sau nhập cảnh
              </td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Khu vực hỗ trợ</th>
              <td class="px-4 py-5 text-slate-600 sm:px-7 sm:py-6">Việt Nam và Nhật Bản</td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Địa chỉ</th>
              <td class="px-4 py-5 leading-7 text-slate-600 sm:px-7 sm:py-6"><?php echo htmlspecialchars(getSetting('site_address', 'Số 45 ngõ 207 Quang Trung, Phường Thành Đông, TP Hải Phòng, Việt Nam')); ?></td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Liên hệ</th>
              <td class="px-4 py-5 sm:px-7 sm:py-6">
                <div class="space-y-2 text-slate-600">
                  <p><i class="bi bi-envelope mr-2 text-primary"></i><?php echo htmlspecialchars(getSetting('site_email', 'contact@brighteducation.net')); ?></p>
                  <p><i class="bi bi-telephone mr-2 text-primary"></i><a href="tel:<?php echo preg_replace('/[^+\d]/', '', getSetting('site_phone', '+84 0971044576')); ?>" class="hover:text-primary">VN: <?php echo htmlspecialchars(getSetting('site_phone', '+84 0971044576')); ?></a></p>
                  <p><i class="bi bi-telephone mr-2 text-primary"></i><a href="tel:<?php echo preg_replace('/[^+\d]/', '', getSetting('site_phone_jp', '+81 08037316436')); ?>" class="hover:text-primary">JP: <?php echo htmlspecialchars(getSetting('site_phone_jp', '+81 08037316436')); ?></a></p>
                </div>
              </td>
            </tr>

            <tr>
              <th scope="row" class="bg-slate-100 px-4 py-5 align-top font-bold text-primary sm:px-7 sm:py-6">Tư vấn</th>
              <td class="px-4 py-5 sm:px-7 sm:py-6">
                <a href="/consultation" class="inline-flex items-center font-bold text-primary underline decoration-primary/30 underline-offset-4 transition hover:decoration-primary">
                  <i class="bi bi-calendar-check mr-2"></i>Đặt lịch tư vấn miễn phí
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

<?php include APP_ROOT . '/views/layouts/footer.php'; ?>

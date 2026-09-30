<?php


$page_title = 'Chi Tiết Chi Phí Du Học Nhật Bản - Bright Education';
include APP_ROOT . '/views/layouts/header.php';
?>

<main class="pt-20 bg-slate-50 min-h-screen">
  
  <!-- Hero Section -->
  <section class="bg-primary text-white pt-16 pb-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>
    <div class="mx-auto max-w-7xl px-5 lg:px-8 relative z-10 text-center">
      
      <!-- Breadcrumb -->
      <nav class="flex items-center justify-center gap-2 text-xs font-semibold text-white/60 mb-6 uppercase tracking-wider">
        <a href="/" class="hover:text-white transition-colors">Trang chủ</a>
        <i class="bi bi-chevron-right text-[10px]"></i>
        <span class="text-white">Chi tiết chi phí</span>
      </nav>

      <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-bold text-white/90 mb-4 border border-white/10 uppercase tracking-widest">
        <i class="bi bi-wallet2 text-[10px] text-amber-400"></i> Bảng kê minh bạch
      </span>
      <h1 class="text-3xl sm:text-[2.75rem] font-black font-display tracking-tight leading-tight mb-4">Chi Phí Du Học Nhật Bản</h1>
      <p class="text-base sm:text-lg text-white/85 max-w-3xl leading-relaxed mx-auto">
        Kế hoạch tài chính chi tiết, rõ ràng và tối ưu nhất cho hành trình du học của bạn. Bright Education cam kết không phát sinh bất kỳ khoản phí ngoài hợp đồng nào.
      </p>
    </div>
  </section>

  <!-- Detailed Cost Categories -->
  <section class="py-16 -mt-10 relative z-20">
    <div class="mx-auto max-w-7xl px-5 lg:px-8 space-y-12">

      <!-- Section 1: Service Fees in Vietnam -->
      <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-soft">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
          <div class="w-full lg:w-1/3">
            <span class="inline-block py-1 px-3.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-4">Danh mục 1</span>
            <h3 class="text-2xl font-bold text-midnight font-display mb-4">Phí Dịch Vụ Hồ Sơ Tại Việt Nam</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6">
              Mức phí dịch vụ trọn gói xử lý toàn bộ hồ sơ tại Việt Nam của Bright Education. Chúng tôi cam kết minh bạch, thu một lần duy nhất và không có bất kỳ khoản phí phát sinh ẩn nào khác.
            </p>
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 text-xs text-slate-500 space-y-2">
              <p class="font-bold text-midnight">Gói tiêu chuẩn bao gồm:</p>
              <ul class="list-disc list-inside space-y-1">
                <li>Dịch thuật công chứng toàn bộ giấy tờ</li>
                <li>Xử lý hồ sơ tài chính xin COE/Visa</li>
                <li>Luyện phỏng vấn 1-1 với trường và cục</li>
                <li>Hỗ trợ xin COE, đăng ký visa</li>
                <li>Hỗ trợ liên hệ và đăng ký ký túc xá bên Nhật</li>
              </ul>
            </div>
          </div>
          
          <div class="w-full lg:w-2/3">
            <div class="overflow-hidden rounded-2xl border border-slate-100 shadow-soft">
              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs sm:text-sm font-sans">
                  <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                      <th class="py-3.5 px-4 font-bold text-midnight">Danh Mục Chi Phí Xử Lý Hồ Sơ</th>
                      <th class="py-3.5 px-4 font-bold text-slate-500 hidden md:table-cell">Mô Tả Chi Tiết Công Việc</th>
                      <th class="py-3.5 px-4 font-bold text-slate-400 text-right">Giá Thị Trường (VNĐ)</th>
                      <th class="py-3.5 px-4 font-bold text-primary text-right bg-primary/5">Bright Education (VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Xử lý hồ sơ & Dịch thuật</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Kiểm tra hồ sơ gốc, dịch thuật công chứng, hoàn thiện hồ sơ gửi trường</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~10.000.000đ - 15.000.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-midnight text-right bg-primary/5">15.000.000đ / 30.000.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Phí chứng thực bằng cấp</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Xác thực tính hợp lệ của văn bằng tốt nghiệp (yêu cầu bắt buộc)</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~1.500.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-primary text-right bg-primary/5">Miễn phí</td>
                    </tr>
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Chi phí hỗ trợ du học sinh</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Tư vấn, làm cầu nối gia đình - nhà trường, hỗ trợ giới thiệu việc làm</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~5.000.000đ - 10.000.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-primary text-right bg-primary/5">Miễn phí</td>
                    </tr>
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Chứng minh tài chính</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Xác nhận số dư, mở sổ tiết kiệm, hoàn thiện hồ sơ bảo lãnh tài chính</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~6.000.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-primary text-right bg-primary/5">Miễn phí</td>
                    </tr>
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Phí xử lý hồ sơ COE</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Dịch thuật, công chứng và làm hồ sơ chứng minh tài chính xin COE</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~5.000.000đ - 10.000.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-primary text-right bg-primary/5">Miễn phí</td>
                    </tr>
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Phí chuyển phát hồ sơ</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Chuyển phát nhanh quốc tế hồ sơ gốc sang Nhật cho nhà trường</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~1.000.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-primary text-right bg-primary/5">Miễn phí</td>
                    </tr>
                    <tr>
                      <td class="py-3.5 px-4 font-semibold text-slate-700">Chi phí xin visa</td>
                      <td class="py-3.5 px-4 text-xs text-slate-500 hidden md:table-cell">Hoàn thiện tờ khai, đặt lịch hẹn và nộp visa tại ĐSQ/LSQ Nhật</td>
                      <td class="py-3.5 px-4 text-slate-600 text-right">~1.500.000đ</td>
                      <td class="py-3.5 px-4 font-semibold text-primary text-right bg-primary/5">Miễn phí</td>
                    </tr>
                    <tr class="font-bold border-t-2 border-slate-200 bg-slate-50 text-sm">
                      <td class="py-3.5 px-4 text-midnight">TỔNG PHÍ DỊCH VỤ</td>
                      <td class="py-3.5 px-4 hidden md:table-cell text-xs text-slate-500">Chưa bao gồm vé máy bay</td>
                      <td class="py-3.5 px-4 text-slate-700 text-right">~40.000.000đ - 60.000.000đ</td>
                      <td class="py-3.5 px-4 text-primary text-right bg-primary/5">15.000.000đ / 30.000.000đ</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section 2: Tuition Fees -->
      <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-soft">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
          <div class="w-full lg:w-1/3">
            <span class="inline-block py-1 px-3.5 rounded-full bg-indigo-500/10 text-indigo-500 text-xs font-bold uppercase tracking-wider mb-4">Danh mục 2</span>
            <h3 class="text-2xl font-bold text-midnight font-display mb-4">Học Phí Năm Đầu Tại Nhật</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6">
              Học phí năm đầu tiên đóng trực tiếp từ tài khoản ngân hàng của học sinh tại Việt Nam sang tài khoản của trường bên Nhật Bản sau khi được cấp COE (Giấy tư cách lưu trú).
            </p>
            <div class="p-4 bg-amber-50 text-amber-800 rounded-2xl text-xs space-y-2 border border-amber-100">
              <p class="font-bold"><i class="bi bi-exclamation-triangle-fill mr-1"></i> Lưu ý:</p>
              <p>Mức học phí quy đổi sang VNĐ trong bảng được tính chuẩn xác theo tỷ giá cố định <strong>1 JPY = 175 VNĐ</strong>.</p>
            </div>
          </div>
          
          <div class="w-full lg:w-2/3">
            <div class="overflow-hidden rounded-2xl border border-slate-100 shadow-soft">
              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse font-sans">
                  <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Khu vực / Đặc điểm trường</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Học phí trung bình (JPY / Năm)</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm text-right">Chi phí quy đổi (VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    <tr>
                      <td class="py-4 px-4 text-sm">
                        <div class="font-bold text-slate-800">Trường ở tỉnh xa</div>
                        <div class="text-xs text-slate-500 mt-0.5">Hokkaido, Ibaraki, Oita... Sinh hoạt phí và học phí đều rẻ</div>
                      </td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium">600.000 - 700.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-indigo-600 text-right">~105.000.000đ - 122.500.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm">
                        <div class="font-bold text-slate-800">Thành phố cỡ trung</div>
                        <div class="text-xs text-slate-500 mt-0.5">Fukuoka, Chiba, Saitama... Cân đối tốt giữa chi phí và cơ hội</div>
                      </td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium">700.000 - 750.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-indigo-600 text-right">~122.500.000đ - 131.250.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm">
                        <div class="font-bold text-slate-800">Ngoại ô Tokyo / Osaka</div>
                        <div class="text-xs text-slate-500 mt-0.5">Tiện lợi di chuyển vào trung tâm, học phí vừa phải</div>
                      </td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium">750.000 - 800.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-indigo-600 text-right">~131.250.000đ - 140.000.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm">
                        <div class="font-bold text-slate-800">Trung tâm Tokyo / Osaka</div>
                        <div class="text-xs text-slate-500 mt-0.5">Sầm uất, đắt đỏ nhưng có nhiều việc làm thêm lương cao</div>
                      </td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium">&gt; 800.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-indigo-600 text-right">&gt; 140.000.000đ</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section 3: Dormitory Fees -->
      <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-soft">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
          <div class="w-full lg:w-1/3">
            <span class="inline-block py-1 px-3.5 rounded-full bg-emerald-500/10 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4">Danh mục 3</span>
            <h3 class="text-2xl font-bold text-midnight font-display mb-4">Chi Phí Ký Túc Xá (3 Tháng đầu)</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6">
              Các trường Nhật thường yêu cầu đóng trước 3 tháng ký túc xá để ổn định nơi ở ngay khi sang Nhật. Mức phí thực tế quy đổi theo tỷ giá **175 VNĐ/JPY**.
            </p>
          </div>
          
          <div class="w-full lg:w-2/3">
            <div class="overflow-hidden rounded-2xl border border-slate-100 shadow-soft">
              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse font-sans">
                  <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Khu vực</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Phí KTX trung bình (JPY / Tháng)</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm text-right">Chi phí 3 tháng quy đổi (VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Osaka / Fukuoka & Các tỉnh khác</td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium">30.000 - 45.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-emerald-600 text-right">~15.750.000đ - 23.625.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Tokyo (Trung tâm)</td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium">45.000 - 60.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-emerald-600 text-right">~23.625.000đ - 31.500.000đ</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section 4: Flight & Landing Support -->
      <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-soft">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
          <div class="w-full lg:w-1/3">
            <span class="inline-block py-1 px-3.5 rounded-full bg-rose-500/10 text-rose-500 text-xs font-bold uppercase tracking-wider mb-4">Danh mục 4</span>
            <h3 class="text-2xl font-bold text-midnight font-display mb-4">Vé Máy Bay & Thủ Tục Bay</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6">
              Hỗ trợ đặt vé máy bay một chiều sang Nhật và hỗ trợ làm thủ tục hải quan xuất nhập cảnh.
            </p>
          </div>
          
          <div class="w-full lg:w-2/3">
            <div class="overflow-hidden rounded-2xl border border-slate-100 shadow-soft">
              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse font-sans">
                  <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Hạng mục hỗ trợ</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Nội dung</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm text-right">Chi phí trung bình (VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Vé Máy Bay</td>
                      <td class="py-4 px-4 text-xs text-slate-500">Vé máy bay một chiều sang Nhật (Bright hỗ trợ đặt hộ hoặc tự túc)</td>
                      <td class="py-4 px-4 text-sm font-bold text-rose-500 text-right">~10.000.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Khám lao phổi</td>
                      <td class="py-4 px-4 text-xs text-slate-500">Khám theo mẫu chỉ định của Cục xuất nhập cảnh tại bệnh viện quy định</td>
                      <td class="py-4 px-4 text-sm font-bold text-rose-500 text-right">~1.500.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Đăng ký thi chứng chỉ tiếng Nhật</td>
                      <td class="py-4 px-4 text-xs text-slate-500">Lệ phí đăng ký thi JLPT, NAT-TEST hoặc TOPJ tại Việt Nam</td>
                      <td class="py-4 px-4 text-sm font-bold text-rose-500 text-right">~800.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Học tiếng Nhật tại Việt Nam</td>
                      <td class="py-4 px-4 text-xs text-slate-500">Khóa học tiếng Nhật từ cơ bản đến hoàn thành trình độ N4 trước khi bay</td>
                      <td class="py-4 px-4 text-sm font-bold text-rose-500 text-right">~12.000.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Đón sân bay & Hướng dẫn nhập học</td>
                      <td class="py-4 px-4 text-xs text-slate-500">Bright hỗ trợ làm thủ tục đón tại sân bay Nhật Bản đưa về KTX</td>
                      <td class="py-4 px-4 text-sm font-bold text-rose-500 text-right">Miễn phí</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section 5: Monthly Living Expenses -->
      <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-soft">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
          <div class="w-full lg:w-1/3">
            <span class="inline-block py-1 px-3.5 rounded-full bg-slate-500/10 text-slate-600 text-xs font-bold uppercase tracking-wider mb-4">Danh mục 5</span>
            <h3 class="text-2xl font-bold text-midnight font-display mb-4">Sinh Hoạt Phí Hàng Tháng (Tham Khảo)</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6">
              Mức sinh hoạt phí dự kiến hàng tháng của du học sinh tại Nhật Bản. Lưu ý: Thu nhập làm thêm thực tế có thể trang trải hoàn toàn khoản này.
            </p>
          </div>
          
          <div class="w-full lg:w-2/3">
            <div class="overflow-hidden rounded-2xl border border-slate-100 shadow-soft">
              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse font-sans">
                  <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                      <th class="py-4 px-4 font-bold text-midnight text-sm">Khoản chi tiêu hàng tháng</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm text-right">Chi phí trung bình (JPY)</th>
                      <th class="py-4 px-4 font-bold text-midnight text-sm text-right">Quy đổi VNĐ (Tỷ giá 175)</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100">
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Tiền ăn uống (Tự nấu ăn)</td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium text-right">25.000 - 30.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-slate-700 text-right">~4.375.000đ - 5.250.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Tiền Ký túc xá / Thuê phòng</td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium text-right">30.000 - 45.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-slate-700 text-right">~5.250.000đ - 7.875.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Tiền điện, nước, ga, internet</td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium text-right">10.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-slate-700 text-right">~1.750.000đ</td>
                    </tr>
                    <tr>
                      <td class="py-4 px-4 text-sm font-semibold text-slate-700">Bảo hiểm quốc dân & Chi phí khác</td>
                      <td class="py-4 px-4 text-sm text-slate-600 font-medium text-right">10.000 JPY</td>
                      <td class="py-4 px-4 text-sm font-bold text-slate-700 text-right">~1.750.000đ</td>
                    </tr>
                    <tr class="font-bold border-t-2 border-slate-200 bg-slate-50 text-sm">
                      <td class="py-4 px-4 text-midnight">TỔNG CHI TIÊU HÀNG THÁNG</td>
                      <td class="py-4 px-4 text-right text-slate-700">75.000 - 95.000 JPY</td>
                      <td class="py-4 px-4 text-right text-primary">~13.125.000đ - 16.625.000đ</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

</main>

<?php include APP_ROOT . '/views/layouts/footer.php'; ?>

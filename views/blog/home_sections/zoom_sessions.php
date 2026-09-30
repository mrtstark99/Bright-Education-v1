    <!-- Zoom Schedule Section -->
    <?php if (!empty($zoom_slots)): ?>
    <section id="zoom-schedule" class="home-section home-zoom bg-slate-50 py-20 lg:py-28 relative">
      <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="home-section-heading mx-auto mb-16 max-w-2xl text-center">
          <span class="home-kicker">06 — Tương tác trực tiếp</span>
          <h2 class="text-3xl sm:text-4xl font-bold text-primary font-display">Lịch Hội Thảo & Tư Vấn Zoom</h2>
          <p class="mt-4 text-slate-500 text-[15px]">Đăng ký tham gia miễn phí các buổi chia sẻ thông tin trực tuyến từ chuyên gia Bright Education và các trường Nhật ngữ đối tác.</p>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($zoom_slots as $index => $slot): 
            $dateFormatted = date('d/m/Y', strtotime($slot['scheduled_date']));
            $dayOfWeek = ['Chủ Nhật','Thứ Hai','Thứ Ba','Thứ Tư','Thứ Năm','Thứ Sáu','Thứ Bảy'][date('w', strtotime($slot['scheduled_date']))];
          ?>
          <!-- Event Card -->
          <div class="bg-white rounded-[2rem] p-6 sm:p-8 border border-slate-100 shadow-soft hover:shadow-medium hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full reveal reveal-delay-<?php echo $index * 100; ?>">
            <div>
              <div class="flex items-center justify-between gap-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-red-600 rounded-full text-xs font-bold uppercase tracking-wider">
                  <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span> LIVE
                </span>
                <span class="text-xs font-bold text-slate-400"><i class="bi bi-calendar3 mr-1"></i><?php echo $slot['time_start']; ?>, <?php echo $dayOfWeek; ?> (<?php echo $dateFormatted; ?>)</span>
              </div>
              <h3 class="text-lg font-bold text-primary font-display mt-5 mb-2 leading-snug"><?php echo htmlspecialchars($slot['title']); ?></h3>
              <p class="text-[13.5px] text-slate-500 line-clamp-3 mb-4 leading-relaxed"><?php echo htmlspecialchars($slot['description']); ?></p>
              
              <div class="border-t border-slate-100 pt-4 mt-4 space-y-2.5 text-[13px] text-muted">
                <div class="flex items-center gap-2">
                  <i class="bi bi-clock text-orange-600"></i>
                  <span>Thời gian: <?php echo $slot['time_start']; ?> - <?php echo $slot['time_end']; ?></span>
                </div>
                <div class="flex items-center gap-2">
                  <i class="bi bi-people text-orange-600"></i>
                  <span>Giới hạn: <?php echo $slot['max_participants']; ?> học viên</span>
                </div>
                <?php if ($slot['is_free']): ?>
                <div class="flex items-center gap-2">
                  <i class="bi bi-gift text-orange-600"></i>
                  <span class="text-green-600 font-bold">Hoàn toàn miễn phí</span>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <a href="/consultation" class="w-full mt-6 py-3 bg-primary hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-1.5">
              Đăng ký tham gia qua Zoom <i class="bi bi-arrow-right"></i>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

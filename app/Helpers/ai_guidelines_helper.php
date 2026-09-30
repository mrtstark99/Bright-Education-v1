<?php
/**
 * AI Guidelines & Master System Prompt Builder Helper
 * Pure Prompt Architecture with E-E-A-T, Search Intent & Anti-Slop rules
 */

if (!function_exists('getDefaultMasterPrompt')) {
    function getDefaultMasterPrompt(): string {
        return <<<PROMPT
# VAI TRÒ & SỨ MỆNH CỦA BẠN (ROLE & MISSION)
Bạn là Chuyên Gia Sáng Tạo Nội Dung Chuẩn SEO & Cố Vấn E-E-A-T Cao Cấp với hơn 10 năm kinh nghiệm. Nhiệm vụ của bạn là sản xuất các bài viết chuyên sâu, thực chiến, hữu ích vượt trội cho người dùng và tối ưu hóa hoàn hảo cho các thuật toán tìm kiếm của Google (Helpful Content System, Core Updates, E-E-A-T).

Mỗi bài viết bạn tạo ra phải đạt được 3 mục tiêu cốt lõi:
1. Khóa chặt Search Intent: Giải quyết trọn vẹn và nhanh nhất câu hỏi/vấn đề của độc giả.
2. Tạo ra Information Gain: Bổ sung giá trị mới (số liệu, ví dụ thực tiễn, phân tích độc quyền, bảng đối sánh) mà đối thủ Top 10 chưa có.
3. Trải nghiệm đọc xuất sắc: Bố cục rõ ràng, sinh động, kết hợp 2-4 khối UI chuẩn từ Thư viện UI Elements.

---

## 1. PHONG CÁCH VIẾT, TÔNG GIỌNG & ĐỘC GIẢ (VOICE & TONE)
* Tông giọng chủ đạo: Chuyên gia, tự tin, khách quan, súc tích và giàu tính ứng dụng thực tế.
* Phong cách ngôn ngữ:
  - Dùng câu chủ động, mạch lạc, câu ngắn gọn (trung bình 15–20 từ/câu).
  - Sử dụng thuật ngữ chuyên ngành chính xác nhưng luôn kèm giải thích ngắn gọn, dễ hiểu.
  - Xưng hô lịch sự, chuyên nghiệp ("chúng tôi", "bạn", hoặc ngôn ngữ trung tính).
* Tuyệt đối cấm các mẫu câu sáo rỗng (Anti-AI Slop):
  - ❌ CẤM: "Trong thời đại công nghệ số 4.0 hiện nay..."
  - ❌ CẤM: "Như chúng ta đã biết, X đóng vai trò vô cùng quan trọng..."
  - ❌ CẤM: "Tóm lại / Nhìn chung, X là một giải pháp tuyệt vời mà bạn không thể bỏ qua."
  - ❌ CẤM: Lặp đi lặp lại từ nối rỗng tuếch như "hơn nữa", "ngoài ra", "mặt khác" ở đầu mỗi đoạn.
  - 👉 THAY BẰNG: Đi thẳng vào số liệu, nỗi đau thực tế của độc giả, hoặc kết luận thực chiến ngay đoạn đầu.

---

## 2. NGUYÊN TẮC GOOGLE E-E-A-T & CHỐNG NỘI DUNG RÁC
1. Experience (Trải nghiệm thực tế): Trình bày qua case study, trải nghiệm thực tế hoặc bài học kinh nghiệm.
2. Expertise (Tính chuyên gia): Giải thích sâu bản chất kỹ thuật, phân tích nguyên nhân - hệ quả - giải pháp.
3. Authoritativeness (Độ uy tín): Chỉ dẫn số liệu đã kiểm chứng, ghi nguồn; không bịa số liệu hoặc trải nghiệm. Dẫn số liệu cụ thể kèm đơn vị đo lường (vd: "giảm 45% thời gian tải trang", "tăng 180% traffic").
4. Trustworthiness (Sự tin cậy): Phân tích khách quan cả ưu điểm và nhược điểm/hạn chế, kèm checklist đối soát.

---

## 3. CẤU TRÚC BÀI VIẾT CHUẨN SEO (PAS / AIDA OUTLINE)
Mỗi bài viết chuẩn (1,200 – 2,500+ từ) tuân theo cấu trúc 6 phần:
1. Mở bài (100 - 150 từ): CMS tự tạo H1 từ title; nội dung chỉ dùng H2/H3 + Khối Key Takeaways (Điểm Cốt Lõi) tóm tắt 3-4 ý đắt giá.
2. Thân bài (H2, H3): Bản chất chuyên sâu + Quy trình từng bước + Bảng so sánh đối sánh + Số liệu minh chứng.
3. Chèn 2 - 4 khối UI Elements xen kẽ hợp lý từ Thư viện UI Elements (không đặt dính liền kề nhau).
4. Chèn 2 - 5 Internal Links tự nhiên đến các bài viết liên quan trong cùng Topic Cluster.
5. Hỏi đáp thường gặp (FAQ Accordion): 3 - 5 câu hỏi xuất phát từ Search Intent thực tế dùng thẻ <details><summary>.
6. Kết bài & Kêu gọi hành động (CTA): Tóm tắt ngắn gọn + Khối CTA Box định hướng chuyển đổi.

---

## 4. QUY TRÌNH LÀM VIỆC BẮT BUỘC QUA REST API
* Đồng bộ nhiệm vụ: Bắt đầu ca gọi GET /api/agent.php?action=tasks; Hoàn thành gọi POST ?action=complete_task.
* Soi SERP trước khi viết: Bắt buộc gọi POST ?action=analyze_serp & ?action=serp_outline để phân tích Top 10 đối thủ.
* Lấy link nội bộ: Gọi POST ?action=link_suggestions để lấy danh sách bài viết cũ liên quan cần chèn link.
* Tạo bản nháp: Gửi bài viết qua POST ?action=create_draft (hỗ trợ featured_image, custom_schema_json, meta_title, meta_description).
PROMPT;
    }
}

if (!function_exists('getDefaultAIGuidelines')) {
    function getDefaultAIGuidelines(): array {
        return [
            'ai_guidelines_enabled' => '1',
            'ai_prompt_mode' => 'custom',
            'ai_custom_system_prompt' => getDefaultMasterPrompt()
        ];
    }
}

if (!function_exists('getAIGuidelines')) {
    function getAIGuidelines(?PDO $db = null): array {
        if ($db === null) {
            $db = \Database::getInstance();
        }
        $stmt = $db->prepare("SELECT setting_key, setting_value FROM settings WHERE setting_key LIKE 'ai_%'");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

        $defaults = getDefaultAIGuidelines();
        $result = array_merge($defaults, $rows);
        // Legacy databases may contain 0; the master prompt is now mandatory.
        $result['ai_guidelines_enabled'] = '1';

        if (empty($result['ai_custom_system_prompt'])) {
            $result['ai_custom_system_prompt'] = getDefaultMasterPrompt();
        }

        return $result;
    }
}

if (!function_exists('saveAIGuidelines')) {
    function saveAIGuidelines(array $data = [], array &$errors = [], ?PDO $db = null, ?int $userId = null): bool {
        if ($db === null) {
            $db = \Database::getInstance();
        }

        $promptContent = trim($data['ai_custom_system_prompt'] ?? '');
        if (empty($promptContent)) {
            $promptContent = getDefaultMasterPrompt();
        }

        // Partial API updates preserve settings omitted by the caller.
        $current = getAIGuidelines($db);
        if (!array_key_exists('ai_custom_system_prompt', $data)) {
            $promptContent = $current['ai_custom_system_prompt'];
        }

        $stmt = $db->prepare("
            INSERT INTO settings (setting_key, setting_value, updated_at)
            VALUES (:key, :val, datetime('now', 'localtime'))
            ON CONFLICT(setting_key) DO UPDATE SET 
                setting_value = excluded.setting_value, 
                updated_at = datetime('now', 'localtime')
        ");

        $stmt->execute([':key' => 'ai_guidelines_enabled', ':val' => '1']);
        $stmt->execute([':key' => 'ai_custom_system_prompt', ':val' => $promptContent]);
        $stmt->execute([':key' => 'ai_prompt_mode', ':val' => 'custom']);

        return true;
    }
}

if (!function_exists('buildAISystemPrompt')) {
    function buildAISystemPrompt(array $guidelines): string {
        if (!empty($guidelines['ai_custom_system_prompt'])) {
            return trim($guidelines['ai_custom_system_prompt']) . aiLibraryInstructions();
        }
        return getDefaultMasterPrompt() . aiLibraryInstructions();
    }
}

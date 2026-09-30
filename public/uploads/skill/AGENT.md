# ==============================================================================
# CMS SEO AGENT MANIFEST & VERIFICATION PROTOCOL (AGENT.md)
# ==============================================================================
# File này là điểm vào (entry point) bắt buộc cho mọi AI Agent.
# Trước khi thực thi bất kỳ tác vụ nào, AI Agent PHẢI đọc và xác nhận các điều khoản dưới đây.
# ==============================================================================

## 1. THÔNG TIN ĐỊNH DANH & KẾT NỐI HỆ THỐNG (SYSTEM CONFIGURATION)
- **Tên Agent**: CMS Blog SEO Specialist Agent
- **Phiên bản Protocol**: v3.0.0
- **Base URL Website**: `{{BASE_URL}}`
- **Cổng API Gateway (Endpoint)**: `{{API_ENDPOINT}}`
- **Host / Server**: `{{SITE_HOST}}`
- **Giao thức kết nối**: REST / JSON qua HTTP (Bearer Token)
- **Hệ thống đích**: CMS Blog SEO System (PHP/SQLite High Performance)
- **Ngôn ngữ xử lý mặc định**: Tiếng Việt (vi-VN)
- **Khung kiến thức chuẩn**: Google E-E-A-T + Helpful Content System + Modern On-page SEO

---

## 2. RÀNG BUỘC BẮT BUỘC (MANDATORY CONSTRAINTS)

1. **Tuyệt đối không bịa đặt (Zero Hallucination)**:
   - Không tự chế ra endpoint hoặc trường API không có trong tài liệu [`01_authentication_and_api.md`](./01_authentication_and_api.md). Mọi lệnh gọi API gửi đến `{{API_ENDPOINT}}`.
2. **Giao thức xác thực nghiêm ngặt**:
   - Token chỉ gửi trong header `Authorization: Bearer <TOKEN>`.
   - Cấm truyền qua URL `?token=...` (hệ thống sẽ chặn ngay lập tức).
3. **Đồng bộ tiến độ lên hệ thống trung tâm**:
   - Không tự giữ kế hoạch ngầm trong bộ nhớ context mà không đồng bộ về database CMS.
   - Bắt đầu ca: đọc task từ `{{API_ENDPOINT}}?action=tasks`. Phát sinh việc: tạo adhoc task qua `action=create_adhoc_task`. Xong việc: gọi `action=complete_task`.
4. **Quy trình kiểm duyệt an toàn (Human-in-the-loop)**:
   - Luồng xuất bản chuẩn: `ai_draft` $\rightarrow$ `pending_review` $\rightarrow$ `approved` $\rightarrow$ `published`.
   - Trừ khi Admin cấp quyền publish trực tiếp, bài viết mới tạo luôn ở trạng thái `ai_draft` hoặc `pending_review`.
5. **Thư viện UI Elements chuẩn hóa**:
   - Chỉ sử dụng các cấu trúc HTML/CSS được định nghĩa trong [`04_ui_elements_library.md`](./04_ui_elements_library.md).
   - Không tự ý viết inline style `<style>` hoặc nhúng mã `<script>` tùy tiện.
6. **Chống nội dung rác (Anti-AI Slop)**:
   - Bắt buộc tuân thủ Master Prompt tại [`03_ai_content_writer_prompt.md`](./03_ai_content_writer_prompt.md).
   - Nội dung phải có Information Gain (thông tin mới, số liệu, ví dụ thực tế), tránh câu từ sáo rỗng.

---

## 3. BẢNG MỤC LỤC SKILL (SKILL INDEX)

| # | File | Chức năng chính |
| :--- | :--- | :--- |
| **00** | [`SKILL.md`](./SKILL.md) | Tổng quan bộ kỹ năng & quy trình điều phối tổng thể |
| **01** | [`01_authentication_and_api.md`](./01_authentication_and_api.md) | Tài liệu kỹ thuật API, Authentication, Scopes & Error codes |
| **02** | [`02_workflow_and_task_lifecycle.md`](./02_workflow_and_task_lifecycle.md) | Quy trình làm việc theo task, xử lý phát sinh & Event Hooks |
| **03** | [`03_ai_content_writer_prompt.md`](./03_ai_content_writer_prompt.md) | **Quy chuẩn bài viết AI Content Writer thuần Prompt** (Không dùng cài đặt) |
| **04** | [`04_ui_elements_library.md`](./04_ui_elements_library.md) | **Thư viện 13 Nhóm HTML/CSS định dạng chuẩn On-page** |
| **05** | [`05_serp_and_intent_analysis.md`](./05_serp_and_intent_analysis.md) | Cào dữ liệu SERP Top 10, phân tích Search Intent & dàn ý |
| **06** | [`06_internal_linking_and_seo_schema.md`](./06_internal_linking_and_seo_schema.md) | Kỹ thuật liên kết nội bộ 2 chiều & Schema JSON-LD tùy chỉnh |
| **07** | [`07_indexing_and_automation.md`](./07_indexing_and_automation.md) | Tự động hóa IndexNow, Ping Sitemap & cảnh báo rớt hạng |
| **08** | [`08_examples_and_payloads.md`](./08_examples_and_payloads.md) | Tập hợp Payload JSON mẫu cho từng Action |

---

## 4. CHECKLIST XÁC NHẬN CỦA AGENT TRƯỚC KHI CHẠY (HANDSHAKE CHECKLIST)

```text
[ ] 1. Đã đọc và hiểu rõ ràng buộc bảo mật (Bearer Token, no query string).
[ ] 2. Đã gọi API self-discovery: GET {{API_ENDPOINT}}?action=me để biết chính xác quyền hạn của Token.
[ ] 3. Đã tải danh sách nhiệm vụ từ GET {{API_ENDPOINT}}?action=tasks.
[ ] 4. Đã phân tích SERP Top 10 bằng action=analyze_serp trước khi tạo dàn ý bài viết.
[ ] 5. Đã nạp Master Prompt từ 03_ai_content_writer_prompt.md vào vai trò hệ thống.
[ ] 6. Đã đối chiếu các thành phần giao diện với 04_ui_elements_library.md.
[ ] 7. Đã hoàn thành nhiệm vụ và ghi log notes qua action=complete_task.
```


## Hợp đồng vận hành hiện hành (ưu tiên hơn ví dụ tĩnh)
- Đầu phiên gọi action=me và action=guidelines. data.system_prompt là hướng dẫn hiệu lực; data.elements_library chứa HTML và version. File tĩnh chỉ để tham khảo ngoại tuyến.
- Master System Prompt và hợp đồng UI luôn được áp dụng khi AI Agent tạo bài.
- Chọn 2–4 khối đặc biệt thực tế theo nhu cầu độc giả; takeaway, FAQ, CTA cũng tính vào tổng. Không tính heading/tag. CMS tự tạo H1 và mục lục.
- Không bắt buộc nhồi mọi loại khối vào mọi bài. Bảng cho so sánh, steps cho quy trình, callout cho ngoại lệ. Không sao chép số liệu, trích dẫn hoặc URL mẫu mà chưa xác minh.
- Chỉ gọi action trong danh sách me và với scopes phù hợp. Thiếu SERP/API key: ghi giới hạn vào task notes, không bịa phân tích đối thủ; giữ bản nháp để bổ sung nghiên cứu.
- create_draft/update_post trả data.content_validation. Sửa warnings qua update_post, đọc bài mới nhất và gửi expected_updated_at để tránh ghi đè thay đổi của người khác.
- submit_for_review/approve_post/publish_post trả 422 nếu nội dung chưa đạt kiểm tra UI. Không tự động approve/publish trừ khi nhiệm vụ và quyền hiện hành cho phép.
- Các kiểm tra cấu trúc UI không phải chấm điểm E-E-A-T hoặc xác minh sự thật. Tự kiểm nguồn, intent, link và tính hữu ích trước khi gửi duyệt.
- complete_task chỉ sau khi có kết quả đúng yêu cầu; notes ghi ID bài, trạng thái, nguồn dữ liệu, kiểm tra và giới hạn còn lại.

<?php
/**
 * @file views/admin/service_form.php
 * @description Administration form for creating or editing study abroad services.
 *
 * Layer:
 * - Presentation / Admin View
 *
 * Responsibilities:
 * - Render input form for service parameters (title, slug, pricing, order, description, content).
 * - Support both creation and update workflows.
 *
 * Security:
 * - Anti-CSRF token verification on form post.
 * - Entity-encoded values in form inputs.
 *
 * Dependencies:
 * - Master admin layout (admin_header, admin_footer).
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

include APP_ROOT . '/views/layouts/admin_header.php';

$isEdit = !empty($service['id']);
$formAction = $isEdit ? '/admin/services/update/' . $service['id'] : '/admin/services/store';
?>

<div class="admin-page-header flex items-center justify-between gap-4 mb-6">
  <div>
    <a href="/admin/services" class="inline-flex items-center gap-1 text-xs text-primary font-bold hover:underline mb-1">
      <i class="bi bi-arrow-left"></i> Quay lại danh sách dịch vụ
    </a>
    <h1 class="text-2xl font-bold text-slate-800 font-display">
      <?php echo $isEdit ? 'Chỉnh sửa Dịch vụ' : 'Thêm Dịch vụ Mới'; ?>
    </h1>
  </div>
</div>

<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 max-w-4xl">
  <form method="POST" action="<?php echo $formAction; ?>" class="space-y-6">
    <?php echo csrfField(); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Tiêu đề dịch vụ <span class="text-red-500">*</span></label>
        <input type="text" name="title" required value="<?php echo htmlspecialchars($service['title'] ?? ''); ?>" placeholder="Ví dụ: Du học Trường Nhật ngữ" class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none">
      </div>

      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Tên ngắn / Nhóm chương trình</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($service['name'] ?? ''); ?>" placeholder="Ví dụ: Trường Nhật ngữ" class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Đường dẫn (Slug)</label>
        <input type="text" name="slug" value="<?php echo htmlspecialchars($service['slug'] ?? ''); ?>" placeholder="Tự động tạo nếu để trống" class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none font-mono">
      </div>

      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Chi phí dự kiến (VNĐ)</label>
        <input type="number" step="100000" name="price" value="<?php echo (float)($service['price'] ?? 0); ?>" class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none">
      </div>

      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Icon Bootstrap (bi-*)</label>
        <input type="text" name="icon" value="<?php echo htmlspecialchars($service['icon'] ?? 'bi-briefcase'); ?>" placeholder="bi-translate, bi-briefcase..." class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none font-mono">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Thứ tự hiển thị</label>
        <input type="number" name="display_order" value="<?php echo (int)($service['display_order'] ?? 0); ?>" class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none">
      </div>

      <div class="space-y-1.5">
        <label class="block text-xs font-bold text-slate-700 uppercase">Trạng thái</label>
        <select name="status" class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none">
          <option value="active" <?php echo ($service['status'] ?? 'active') === 'active' ? 'selected' : ''; ?>>Hoạt động (Hiển thị)</option>
          <option value="inactive" <?php echo ($service['status'] ?? '') === 'inactive' ? 'selected' : ''; ?>>Ẩn</option>
        </select>
      </div>
    </div>

    <div class="space-y-1.5">
      <label class="block text-xs font-bold text-slate-700 uppercase">Mô tả ngắn gọn</label>
      <textarea name="description" rows="3" placeholder="Mô tả tóm tắt gói dịch vụ cho trang chủ và danh sách..." class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none resize-none"><?php echo htmlspecialchars($service['description'] ?? ''); ?></textarea>
    </div>

    <div class="space-y-1.5">
      <label class="block text-xs font-bold text-slate-700 uppercase">Nội dung chi tiết chương trình (HTML)</label>
      <textarea name="content" rows="10" placeholder="Chi tiết quyền lợi, lộ trình đào tạo, điều kiện ứng tuyển..." class="w-full px-4 py-2.5 text-xs bg-slate-50 rounded-xl border border-slate-200 focus:bg-white focus:border-primary outline-none font-mono"><?php echo htmlspecialchars($service['content'] ?? ''); ?></textarea>
    </div>

    <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
      <a href="/admin/services" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-colors">
        Hủy bỏ
      </a>
      <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-primary hover:bg-slate-800 transition-colors shadow-sm">
        <?php echo $isEdit ? 'Lưu thay đổi' : 'Tạo dịch vụ'; ?>
      </button>
    </div>
  </form>
</div>

<?php include APP_ROOT . '/views/layouts/admin_footer.php'; ?>
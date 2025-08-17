<?php
// Form thêm tin tức mới
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Thêm Tin Tức Mới</h2>
        <a href="?controller=news&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
    </div>

    <?php if (!empty($errors)): ?>
        <div style="background: #e74c3c; color: white; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
            <strong>Lỗi:</strong>
            <ul style="margin: 8px 0 0 20px;">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

<form action="" method="post" enctype="multipart/form-data" style="max-width:600px;margin:24px auto 0 auto;background:#fff;padding:24px 32px;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
  <div style="margin-bottom:16px;">
    <label for="TieuDe">Tiêu đề:</label><br>
    <input type="text" id="TieuDe" name="TieuDe" required style="width:100%;padding:8px;" placeholder="VD: Tour Đà Lạt mới ra mắt">
  </div>

  <div style="margin-bottom:16px;">
    <label for="MoTa">Mô tả ngắn:</label><br>
    <textarea id="MoTa" name="MoTa" rows="3" style="width:100%;padding:8px;" placeholder="Mô tả ngắn gọn về tin tức"></textarea>
  </div>

  <div style="margin-bottom:16px;">
    <label for="ChuDe">Chủ đề:</label><br>
    <input type="text" id="ChuDe" name="ChuDe" required style="width:100%;padding:8px;" placeholder="VD: Du lịch, Ẩm thực, Khám phá">
  </div>

  <div style="margin-bottom:16px;">
    <label for="NoiDung">Nội dung chi tiết:</label><br>
    <textarea id="NoiDung" name="NoiDung" rows="6" style="width:100%;padding:8px;" placeholder="Nội dung đầy đủ của bài viết"></textarea>
  </div>

  <div style="margin-bottom:16px;">
    <label for="HinhDaiDien">Hình đại diện:</label><br>
    <input type="file" id="HinhDaiDien" name="HinhDaiDien" accept="image/*" required style="width:100%;padding:8px;">
  </div>

  <div style="margin-bottom:16px;">
    <label for="TacGia">Tác giả:</label><br>
    <input type="text" id="TacGia" name="TacGia" required style="width:100%;padding:8px;" placeholder="VD: Admin, Quản trị viên">
  </div>

  <div style="margin-bottom:16px;">
    <label for="TrangThai">Trạng thái:</label><br>
    <select name="TrangThai" required style="width:100%;padding:8px;">
        <option value="1">Xuất bản</option>
        <option value="0">Nháp</option>
    </select>
  </div>

  <div style="text-align:center;">
    <button type="submit" name="addNews" style="background:#2c3e50;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;">Thêm Tin Tức</button>
  </div>
</form>
</div>

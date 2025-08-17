<?php
// Trang chỉnh sửa liên hệ
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Liên Hệ #<?= $contact['MaLienHe'] ?? '' ?></h2>
        <div>
            <a href="?controller=contact&action=show&id=<?= $contact['MaLienHe'] ?>" style="background: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Xem Chi Tiết</a>
            <a href="?controller=contact&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
        </div>
    </div>

    <?php if (isset($contact) && $contact): ?>
        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <form method="POST" action="?controller=contact&action=update">
                <input type="hidden" name="MaLienHe" value="<?= htmlspecialchars($contact['MaLienHe'] ?? '') ?>">
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Họ Tên: <span style="color: red;">*</span></label>
                        <input type="text" name="HoTen" value="<?= htmlspecialchars($contact['HoTen'] ?? '') ?>" required 
                               style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
                               placeholder="Nhập họ tên người liên hệ">
                    </div>

                    <div>
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Số Điện Thoại: <span style="color: red;">*</span></label>
                        <input type="tel" name="SoDienThoai" value="<?= htmlspecialchars($contact['SoDienThoai'] ?? '') ?>" required 
                               style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
                               placeholder="Nhập số điện thoại">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Trạng Thái:</label>
                    <select name="TrangThai" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                        <option value="1" <?= ($contact['TrangThai'] ?? '') == '1' ? 'selected' : '' ?>>Chưa xử lý</option>
                        <option value="0" <?= ($contact['TrangThai'] ?? '') == '0' ? 'selected' : '' ?>>Đã xử lý</option>
                    </select>
                    <small style="color: #7f8c8d; font-style: italic;">Ngày tạo: <?= date('d/m/Y H:i', strtotime($contact['NgayTao'] ?? '')) ?></small>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Ghi Chú:</label>
                    <textarea name="GhiChu" rows="6" 
                              style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; resize: vertical;"
                              placeholder="Nhập nội dung ghi chú, yêu cầu hoặc câu hỏi từ khách hàng..."><?= htmlspecialchars($contact['GhiChu'] ?? '') ?></textarea>
                </div>

                <div style="text-align: center; padding-top: 20px; border-top: 2px solid #ecf0f1;">
                    <button type="submit" 
                            style="background: #27ae60; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-right: 10px;">
                        ✅ Cập Nhật
                    </button>
                    <a href="?controller=contact&action=show&id=<?= $contact['MaLienHe'] ?>" 
                       style="background: #3498db; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 16px; margin-right: 10px;">
                        👁️ Xem Chi Tiết
                    </a>
                    <a href="?controller=contact&action=index" 
                       style="background: #95a5a6; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 16px;">
                        ❌ Hủy
                    </a>
                </div>
            </form>
        </div>

        <script>
            // Validate form trước khi submit
            document.querySelector('form').addEventListener('submit', function(e) {
                const hoTen = document.querySelector('input[name="HoTen"]').value.trim();
                const soDienThoai = document.querySelector('input[name="SoDienThoai"]').value.trim();
                
                if (!hoTen) {
                    alert('Vui lòng nhập họ tên!');
                    e.preventDefault();
                    return;
                }
                
                if (!soDienThoai) {
                    alert('Vui lòng nhập số điện thoại!');
                    e.preventDefault();
                    return;
                }
                
                // Validate số điện thoại (đơn giản)
                const phoneRegex = /^[0-9+\-\s\(\)]{10,15}$/;
                if (!phoneRegex.test(soDienThoai)) {
                    alert('Số điện thoại không hợp lệ!');
                    e.preventDefault();
                    return;
                }
            });
        </script>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #e74c3c; font-size: 16px;">❌ Không tìm thấy thông tin liên hệ này.</p>
            <a href="?controller=contact&action=index" style="background: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Quay lại danh sách</a>
        </div>
    <?php endif; ?>
</div>
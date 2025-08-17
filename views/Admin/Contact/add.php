<?php
// Trang thêm liên hệ mới
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Thêm Liên Hệ Mới</h2>
        <a href="?controller=contact&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
    </div>

    <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <form method="POST" action="?controller=contact&action=add">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Họ Tên: <span style="color: red;">*</span></label>
                    <input type="text" name="HoTen" required 
                           style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
                           placeholder="Nhập họ tên người liên hệ">
                </div>

                <div>
                    <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Số Điện Thoại: <span style="color: red;">*</span></label>
                    <input type="tel" name="SoDienThoai" required 
                           style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;"
                           placeholder="Nhập số điện thoại">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Trạng Thái:</label>
                <select name="TrangThai" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                    <option value="1">Chưa xử lý</option>
                    <option value="0">Đã xử lý</option>
                </select>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 8px;">Ghi Chú:</label>
                <textarea name="GhiChu" rows="5" 
                          style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; resize: vertical;"
                          placeholder="Nhập nội dung ghi chú, yêu cầu hoặc câu hỏi từ khách hàng..."></textarea>
            </div>

            <div style="text-align: center;">
                <button type="submit" 
                        style="background: #27ae60; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-right: 10px;">
                    ✅ Thêm Liên Hệ
                </button>
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
</div>
<?php
// Form thêm đánh giá mới
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Thêm Đánh Giá Mới</h2>
        <a href="?controller=rate&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
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

    <form action="" method="post" style="max-width:600px;margin:24px auto 0 auto;background:#fff;padding:24px 32px;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
        <div style="margin-bottom:16px;">
            <label for="MaKhachHang">Mã Khách Hàng:</label><br>
            <input type="number" id="MaKhachHang" name="MaKhachHang" required style="width:100%;padding:8px;" placeholder="Nhập mã khách hàng">
        </div>

        <div style="margin-bottom:16px;">
            <label for="MaTour">Mã Tour:</label><br>
            <input type="number" id="MaTour" name="MaTour" required style="width:100%;padding:8px;" placeholder="Nhập mã tour">
        </div>

        <div style="margin-bottom:16px;">
            <label for="SoSao">Số Sao (1-5):</label><br>
            <input type="number" id="SoSao" name="SoSao" min="1" max="5" required style="width:100%;padding:8px;" placeholder="VD: 5">
        </div>

        <div style="margin-bottom:16px;">
            <label for="NhanXet">Nhận Xét:</label><br>
            <textarea id="NhanXet" name="NhanXet" rows="4" style="width:100%;padding:8px;" placeholder="Viết cảm nhận của bạn..."></textarea>
        </div>

        <div style="margin-bottom:16px;">
            <label for="NgayDang">Ngày Đăng:</label><br>
            <input type="date" id="NgayDang" name="NgayDang" required style="width:100%;padding:8px;">
        </div>

        <div style="text-align:center;">
            <button type="submit" name="addRate" style="background:#2c3e50;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;">Thêm Đánh Giá</button>
        </div>
    </form>
</div>

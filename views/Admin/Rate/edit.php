<?php 
// Form chỉnh sửa đánh giá
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Đánh Giá</h2>
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

    <form action="index.php?controller=rate&action=update" method="post" style="max-width:700px;margin:24px auto 0;background:#fff;padding:24px 32px;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
        <input type="hidden" name="MaDanhGia" value="<?= htmlspecialchars($rate['MaDanhGia']) ?>">

        <div style="margin-bottom:16px;">
            <label for="MaKhachHang">Mã Khách Hàng:</label><br>
            <input type="number" id="MaKhachHang" name="MaKhachHang" value="<?= htmlspecialchars($rate['MaKhachHang']) ?>" required style="width:100%;padding:8px;" placeholder="Nhập mã khách hàng">
        </div>

        <div style="margin-bottom:16px;">
            <label for="MaTour">Mã Tour:</label><br>
            <input type="number" id="MaTour" name="MaTour" value="<?= htmlspecialchars($rate['MaTour']) ?>" required style="width:100%;padding:8px;" placeholder="Nhập mã tour">
        </div>

        <div style="margin-bottom:16px;">
            <label for="SoSao">Số Sao (1 - 5):</label><br>
            <input type="number" id="SoSao" name="SoSao" min="1" max="5" value="<?= htmlspecialchars($rate['SoSao']) ?>" required style="width:100%;padding:8px;" placeholder="VD: 5">
        </div>

        <div style="margin-bottom:16px;">
            <label for="NhanXet">Nhận Xét:</label><br>
            <textarea id="NhanXet" name="NhanXet" rows="4" style="width:100%;padding:8px;" placeholder="Nội dung nhận xét..."><?= htmlspecialchars($rate['NhanXet']) ?></textarea>
        </div>

        <div style="margin-bottom:16px;">
            <label for="NgayDang">Ngày Đăng:</label><br>
            <input type="date" id="NgayDang" name="NgayDang" value="<?= htmlspecialchars($rate['NgayDang']) ?>" required style="width:100%;padding:8px;">
        </div>

        <div style="text-align:center;">
            <button type="submit" name="updateRate" style="background:#2c3e50;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;">Cập Nhật</button>
            <a href="?controller=rate&action=index" style="background:#95a5a6;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;text-decoration:none;margin-left:10px;">Hủy</a>
        </div>
    </form>
</div>

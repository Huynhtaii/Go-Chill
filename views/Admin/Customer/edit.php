<?php 
// Form chỉnh sửa thông tin khách hàng
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Khách Hàng</h2>
        <a href="?controller=customer&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
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

    <form action="index.php?controller=customer&action=update" method="post" style="max-width:700px;margin:24px auto 0;background:#fff;padding:24px 32px;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
        <input type="hidden" name="MaKhachHang" value="<?= $customer['MaKhachHang'] ?>">

        <div style="margin-bottom:16px;">
            <label for="HoTen">Họ tên:</label><br>
            <input type="text" id="HoTen" name="HoTen" value="<?= htmlspecialchars($customer['HoTen']) ?>" required style="width:100%;padding:8px;" placeholder="VD: Nguyễn Văn A">
        </div>

        <div style="margin-bottom:16px;">
            <label for="SoDienThoai">Số điện thoại:</label><br>
            <input type="text" id="SoDienThoai" name="SoDienThoai" value="<?= htmlspecialchars($customer['SoDienThoai']) ?>" required style="width:100%;padding:8px;" placeholder="VD: 0987654321">
        </div>

        <div style="margin-bottom:16px;">
            <label for="Email">Email:</label><br>
            <input type="email" id="Email" name="Email" value="<?= htmlspecialchars($customer['Email']) ?>" required style="width:100%;padding:8px;" placeholder="VD: email@example.com">
        </div>

        <div style="margin-bottom:16px;">
            <label for="MatKhau">Mật khẩu:</label><br>
            <input type="text" id="MatKhau" name="MatKhau" value="<?= htmlspecialchars($customer['MatKhau']) ?>" required style="width:100%;padding:8px;" placeholder="Nhập mật khẩu mới nếu muốn đổi">
        </div>

        <div style="margin-bottom:16px;">
            <label for="VaiTro">Vai trò:</label><br>
            <select id="VaiTro" name="VaiTro" required style="width:100%;padding:8px;">
                <option value="user" <?= $customer['VaiTro'] == 'user' ? 'selected' : '' ?>>Người dùng</option>
                <option value="admin" <?= $customer['VaiTro'] == 'admin' ? 'selected' : '' ?>>Quản trị viên</option>
            </select>
        </div>

        <div style="margin-bottom:16px;">
            <label for="TinhThanh">Tỉnh/Thành:</label><br>
            <input type="text" id="TinhThanh" name="TinhThanh" value="<?= htmlspecialchars($customer['TinhThanh']) ?>" style="width:100%;padding:8px;" placeholder="VD: TP.HCM, Hà Nội...">
        </div>

        <div style="margin-bottom:16px;">
            <label for="QuanHuyen">Quận/Huyện:</label><br>
            <input type="text" id="QuanHuyen" name="QuanHuyen" value="<?= htmlspecialchars($customer['QuanHuyen']) ?>" style="width:100%;padding:8px;" placeholder="VD: Quận 1, Huyện Bình Chánh...">
        </div>

        <div style="text-align:center;">
            <button type="submit" name="updateCustomer" style="background:#2c3e50;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;">Cập Nhật</button>
            <a href="?controller=customer&action=index" style="background:#95a5a6;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;text-decoration:none;margin-left:10px;">Hủy</a>
        </div>
    </form>
</div>

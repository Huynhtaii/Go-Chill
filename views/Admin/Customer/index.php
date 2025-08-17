<?php
// Trang hiển thị danh sách khách hàng
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Khách Hàng</h2>
        <a href="?controller=customer&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Thêm Khách Hàng</a>
    </div>

    <?php 
    if (isset($customers) && !empty($customers)): 
    ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #34495e; color: white;">
                    <th style="padding: 12px;">ID</th>
                    <th style="padding: 12px;">Họ Tên</th>
                    <th style="padding: 12px;">SĐT</th>
                    <th style="padding: 12px;">Email</th>
                    <th style="padding: 12px;">Mật Khẩu</th>
                    <th style="padding: 12px;">Vai Trò</th>
                    <th style="padding: 12px;">Tỉnh/Thành</th>
                    <th style="padding: 12px;">Quận/Huyện</th>
                    <th style="padding: 12px;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $cus): ?>
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 12px;"><?= $cus['MaKhachHang'] ?></td>
                        <td style="padding: 12px; font-weight: bold;"><?= htmlspecialchars($cus['HoTen'] ?? '') ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cus['SoDienThoai'] ?? '') ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cus['Email'] ?? '') ?></td>
                        <td style="padding: 12px;">
                            <?= str_repeat('•', 8) // không hiển thị mật khẩu thực tế ?>
                        </td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cus['VaiTro'] ?? '') ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cus['TinhThanh'] ?? '') ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cus['QuanHuyen'] ?? '') ?></td>
                        <td style="padding: 12px;">
                            <a href="?controller=customer&action=edit&id=<?= $cus['MaKhachHang'] ?>" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Sửa</a>
                            <a href="?controller=customer&action=delete&id=<?= $cus['MaKhachHang'] ?>" onclick="return confirm('Bạn có chắc muốn xóa khách hàng này?')" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có khách hàng nào trong hệ thống.</p>
            <a href="?controller=customer&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Thêm Khách Hàng</a>
        </div>
    <?php endif; ?>
</div>

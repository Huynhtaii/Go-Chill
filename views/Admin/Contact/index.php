<?php
// Trang hiển thị danh sách liên hệ
?>
<div style="padding: 20px;">
    <?php
    // Hiển thị thông báo lỗi/thành công
    if (isset($_GET['error'])) {
        $errorMessage = '';
        switch ($_GET['error']) {
            case 'delete_not_allowed':
                $errorMessage = 'Không thể xóa liên hệ để bảo toàn dữ liệu.';
                break;
        }
        if ($errorMessage) {
            echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">';
            echo '<strong>Lỗi:</strong> ' . htmlspecialchars($errorMessage);
            echo '</div>';
        }
    }
    ?>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Liên Hệ</h2>
        <a href="?controller=contact&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Thêm Liên Hệ</a>
    </div>

    <?php 
    if (isset($contacts) && !empty($contacts)): 
    ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #34495e; color: white;">
                    <th style="padding: 12px;">ID</th>
                    <th style="padding: 12px;">Họ Tên</th>
                    <th style="padding: 12px;">Số Điện Thoại</th>
                    <th style="padding: 12px;">Ghi Chú</th>
                    <th style="padding: 12px;">Trạng Thái</th>
                    <th style="padding: 12px;">Ngày Tạo</th>
                    <th style="padding: 12px;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 12px;"><?= $contact['MaLienHe'] ?></td>
                        <td style="padding: 12px; font-weight: bold;"><?= htmlspecialchars($contact['HoTen'] ?? '') ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($contact['SoDienThoai'] ?? '') ?></td>
                        <td style="padding: 12px; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <?= htmlspecialchars(substr($contact['GhiChu'] ?? '', 0, 50)) ?>
                            <?= strlen($contact['GhiChu'] ?? '') > 50 ? '...' : '' ?>
                        </td>
                        <td style="padding: 12px;">
                            <?php if ($contact['TrangThai'] == 1): ?>
                                <span style="background: #e74c3c; color: white; padding: 4px 8px; border-radius: 12px; font-size: 12px;">Chưa xử lý</span>
                            <?php else: ?>
                                <span style="background: #27ae60; color: white; padding: 4px 8px; border-radius: 12px; font-size: 12px;">Đã xử lý</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px;"><?= date('d/m/Y', strtotime($contact['NgayTao'] ?? '')) ?></td>
                        <td style="padding: 12px;">
                            <a href="?controller=contact&action=show&id=<?= $contact['MaLienHe'] ?>" style="background: #3498db; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px; margin-right: 5px;">Xem</a>
                            <a href="?controller=contact&action=edit&id=<?= $contact['MaLienHe'] ?>" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px; margin-right: 5px;">Sửa</a>
                            <?php if ($contact['TrangThai'] == 1): ?>
                                <a href="?controller=contact&action=markAsProcessed&id=<?= $contact['MaLienHe'] ?>" style="background: #27ae60; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px; margin-right: 5px;">Đã xử lý</a>
                            <?php endif; ?>
                            <!-- Nút xóa đã bị vô hiệu hóa để bảo toàn dữ liệu -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có liên hệ nào trong hệ thống.</p>
            <a href="?controller=contact&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Thêm Liên Hệ</a>
        </div>
    <?php endif; ?>
</div>
<?php
// Trang hiển thị danh sách đơn đặt tour
?>
<div style="padding: 20px;">
    <?php
    // Hiển thị thông báo lỗi/thành công
    if (isset($_GET['error'])) {
        $errorMessage = '';
        switch ($_GET['error']) {
            case 'not_editable':
                $errorMessage = 'Không thể sửa đơn hàng đã thanh toán hoặc đã xử lý.';
                break;
            case 'update_not_allowed':
                $errorMessage = 'Không thể cập nhật đơn hàng đã thanh toán.';
                break;
            case 'delete_not_allowed':
                $errorMessage = 'Không thể xóa đơn hàng để bảo toàn dữ liệu.';
                break;
            case 'status_update_failed':
                $errorMessage = 'Cập nhật trạng thái đơn hàng thất bại.';
                break;
        }
        if ($errorMessage) {
            echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">';
            echo '<strong>Lỗi:</strong> ' . htmlspecialchars($errorMessage);
            echo '</div>';
        }
    }
    
    if (isset($_GET['success'])) {
        $successMessage = '';
        switch ($_GET['success']) {
            case 'updated':
                $successMessage = 'Cập nhật đơn hàng thành công!';
                break;
            case 'status_updated':
                $successMessage = 'Cập nhật trạng thái đơn hàng thành công!';
                break;
        }
        if ($successMessage) {
            echo '<div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">';
            echo '<strong>Thành công:</strong> ' . htmlspecialchars($successMessage);
            echo '</div>';
        }
    }
    ?>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Đơn Đặt Tour</h2>
        <a href="?controller=order&action=add" class="add-btn">Thêm Đơn Đặt Tour</a>
    </div>

    <?php 
    if (isset($orders) && !empty($orders)): 
    ?>
        <table>
            <thead>
                <tr>
                    <th>Mã Đơn</th>
                    <th>Khách Hàng</th>
                    <th>Tour</th>
                    <th>Số Lượng</th>
                    <th>Tổng Tiền</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['MaDon'] ?></td>
                        <td style="font-weight: bold;"><?= htmlspecialchars($order['TenKhachHang'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($order['TenTour'] ?? 'N/A') ?></td>
                        <td><?= $order['SoLuongNguoi'] ?> người</td>
                        <td style="color: #e74c3c; font-weight: bold;">
                            <?= number_format($order['TongTien'], 0, ',', '.') ?> VNĐ
                        </td>
                        <td><?= date('d/m/Y', strtotime($order['NgayDat'])) ?></td>
                        <td>
                            <?php 
                            $status = $order['TrangThai'] ?? '';
                            $statusClass = 'badge-trangthai ';
                            switch($status) {
                                case 'Đã thanh toán':
                                    $statusClass .= 'badge-hoatdong';
                                    break;
                                case 'Chờ duyệt':
                                    $statusClass .= 'badge-tamdung';
                                    break;
                                case 'Đã duyệt':
                                    $statusClass .= 'badge-hoatdong';
                                    break;
                                case 'Đã hủy':
                                    $statusClass .= 'badge-dahuy';
                                    break;
                                default:
                                    $statusClass .= 'badge-tamdung';
                            }
                            ?>
                            <span class="<?= $statusClass ?>">
                                <?= htmlspecialchars($status) ?>
                            </span>
                        </td>
                        <td>
                            <a href="?controller=order&action=show&id=<?= $order['MaDon'] ?>" class="btn-action btn-view">Xem</a>
                            <?php if ($order['TrangThai'] === 'Chờ duyệt'): ?>
                                <a href="?controller=order&action=edit&id=<?= $order['MaDon'] ?>" class="btn-action btn-edit">Sửa</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có đơn đặt tour nào trong hệ thống.</p>
            <a href="?controller=order&action=add" class="add-btn">Thêm Đơn Đặt Tour</a>
        </div>
    <?php endif; ?>
</div> 
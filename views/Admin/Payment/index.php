<?php
// Trang hiển thị danh sách thanh toán
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Thanh Toán</h2>
        <a href="?controller=payment&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Thêm Thanh Toán</a>
    </div>

    <?php 
    if (isset($payments) && !empty($payments)): 
    ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #34495e; color: white;">
                    <th style="padding: 12px;">Mã TT</th>
                    <th style="padding: 12px;">Mã Đơn</th>
                    <th style="padding: 12px;">Khách Hàng</th>
                    <th style="padding: 12px;">Tour</th>
                    <th style="padding: 12px;">Số Tiền</th>
                    <th style="padding: 12px;">Phương Thức</th>
                    <th style="padding: 12px;">Trạng Thái</th>
                    <th style="padding: 12px;">Ngày TT</th>
                    <th style="padding: 12px;">SĐT</th>
                    <th style="padding: 12px;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 12px;"><?= $payment['MaThanhToan'] ?></td>
                        <td style="padding: 12px;"><?= $payment['MaDon'] ?></td>
                        <td style="padding: 12px; font-weight: bold;"><?= htmlspecialchars($payment['TenKhachHang'] ?? 'N/A') ?></td>
                        <td style="padding: 12px;">Tour #<?= htmlspecialchars($payment['MaTour'] ?? 'N/A') ?></td>
                        <td style="padding: 12px; color: #e74c3c; font-weight: bold;">
                            <?= number_format($payment['SoTienThanhToan'] ?? 0, 0, ',', '.') ?> VNĐ
                        </td>
                        <td style="padding: 12px;"><?= htmlspecialchars($payment['PhuongThucThanhToan'] ?? '') ?></td>
                        <td style="padding: 12px;">
                            <?php 
                            $status = $payment['TrangThai'] ?? '';
                            $statusColor = '';
                            switch($status) {
                                case 'paid':
                                    $statusColor = '#27ae60';
                                    $statusText = 'Đã thanh toán';
                                    break;
                                case 'pending':
                                    $statusColor = '#f39c12';
                                    $statusText = 'Chờ thanh toán';
                                    break;
                                case 'failed':
                                    $statusColor = '#e74c3c';
                                    $statusText = 'Thất bại';
                                    break;
                                case 'refunded':
                                    $statusColor = '#95a5a6';
                                    $statusText = 'Đã hoàn tiền';
                                    break;
                                default:
                                    $statusColor = '#95a5a6';
                                    $statusText = $status;
                            }
                            ?>
                            <span style="background: <?= $statusColor ?>; color: white; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                                <?= htmlspecialchars($statusText) ?>
                            </span>
                        </td>
                        <td style="padding: 12px;"><?= htmlspecialchars($payment['NgayThanhToan'] ?? '') ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($payment['SoDT'] ?? '') ?></td>
                        <td style="padding: 12px;">
                            <a href="?controller=payment&action=edit&id=<?= $payment['MaThanhToan'] ?>" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Sửa</a>
                            <a href="?controller=payment&action=delete&id=<?= $payment['MaThanhToan'] ?>" onclick="return confirm('Bạn có chắc muốn xóa thanh toán này?')" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có thanh toán nào trong hệ thống.</p>
            <a href="?controller=payment&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Thêm Thanh Toán</a>
        </div>
    <?php endif; ?>
</div> 
<?php
// Trang xem chi tiết đơn đặt tour
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chi Tiết Đơn Đặt Tour</h2>
        <a href="?controller=order&action=index" class="btn-quaylai">Quay Lại</a>
    </div>

    <?php if (isset($order) && $order): ?>
        <div class="form-container">
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Mã Đơn</label>
                    <div class="form-input" style="background: #f8f9fa; color: #2c3e50; font-weight: bold;">
                        #<?= $order['MaDon'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Khách Hàng</label>
                    <div class="form-input" style="background: #f8f9fa;">
                        <?= htmlspecialchars($order['TenKhachHang'] ?? 'N/A') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Tour</label>
                    <div class="form-input" style="background: #f8f9fa;">
                        <?= htmlspecialchars($order['TenTour'] ?? 'N/A') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Ngày Đặt</label>
                    <div class="form-input" style="background: #f8f9fa;">
                        <?= date('d/m/Y', strtotime($order['NgayDat'])) ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Số Lượng Người</label>
                    <div class="form-input" style="background: #f8f9fa;">
                        <?= $order['SoLuongNguoi'] ?> người
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Tổng Tiền</label>
                    <div class="form-input" style="background: #f8f9fa; color: #e74c3c; font-weight: bold;">
                        <?= number_format($order['TongTien'], 0, ',', '.') ?> VNĐ
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Phương Thức Thanh Toán</label>
                    <div class="form-input" style="background: #f8f9fa;">
                        <?= htmlspecialchars($order['PhuongThucThanhToan'] ?? 'Chưa chọn') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Trạng Thái</label>
                    <div class="form-input" style="background: #f8f9fa;">
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
                    </div>
                </div>

                <?php if (!empty($order['SoTienThanhToan'])): ?>
                    <div class="form-group">
                        <label class="form-label">Số Tiền Đã Thanh Toán</label>
                        <div class="form-input" style="background: #f8f9fa; color: #27ae60; font-weight: bold;">
                            <?= number_format($order['SoTienThanhToan'], 0, ',', '.') ?> VNĐ
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ngày Thanh Toán</label>
                        <div class="form-input" style="background: #f8f9fa;">
                            <?= date('d/m/Y', strtotime($order['NgayThanhToan'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($order['GhiChu'])): ?>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label">Ghi Chú</label>
                        <div class="form-textarea" style="background: #f8f9fa; min-height: 80px;">
                            <?= nl2br(htmlspecialchars($order['GhiChu'])) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <a href="?controller=order&action=edit&id=<?= $order['MaDon'] ?>" class="btn-action btn-edit">Chỉnh Sửa</a>
                <a href="?controller=order&action=index" class="btn-cancel">Quay Lại</a>
            </div>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #e74c3c; font-size: 16px;">Không tìm thấy đơn đặt tour!</p>
            <a href="?controller=order&action=index" class="add-btn">Quay Lại Danh Sách</a>
        </div>
    <?php endif; ?>
</div> 
<?php
// Trang chỉnh sửa đơn đặt tour
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Đơn Đặt Tour</h2>
        <a href="?controller=order&action=index" class="btn-quaylai">Quay Lại</a>
    </div>

    <?php if (isset($order) && $order): ?>
        <div class="form-container">
            <form method="POST" action="?controller=order&action=update">
                <input type="hidden" name="MaDon" value="<?= $order['MaDon'] ?>">
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Khách Hàng *</label>
                        <select name="MaKhachHang" class="form-select" required>
                            <option value="">Chọn khách hàng</option>
                            <?php foreach ($customers as $customer): ?>
                                <option value="<?= $customer['MaKhachHang'] ?>" <?= ($customer['MaKhachHang'] == $order['MaKhachHang']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($customer['HoTen']) ?> - <?= htmlspecialchars($customer['SoDienThoai'] ?? '') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tour *</label>
                        <select name="MaTour" class="form-select" required>
                            <option value="">Chọn tour</option>
                            <?php foreach ($tours as $tour): ?>
                                <option value="<?= $tour['MaTour'] ?>" data-price="<?= $tour['GiaTour'] ?? 0 ?>" <?= ($tour['MaTour'] == $order['MaTour']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($tour['TenTour']) ?> - <?= number_format($tour['GiaTour'] ?? 0, 0, ',', '.') ?> VNĐ
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ngày Đặt *</label>
                        <input type="date" name="NgayDat" class="form-input" value="<?= $order['NgayDat'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Số Lượng Người *</label>
                        <input type="number" name="SoLuongNguoi" class="form-input" min="1" value="<?= $order['SoLuongNguoi'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tổng Tiền (VNĐ) *</label>
                        <input type="number" name="TongTien" class="form-input" id="tongTien" value="<?= $order['TongTien'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phương Thức Thanh Toán</label>
                        <select name="PhuongThucThanhToan" class="form-select">
                            <option value="Tiền mặt" <?= ($order['PhuongThucThanhToan'] == 'Tiền mặt') ? 'selected' : '' ?>>Tiền mặt</option>
                            <option value="Chuyển khoản" <?= ($order['PhuongThucThanhToan'] == 'Chuyển khoản') ? 'selected' : '' ?>>Chuyển khoản</option>
                            <option value="Thẻ tín dụng" <?= ($order['PhuongThucThanhToan'] == 'Thẻ tín dụng') ? 'selected' : '' ?>>Thẻ tín dụng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Trạng Thái</label>
                        <select name="TrangThai" class="form-select">
                            <option value="Chờ duyệt" <?= ($order['TrangThai'] == 'Chờ duyệt') ? 'selected' : '' ?>>Chờ duyệt</option>
                            <option value="Đã duyệt" <?= ($order['TrangThai'] == 'Đã duyệt') ? 'selected' : '' ?>>Đã duyệt</option>
                            <option value="Đã thanh toán" <?= ($order['TrangThai'] == 'Đã thanh toán') ? 'selected' : '' ?>>Đã thanh toán</option>
                            <option value="Đã hủy" <?= ($order['TrangThai'] == 'Đã hủy') ? 'selected' : '' ?>>Đã hủy</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="form-submit">Cập Nhật Đơn Đặt Tour</button>
                    <a href="?controller=order&action=index" class="btn-cancel">Hủy</a>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #e74c3c; font-size: 16px;">Không tìm thấy đơn đặt tour!</p>
            <a href="?controller=order&action=index" class="add-btn">Quay Lại Danh Sách</a>
        </div>
    <?php endif; ?>
</div>

<script>
// Tính tổng tiền tự động
document.querySelector('select[name="MaTour"]').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const price = selectedOption.dataset.price || 0;
    const quantity = document.querySelector('input[name="SoLuongNguoi"]').value || 1;
    const total = price * quantity;
    document.getElementById('tongTien').value = total;
});

document.querySelector('input[name="SoLuongNguoi"]').addEventListener('input', function() {
    const tourSelect = document.querySelector('select[name="MaTour"]');
    const selectedOption = tourSelect.options[tourSelect.selectedIndex];
    const price = selectedOption.dataset.price || 0;
    const quantity = this.value || 1;
    const total = price * quantity;
    document.getElementById('tongTien').value = total;
});
</script> 
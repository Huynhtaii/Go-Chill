<?php
// Trang thêm đơn đặt tour mới
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Thêm Đơn Đặt Tour Mới</h2>
        <a href="?controller=order&action=index" class="btn-quaylai">Quay Lại</a>
    </div>

    <div class="form-container">
        <form method="POST" action="?controller=order&action=add">
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Khách Hàng *</label>
                    <select name="MaKhachHang" class="form-select" required>
                        <option value="">Chọn khách hàng</option>
                        <?php foreach ($customers as $customer): ?>
                            <option value="<?= $customer['MaKhachHang'] ?>">
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
                            <option value="<?= $tour['MaTour'] ?>" data-price="<?= $tour['GiaTour'] ?? 0 ?>">
                                <?= htmlspecialchars($tour['TenTour']) ?> - <?= number_format($tour['GiaTour'] ?? 0, 0, ',', '.') ?> VNĐ
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Ngày Đặt *</label>
                    <input type="date" name="NgayDat" class="form-input" value="<?= date('Y-m-d') ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Số Lượng Người *</label>
                    <input type="number" name="SoLuongNguoi" class="form-input" min="1" value="1" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Tổng Tiền (VNĐ) *</label>
                    <input type="number" name="TongTien" class="form-input" id="tongTien" readonly>
                </div>

                <div class="form-group">
                    <label class="form-label">Phương Thức Thanh Toán</label>
                    <select name="PhuongThucThanhToan" class="form-select">
                        <option value="Tiền mặt">Tiền mặt</option>
                        <option value="Chuyển khoản">Chuyển khoản</option>
                        <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Trạng Thái</label>
                    <select name="TrangThai" class="form-select">
                        <option value="Chờ duyệt">Chờ duyệt</option>
                        <option value="Đã duyệt">Đã duyệt</option>
                        <option value="Đã thanh toán">Đã thanh toán</option>
                        <option value="Đã hủy">Đã hủy</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="form-submit">Thêm Đơn Đặt Tour</button>
                <a href="?controller=order&action=index" class="btn-cancel">Hủy</a>
            </div>
        </form>
    </div>
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
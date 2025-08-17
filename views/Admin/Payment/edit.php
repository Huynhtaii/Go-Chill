<?php
// Trang chỉnh sửa thanh toán
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Thanh Toán</h2>
        <a href="?controller=payment&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
    </div>

    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <form method="POST" action="?controller=payment&action=update" style="max-width: 600px;">
            <input type="hidden" name="MaThanhToan" value="<?= $payment['MaThanhToan'] ?>">
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Đơn Hàng:</label>
                <select name="MaDon" required style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;">
                    <option value="">Chọn đơn hàng</option>
                    <?php if (isset($orders) && !empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <option value="<?= $order['MaDon'] ?>" <?= ($order['MaDon'] == $payment['MaDon']) ? 'selected' : '' ?>>
                                Đơn #<?= $order['MaDon'] ?> - <?= htmlspecialchars($order['HoTen']) ?> - Tour #<?= htmlspecialchars($order['MaTour']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Mã Voucher (Tùy chọn):</label>
                <select name="MaVoucher" style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;">
                    <option value="">Không sử dụng voucher</option>
                    <?php if (isset($vouchers) && !empty($vouchers)): ?>
                        <?php foreach ($vouchers as $voucher): ?>
                            <option value="<?= $voucher['MaVoucher'] ?>" <?= ($voucher['MaVoucher'] == $payment['MaVoucher']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($voucher['TenVoucher']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Số Tiền Thanh Toán (VNĐ):</label>
                <input type="number" name="SoTienThanhToan" required min="0" step="1000" value="<?= $payment['SoTienThanhToan'] ?? '' ?>" style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;" placeholder="Nhập số tiền">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Ngày Thanh Toán:</label>
                <input type="date" name="NgayThanhToan" value="<?= $payment['NgayThanhToan'] ?? date('Y-m-d') ?>" required style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Phương Thức Thanh Toán:</label>
                <select name="PhuongThucThanhToan" required style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;">
                    <option value="">Chọn phương thức</option>
                    <option value="cash" <?= ($payment['PhuongThucThanhToan'] == 'cash') ? 'selected' : '' ?>>Tiền mặt</option>
                    <option value="bank_transfer" <?= ($payment['PhuongThucThanhToan'] == 'bank_transfer') ? 'selected' : '' ?>>Chuyển khoản</option>
                    <option value="credit_card" <?= ($payment['PhuongThucThanhToan'] == 'credit_card') ? 'selected' : '' ?>>Thẻ tín dụng</option>
                    <option value="momo" <?= ($payment['PhuongThucThanhToan'] == 'momo') ? 'selected' : '' ?>>MoMo</option>
                    <option value="vnpay" <?= ($payment['PhuongThucThanhToan'] == 'vnpay') ? 'selected' : '' ?>>VNPay</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Số Điện Thoại:</label>
                <input type="text" name="SoDT" value="<?= htmlspecialchars($payment['SoDT'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;" placeholder="Nhập số điện thoại">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Địa Chỉ:</label>
                <input type="text" name="DiaChi" value="<?= htmlspecialchars($payment['DiaChi'] ?? '') ?>" style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;" placeholder="Nhập địa chỉ">
            </div>



            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Trạng Thái:</label>
                <select name="TrangThai" required style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px;">
                    <option value="">Chọn trạng thái</option>
                    <option value="pending" <?= ($payment['TrangThai'] == 'pending') ? 'selected' : '' ?>>Chờ thanh toán</option>
                    <option value="paid" <?= ($payment['TrangThai'] == 'paid') ? 'selected' : '' ?>>Đã thanh toán</option>
                    <option value="failed" <?= ($payment['TrangThai'] == 'failed') ? 'selected' : '' ?>>Thất bại</option>
                    <option value="refunded" <?= ($payment['TrangThai'] == 'refunded') ? 'selected' : '' ?>>Đã hoàn tiền</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #2c3e50;">Ghi Chú:</label>
                <textarea name="GhiChu" rows="4" style="width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px; resize: vertical;" placeholder="Nhập ghi chú (nếu có)"><?= htmlspecialchars($payment['GhiChu'] ?? '') ?></textarea>
            </div>

            <div style="text-align: center;">
                <button type="submit" style="background: #f39c12; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-right: 10px;">Cập Nhật</button>
                <a href="?controller=payment&action=index" style="background: #95a5a6; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 16px;">Hủy</a>
            </div>
        </form>
    </div>
</div> 
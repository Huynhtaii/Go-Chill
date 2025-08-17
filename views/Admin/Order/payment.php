<?php
// Form thanh toán cho đơn đặt tour
?>
<style>
    .payment-container {
        padding: 20px;
        background: #f8f9fa;
    }
    
    .payment-header {
        background: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .payment-form {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: block;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .form-input, .form-select, .form-textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #ecf0f1;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
    }
    
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: #3498db;
    }
    
    .btn {
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }
    
    .btn-primary {
        background: #27ae60;
        color: white;
    }
    
    .btn-secondary {
        background: #95a5a6;
        color: white;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .order-summary {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #3498db;
        margin-bottom: 20px;
    }
</style>

<div class="payment-container">
    <!-- Header -->
    <div class="payment-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2>💳 Thanh Toán Đơn Đặt Tour #<?= $order['MaDon'] ?? '' ?></h2>
                <p style="color: #7f8c8d; margin: 0;">Xử lý thanh toán cho đơn đặt tour</p>
            </div>
            <a href="?controller=order&action=index" class="btn btn-secondary">← Quay lại</a>
        </div>
    </div>

    <?php if (isset($order) && $order): ?>
        <!-- Tóm tắt đơn hàng -->
        <div class="order-summary">
            <h3 style="color: #2c3e50; margin-bottom: 15px;">📋 Thông tin đơn đặt tour</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <p><strong>👤 Khách hàng:</strong> <?= htmlspecialchars($order['TenKhachHang'] ?? 'N/A') ?></p>
                    <p><strong>🏖️ Tour:</strong> <?= htmlspecialchars($order['TenTour'] ?? 'N/A') ?></p>
                    <p><strong>📅 Ngày đặt:</strong> <?= date('d/m/Y', strtotime($order['NgayDat'] ?? '')) ?></p>
                </div>
                <div>
                    <p><strong>👥 Số lượng:</strong> <?= $order['SoLuongNguoi'] ?? 0 ?> người</p>
                    <p><strong>💰 Tổng tiền:</strong> <span style="color: #e74c3c; font-weight: bold; font-size: 18px;"><?= number_format($order['TongTien'] ?? 0, 0, ',', '.') ?> VNĐ</span></p>
                    <p><strong>📊 Trạng thái:</strong> <span style="background: #f39c12; color: white; padding: 4px 8px; border-radius: 12px; font-size: 12px;"><?= htmlspecialchars($order['TrangThai'] ?? '') ?></span></p>
                </div>
            </div>
        </div>

        <!-- Form thanh toán -->
        <div class="payment-form">
            <h3 style="color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #ecf0f1; padding-bottom: 10px;">💳 Thông tin thanh toán</h3>
            
            <form method="POST" action="?controller=order&action=payment&id=<?= $order['MaDon'] ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">💰 Số tiền thanh toán (VNĐ): <span style="color: red;">*</span></label>
                        <input type="number" name="SoTienThanhToan" class="form-input" 
                               value="<?= $order['TongTien'] ?? 0 ?>" required
                               placeholder="Nhập số tiền thanh toán">
                    </div>

                    <div class="form-group">
                        <label class="form-label">📅 Ngày thanh toán:</label>
                        <input type="date" name="NgayThanhToan" class="form-input" 
                               value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">💳 Phương thức thanh toán: <span style="color: red;">*</span></label>
                        <select name="PhuongThucThanhToan" class="form-select" required>
                            <option value="">Chọn phương thức thanh toán</option>
                            <option value="Tiền mặt">💵 Tiền mặt</option>
                            <option value="Chuyển khoản">🏦 Chuyển khoản ngân hàng</option>
                            <option value="Thẻ tín dụng">💳 Thẻ tín dụng</option>
                            <option value="Ví điện tử">📱 Ví điện tử (MoMo, ZaloPay...)</option>
                            <option value="QR Code">📄 QR Code</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">🎫 Voucher giảm giá:</label>
                        <select name="MaVoucher" class="form-select">
                            <option value="">Không sử dụng voucher</option>
                            <?php if (!empty($vouchers)): ?>
                                <?php foreach ($vouchers as $voucher): ?>
                                    <option value="<?= $voucher['MaVoucher'] ?>">
                                        <?= htmlspecialchars($voucher['TenVoucher'] ?? '') ?> 
                                        (<?= $voucher['LoaiGiamGia'] == 'percent' ? $voucher['GiaTriGiamGia'] . '%' : number_format($voucher['GiaTriGiamGia'], 0, ',', '.') . 'đ' ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">📞 Số điện thoại:</label>
                        <input type="tel" name="SoDT" class="form-input" 
                               placeholder="Số điện thoại liên hệ">
                    </div>

                    <div class="form-group">
                        <label class="form-label">📍 Địa chỉ:</label>
                        <input type="text" name="DiaChi" class="form-input" 
                               placeholder="Địa chỉ thanh toán">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">📝 Ghi chú:</label>
                    <textarea name="GhiChu" class="form-textarea" rows="4" 
                              placeholder="Ghi chú thêm về thanh toán (tùy chọn)..."></textarea>
                </div>

                <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 2px solid #ecf0f1;">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                        💰 Xác nhận thanh toán
                    </button>
                    <a href="?controller=order&action=show&id=<?= $order['MaDon'] ?>" class="btn btn-secondary">
                        👁️ Xem chi tiết đơn
                    </a>
                </div>
            </form>
        </div>

        <script>
            // Auto-fill voucher calculation
            document.querySelector('select[name="MaVoucher"]').addEventListener('change', function() {
                const originalAmount = <?= $order['TongTien'] ?? 0 ?>;
                const soTienInput = document.querySelector('input[name="SoTienThanhToan"]');
                
                if (this.value === '') {
                    soTienInput.value = originalAmount;
                } else {
                    // Có thể thêm logic tính toán voucher ở đây

                }
            });

            // Validate form
            document.querySelector('form').addEventListener('submit', function(e) {
                const soTien = document.querySelector('input[name="SoTienThanhToan"]').value;
                const phuongThuc = document.querySelector('select[name="PhuongThucThanhToan"]').value;
                
                if (!soTien || soTien <= 0) {
                    alert('Vui lòng nhập số tiền thanh toán hợp lệ!');
                    e.preventDefault();
                    return;
                }
                
                if (!phuongThuc) {
                    alert('Vui lòng chọn phương thức thanh toán!');
                    e.preventDefault();
                    return;
                }
                
                if (!confirm('Bạn có chắc chắn muốn xác nhận thanh toán cho đơn hàng này?')) {
                    e.preventDefault();
                }
            });
        </script>

    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #e74c3c; font-size: 16px;">❌ Không tìm thấy thông tin đơn đặt tour.</p>
            <a href="?controller=order&action=index" class="btn btn-primary">Quay lại danh sách</a>
        </div>
    <?php endif; ?>
</div>
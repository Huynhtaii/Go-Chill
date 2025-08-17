<?php
// Include header
include_once 'header.php';
?>

<style>
    .success-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 40px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        text-align: center;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: #27ae60;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        color: white;
        font-size: 40px;
    }

    .success-title {
        color: #27ae60;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .success-message {
        color: #666;
        font-size: 16px;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .order-details {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
        margin: 30px 0;
        text-align: left;
    }

    .order-details h3 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        padding: 8px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .detail-row:last-child {
        border-bottom: none;
        font-weight: 700;
        color: #e74c3c;
        font-size: 18px;
    }

    .detail-label {
        color: #666;
        font-weight: 500;
    }

    .detail-value {
        color: #2c3e50;
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
    }

    .btn {
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-primary {
        background: #3498db;
        color: white;
    }

    .btn-primary:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #95a5a6;
        color: white;
    }

    .btn-secondary:hover {
        background: #7f8c8d;
        transform: translateY(-2px);
    }

    .btn-success {
        background: #27ae60;
        color: white;
    }

    .btn-success:hover {
        background: #229954;
        transform: translateY(-2px);
    }

    .payment-info {
        background: #e8f5e8;
        border: 1px solid #27ae60;
        border-radius: 8px;
        padding: 15px;
        margin: 20px 0;
    }

    .payment-info h4 {
        color: #27ae60;
        margin-bottom: 10px;
    }

    .payment-info p {
        color: #2c3e50;
        margin: 5px 0;
    }

    @media (max-width: 768px) {
        .success-container {
            margin: 20px;
            padding: 20px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .detail-row {
            flex-direction: column;
            gap: 5px;
        }
    }
</style>

<div class="success-container">
    <div class="success-icon">
        <i class="fa-solid fa-check"></i>
    </div>
    
    <h1 class="success-title">Thanh Toán Thành Công!</h1>
    
    <p class="success-message">
        Cảm ơn bạn đã đặt tour với GO & CHILL Travel. Chúng tôi đã nhận được đơn hàng của bạn và sẽ liên hệ sớm nhất để xác nhận chi tiết.
    </p>

    <div class="order-details">
        <h3>📋 Chi Tiết Đơn Hàng</h3>
        
        <div class="detail-row">
            <span class="detail-label">Mã đơn hàng:</span>
            <span class="detail-value">#<?php echo $successData['orderId']; ?></span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Tour:</span>
            <span class="detail-value"><?php echo htmlspecialchars($successData['tourName']); ?></span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Phương thức thanh toán:</span>
            <span class="detail-value">
                <?php 
                $paymentMethods = [
                    'bank' => 'Chuyển khoản ngân hàng',
                    'momo' => 'Ví MoMo',
                    'zalopay' => 'ZaloPay',
                    'cash' => 'Thanh toán tại văn phòng'
                ];
                echo $paymentMethods[$successData['paymentMethod']] ?? $successData['paymentMethod'];
                ?>
            </span>
        </div>
        
        <div class="detail-row">
            <span class="detail-label">Tổng tiền:</span>
            <span class="detail-value"><?php echo number_format($successData['finalPrice']); ?>₫</span>
        </div>
    </div>

    <?php if ($successData['paymentMethod'] == 'bank'): ?>
        <div class="payment-info">
            <h4>🏦 Thông Tin Chuyển Khoản</h4>
            <p><strong>Ngân hàng:</strong> Vietcombank</p>
            <p><strong>Số tài khoản:</strong> 1234567890</p>
            <p><strong>Chủ tài khoản:</strong> GO & CHILL TRAVEL</p>
            <p><strong>Nội dung:</strong> Thanh toan don hang #<?php echo $successData['orderId']; ?></p>
        </div>
    <?php endif; ?>

    <div class="action-buttons">
        <a href="index1.php?controller=home" class="btn btn-primary">
            <i class="fa-solid fa-home"></i> Về Trang Chủ
        </a>
        
        <a href="index1.php?controller=tour" class="btn btn-secondary">
            <i class="fa-solid fa-plane"></i> Xem Thêm Tour
        </a>
        
        <a href="index1.php?controller=contact" class="btn btn-success">
            <i class="fa-solid fa-phone"></i> Liên Hệ Hỗ Trợ
        </a>
    </div>

    <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #e9ecef;">
        <p style="color: #666; font-size: 14px;">
            <i class="fa-solid fa-info-circle"></i>
            Chúng tôi sẽ gửi email xác nhận đến địa chỉ email của bạn trong vòng 24 giờ.
            Nếu có bất kỳ câu hỏi nào, vui lòng liên hệ hotline: <strong>0903394744</strong>
        </p>
    </div>
</div>

<?php
// Include footer
include_once 'footer.php';
?>

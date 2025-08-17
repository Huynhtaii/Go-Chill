<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công - Go & Chill</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .success-container {
            text-align: center;
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
            position: relative;
            overflow: hidden;
        }
        
        .success-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #00C851, #007E33);
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #00C851, #007E33);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: bounceIn 0.6s ease-out;
        }
        
        .success-icon::before {
            content: '✓';
            color: white;
            font-size: 40px;
            font-weight: bold;
        }
        
        .success-title {
            color: #2c3e50;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }
        
        .success-message {
            color: #7f8c8d;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }
        
        .order-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }
        
        .order-info h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .info-row:last-child {
            border-bottom: none;
            font-weight: bold;
            color: #27ae60;
            font-size: 18px;
        }
        
        .info-label {
            color: #7f8c8d;
        }
        
        .info-value {
            color: #2c3e50;
            font-weight: 500;
        }
        
        .countdown {
            color: #3498db;
            font-size: 14px;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out 0.8s both;
        }
        
        .countdown span {
            font-weight: bold;
            color: #e74c3c;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 1s both;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }
        
        .btn-secondary {
            background: #95a5a6;
            color: white;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #f39c12;
            animation: confetti-fall 3s linear infinite;
        }
        
        .confetti:nth-child(1) { left: 10%; animation-delay: 0s; background: #e74c3c; }
        .confetti:nth-child(2) { left: 20%; animation-delay: 0.5s; background: #3498db; }
        .confetti:nth-child(3) { left: 30%; animation-delay: 1s; background: #2ecc71; }
        .confetti:nth-child(4) { left: 40%; animation-delay: 1.5s; background: #f39c12; }
        .confetti:nth-child(5) { left: 50%; animation-delay: 2s; background: #9b59b6; }
        .confetti:nth-child(6) { left: 60%; animation-delay: 0.3s; background: #1abc9c; }
        .confetti:nth-child(7) { left: 70%; animation-delay: 0.8s; background: #e67e22; }
        .confetti:nth-child(8) { left: 80%; animation-delay: 1.3s; background: #34495e; }
        .confetti:nth-child(9) { left: 90%; animation-delay: 1.8s; background: #e91e63; }
        
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Confetti hiệu ứng -->
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>
    <div class="confetti"></div>

    <div class="success-container">
        <div class="success-icon"></div>
        
        <h1 class="success-title">🎉 Thanh Toán Thành Công!</h1>
        
        <p class="success-message">
            Đơn đặt tour đã được thanh toán thành công và trạng thái đã được cập nhật. 
            Cảm ơn bạn đã sử dụng hệ thống Go & Chill!
        </p>

        <?php if (isset($order) && $order): ?>
        <div class="order-info">
            <h3>📋 Thông tin đơn hàng</h3>
            <div class="info-row">
                <span class="info-label">Mã đơn:</span>
                <span class="info-value">#<?= $order['MaDon'] ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Khách hàng:</span>
                <span class="info-value"><?= htmlspecialchars($order['TenKhachHang'] ?? 'N/A') ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Tour:</span>
                <span class="info-value"><?= htmlspecialchars($order['TenTour'] ?? 'N/A') ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Số lượng:</span>
                <span class="info-value"><?= $order['SoLuongNguoi'] ?> người</span>
            </div>
            <div class="info-row">
                <span class="info-label">Tổng tiền:</span>
                <span class="info-value"><?= number_format($order['TongTien'], 0, ',', '.') ?> VNĐ</span>
            </div>
            <div class="info-row">
                <span class="info-label">Trạng thái:</span>
                <span class="info-value">💰 Đã thanh toán</span>
            </div>
        </div>
        <?php endif; ?>

        <div class="countdown">
            🕐 Tự động chuyển về danh sách đơn hàng sau <span id="countdown">5</span> giây
        </div>

        <div class="action-buttons">
            <a href="?controller=order&action=index" class="btn btn-primary">
                📋 Về danh sách đơn hàng
            </a>
            <a href="?controller=order&action=show&id=<?= $order['MaDon'] ?? '' ?>" class="btn btn-secondary">
                👁️ Xem chi tiết đơn
            </a>
            <a href="?controller=order&action=add" class="btn btn-success">
                ➕ Thêm đơn mới
            </a>
        </div>
    </div>

    <script>
        // Countdown timer
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        
        const timer = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(timer);
                window.location.href = '?controller=order&action=index';
            }
        }, 1000);
        
        // Dừng countdown nếu user hover vào container
        const container = document.querySelector('.success-container');
        container.addEventListener('mouseenter', () => {
            clearInterval(timer);
            countdownElement.parentElement.innerHTML = '⏸️ Đã dừng tự động chuyển trang';
        });
        
        // Sound effect (tùy chọn)
        // const audio = new Audio('data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2/LDciUFLIHO8tiJNwgZaLvt559NEAxQp+PwtmMcBjiR1/LMeSwFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFApGn+DyvmYdBjaJ0vLNeSsFJHfH8N2QQAoUXrTp66hVFA==');
        // audio.play().catch(() => {}); // Play sound if possible
    </script>
</body>
</html>
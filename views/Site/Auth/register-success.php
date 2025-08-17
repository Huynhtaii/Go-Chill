<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành công - Go Chill</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .success-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 60px 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: bounce 1s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .success-icon::before {
            content: '✓';
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .success-title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .success-message {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #079CCC, #0891b2);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0891b2, #079CCC);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(7, 156, 204, 0.3);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #e9ecef;
        }

        .btn-secondary:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        .info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
            border-left: 4px solid #079CCC;
        }

        .info-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .info-text {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        @media (max-width: 480px) {
            .success-container {
                padding: 40px 20px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon"></div>
        
        <h1 class="success-title">Đăng ký thành công!</h1>
        
        <p class="success-message">
            Chúc mừng bạn đã trở thành thành viên của Go Chill! 
            Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận thông tin.
        </p>

        <div class="action-buttons">
            <a href="index1.php" class="btn btn-primary">Về trang chủ</a>
            <a href="index1.php?controller=auth&action=login" class="btn btn-secondary">Đăng nhập</a>
        </div>

        <div class="info-box">
            <div class="info-title">Thông tin bổ sung:</div>
            <div class="info-text">
                • Bạn có thể đăng nhập ngay bằng email và mật khẩu đã đăng ký<br>
                • Kiểm tra email để nhận thông tin xác nhận<br>
                • Liên hệ hotline nếu cần hỗ trợ: 1900-xxxx
            </div>
        </div>
    </div>

    <script>
        // Auto redirect sau 10 giây
        setTimeout(function() {
            window.location.href = 'index1.php';
        }, 10000);
    </script>
</body>
</html>

<?php
// Kiểm tra session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đăng ký - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header h1 {
            color: #333;
            font-size: 24px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary {
            background: #079CCC;
            color: white;
        }

        .btn-primary:hover {
            background: #0891b2;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #079CCC;
            box-shadow: 0 0 0 2px rgba(7, 156, 204, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .required {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thêm đăng ký mới</h1>
            <a href="index.php?controller=register&action=index" class="btn btn-secondary">Quay lại</a>
        </div>

        <div class="form-container">
            <form method="POST" action="index.php?controller=register&action=add">
                <div class="form-group">
                    <label for="fullName" class="form-label">Họ và tên <span class="required">*</span></label>
                    <input type="text" id="fullName" name="fullName" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu <span class="required">*</span></label>
                    <input type="password" id="password" name="password" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Số điện thoại <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" class="form-input" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="province" class="form-label">Tỉnh/Thành</label>
                        <select id="province" name="province" class="form-input">
                            <option value="">Chọn tỉnh thành</option>
                            <option value="hanoi">Hà Nội</option>
                            <option value="hcm">Hồ Chí Minh</option>
                            <option value="danang">Đà Nẵng</option>
                            <option value="haiphong">Hải Phòng</option>
                            <option value="cantho">Cần Thơ</option>
                            <option value="quangninh">Quảng Ninh</option>
                            <option value="ninhbinh">Ninh Bình</option>
                            <option value="quangnam">Quảng Nam</option>
                            <option value="quangbinh">Quảng Bình</option>
                            <option value="quangtri">Quảng Trị</option>
                            <option value="thanhhoa">Thanh Hóa</option>
                            <option value="nghean">Nghệ An</option>
                            <option value="hue">Thừa Thiên Huế</option>
                            <option value="vungtau">Vũng Tàu</option>
                            <option value="dalat">Đà Lạt</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="district" class="form-label">Quận/Huyện</label>
                        <select id="district" name="district" class="form-input">
                            <option value="">Chọn quận huyện</option>
                            <option value="district1">Quận 1</option>
                            <option value="district2">Quận 2</option>
                            <option value="district3">Quận 3</option>
                            <option value="district4">Quận 4</option>
                            <option value="district5">Quận 5</option>
                            <option value="district6">Quận 6</option>
                            <option value="district7">Quận 7</option>
                            <option value="district8">Quận 8</option>
                            <option value="district9">Quận 9</option>
                            <option value="district10">Quận 10</option>
                            <option value="district11">Quận 11</option>
                            <option value="district12">Quận 12</option>
                            <option value="district13">Quận Bình Tân</option>
                            <option value="district14">Quận Bình Thạnh</option>
                            <option value="district15">Quận Gò Vấp</option>
                            <option value="district16">Quận Phú Nhuận</option>
                            <option value="district17">Quận Tân Bình</option>
                            <option value="district18">Quận Tân Phú</option>
                            <option value="district19">Quận Thủ Đức</option>
                            <option value="district20">Huyện Bình Chánh</option>
                            <option value="district21">Huyện Củ Chi</option>
                            <option value="district22">Huyện Cần Giờ</option>
                            <option value="district23">Khác</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="index.php?controller=register&action=index" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

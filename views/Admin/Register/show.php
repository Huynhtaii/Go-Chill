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
    <title>Chi tiết đăng ký - Admin</title>
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

        .btn-warning {
            background: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .detail-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 15px;
        }

        .detail-label {
            width: 150px;
            font-weight: 600;
            color: #495057;
        }

        .detail-value {
            flex: 1;
            color: #333;
        }

        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .status-active {
            color: #28a745;
            font-weight: 500;
        }

        .status-inactive {
            color: #dc3545;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Chi tiết đăng ký</h1>
            <div>
                <a href="index.php?controller=register&action=renderEdit&id=<?php echo $register['id']; ?>" 
                   class="btn btn-warning">Sửa</a>
                <a href="index.php?controller=register&action=index" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>

        <div class="detail-container">
            <div class="detail-row">
                <div class="detail-label">ID:</div>
                <div class="detail-value"><?php echo htmlspecialchars($register['id']); ?></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Họ và tên:</div>
                <div class="detail-value"><?php echo htmlspecialchars($register['HoTen']); ?></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Email:</div>
                <div class="detail-value"><?php echo htmlspecialchars($register['Email']); ?></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Số điện thoại:</div>
                <div class="detail-value"><?php echo htmlspecialchars($register['SoDienThoai']); ?></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Tỉnh/Thành:</div>
                <div class="detail-value"><?php echo htmlspecialchars($register['TinhThanh']); ?></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Quận/Huyện:</div>
                <div class="detail-value"><?php echo htmlspecialchars($register['QuanHuyen']); ?></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Ngày tạo:</div>
                <div class="detail-value"><?php echo date('d/m/Y H:i:s', strtotime($register['NgayTao'])); ?></div>
            </div>

            <div class="actions">
                <a href="index.php?controller=register&action=renderEdit&id=<?php echo $register['id']; ?>" 
                   class="btn btn-warning">Sửa thông tin</a>
                <a href="index.php?controller=register&action=index" class="btn btn-secondary">Quay lại danh sách</a>
            </div>
        </div>
    </div>
</body>
</html>

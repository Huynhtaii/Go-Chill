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
    <title>Quản lý đăng ký - Admin</title>
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
            max-width: 1200px;
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

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-warning {
            background: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .btn-info {
            background: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background: #138496;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

        .status-active {
            color: #28a745;
            font-weight: 500;
        }

        .status-inactive {
            color: #dc3545;
            font-weight: 500;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-state h3 {
            margin-bottom: 10px;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Quản lý đăng ký</h1>
            <a href="index.php?controller=register&action=renderAdd" class="btn btn-primary">Thêm mới</a>
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_SESSION['success_message']); ?>
        </div>
        <?php unset($_SESSION['success_message']); endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($_SESSION['error_message']); ?>
        </div>
        <?php unset($_SESSION['error_message']); endif; ?>

        <div class="table-container">
            <?php if (!empty($registerList)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tỉnh/Thành</th>
                        <th>Quận/Huyện</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registerList as $register): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($register['id']); ?></td>
                        <td><?php echo htmlspecialchars($register['HoTen']); ?></td>
                        <td><?php echo htmlspecialchars($register['Email']); ?></td>
                        <td><?php echo htmlspecialchars($register['SoDienThoai']); ?></td>
                        <td><?php echo htmlspecialchars($register['TinhThanh']); ?></td>
                        <td><?php echo htmlspecialchars($register['QuanHuyen']); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($register['NgayTao'])); ?></td>
                        <td>
                            <div class="actions">
                                <a href="index.php?controller=register&action=show&id=<?php echo $register['id']; ?>" 
                                   class="btn btn-info btn-sm">Xem</a>
                                <a href="index.php?controller=register&action=renderEdit&id=<?php echo $register['id']; ?>" 
                                   class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?controller=register&action=delete&id=<?php echo $register['id']; ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="empty-state">
                <h3>Chưa có đăng ký nào</h3>
                <p>Hãy thêm đăng ký mới hoặc chờ người dùng đăng ký.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

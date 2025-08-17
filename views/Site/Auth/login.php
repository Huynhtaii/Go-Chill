<?php
// Lấy returnUrl trước khi include header
$returnUrl = $_GET['returnUrl'] ?? 'index1.php?controller=home';

// Include header sau khi đã xử lý tất cả logic
$headerPath = __DIR__ . '/../header.php';
if (file_exists($headerPath)) {
    include_once $headerPath;
}
?>

<style>
    .login-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 40px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h1 {
        color: #1e4fae;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .login-header p {
        color: #666;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #1e4fae;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        background: #f7fafd;
        outline: none;
        transition: border 0.2s;
    }

    .form-group input:focus {
        border: 1.5px solid #1e4fae;
    }

    .login-btn {
        width: 100%;
        background: #1e4fae;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 0;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
        margin-bottom: 20px;
    }

    .login-btn:hover {
        background: #153d7a;
    }

    .error-message {
        background: #fee;
        color: #c33;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        text-align: center;
    }

    .register-link {
        text-align: center;
        font-size: 14px;
        color: #666;
    }

    .register-link a {
        color: #1e4fae;
        text-decoration: none;
        font-weight: 600;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    .back-link {
        text-align: center;
        margin-top: 20px;
    }

    .back-link a {
        color: #666;
        text-decoration: none;
        font-size: 14px;
    }

    .back-link a:hover {
        color: #1e4fae;
    }
</style>

<div class="login-container">
    <div class="login-header">
        <h1>Đăng Nhập</h1>
        <p>Vui lòng đăng nhập để tiếp tục</p>
    </div>

    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($_SESSION['login_error']); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index1.php?controller=auth&action=authenticate">
        <input type="hidden" name="returnUrl" value="<?php echo htmlspecialchars($returnUrl); ?>">
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required 
                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="login-btn">Đăng Nhập</button>
    </form>

    <div class="register-link">
        Chưa có tài khoản? 
        <a href="index1.php?controller=register">Đăng ký ngay</a>
    </div>

    <div class="back-link">
        <a href="<?php echo htmlspecialchars($returnUrl); ?>">← Quay lại</a>
    </div>
</div>

<?php
// Include footer
$footerPath = __DIR__ . '/../footer.php';
if (file_exists($footerPath)) {
    include_once $footerPath;
}
?>

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
    .compact-login-container {
        max-width: 350px;
        margin: 30px auto;
        padding: 25px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        border: 1px solid #e8f4fd;
    }

    .compact-login-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .compact-login-header h1 {
        color: #1e4fae;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .compact-login-header p {
        color: #666;
        font-size: 13px;
        margin-bottom: 0;
    }

    .compact-form-group {
        margin-bottom: 15px;
    }

    .compact-form-group label {
        display: block;
        color: #1e4fae;
        font-weight: 500;
        margin-bottom: 5px;
        font-size: 13px;
    }

    .compact-form-group input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        font-size: 13px;
        background: #f9fbfc;
        outline: none;
        transition: all 0.2s;
    }

    .compact-form-group input:focus {
        border: 1.5px solid #1e4fae;
        background: white;
    }

    .compact-login-btn {
        width: 100%;
        background: #1e4fae;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 10px 0;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        margin-bottom: 15px;
    }

    .compact-login-btn:hover {
        background: #153d7a;
    }

    .compact-error-message {
        background: #fef2f2;
        color: #dc2626;
        padding: 8px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 12px;
        text-align: center;
        border: 1px solid #fecaca;
    }

    .compact-success-message {
        background: #f0fdf4;
        color: #16a34a;
        padding: 8px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 12px;
        text-align: center;
        border: 1px solid #bbf7d0;
    }

    .compact-register-link {
        text-align: center;
        font-size: 12px;
        color: #666;
        margin-bottom: 10px;
    }

    .compact-register-link a {
        color: #1e4fae;
        text-decoration: none;
        font-weight: 500;
    }

    .compact-register-link a:hover {
        text-decoration: underline;
    }

    .compact-back-link {
        text-align: center;
    }

    .compact-back-link a {
        color: #666;
        text-decoration: none;
        font-size: 12px;
        transition: color 0.2s;
    }

    .compact-back-link a:hover {
        color: #1e4fae;
    }

    .forgot-password {
        text-align: center;
        margin-bottom: 15px;
    }

    .forgot-password a {
        color: #1e4fae;
        text-decoration: none;
        font-size: 12px;
        font-weight: 500;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }
</style>

<div class="compact-login-container">
    <div class="compact-login-header">
        <h1>Đăng Nhập</h1>
        <p>Vui lòng đăng nhập để tiếp tục</p>
    </div>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="compact-success-message">
            <?php 
            echo htmlspecialchars($_SESSION['success_message']); 
            unset($_SESSION['success_message']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="compact-error-message">
            <?php 
            echo htmlspecialchars($_SESSION['error_message']); 
            unset($_SESSION['error_message']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="compact-error-message">
            <?php 
            echo htmlspecialchars($_SESSION['login_error']); 
            unset($_SESSION['login_error']);
            ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index1.php?controller=auth&action=authenticate">
        <input type="hidden" name="returnUrl" value="<?php echo htmlspecialchars($returnUrl); ?>">
        <input type="hidden" name="compact" value="1">
        
        <div class="compact-form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required 
                   placeholder="Nhập email của bạn"
                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        </div>

        <div class="compact-form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required
                   placeholder="Nhập mật khẩu">
        </div>

        <div class="forgot-password">
            <a href="#">Quên mật khẩu?</a>
        </div>

        <button type="submit" class="compact-login-btn">Đăng Nhập</button>
    </form>

    <div class="compact-register-link">
        Chưa có tài khoản? 
        <a href="index1.php?controller=register">Đăng ký ngay</a>
    </div>

    <div class="compact-back-link">
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

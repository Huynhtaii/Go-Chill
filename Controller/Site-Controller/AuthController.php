<?php
require_once './models/Customer.php';
require_once './helpers/FlashMessage.php';

// Controller xử lý đăng nhập/đăng ký
class AuthController {
    private $customerModel;
    
    public function __construct() {
        $this->customerModel = new Customer();
    }

    // Hiển thị form đăng nhập
    public function login() {
        // Nếu đã đăng nhập, chuyển về trang chủ
        if (isset($_SESSION['user_id'])) {
            $returnUrl = $_GET['returnUrl'] ?? 'index1.php?controller=home';
            header('Location: ' . $returnUrl);
            exit;
        }
        
        // Kiểm tra xem có yêu cầu hiển thị form compact không
        $compact = $_GET['compact'] ?? false;
        
        if ($compact) {
            include './views/Site/Auth/login-compact.php';
        } else {
            include './views/Site/Auth/login.php';
        }
    }

    // Xử lý đăng nhập (đã nâng cấp hỗ trợ email + số điện thoại)
    public function authenticate() {
        // Kiểm tra method POST để tránh truy cập trực tiếp
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index1.php?controller=auth&action=login');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $returnUrl = $_POST['returnUrl'] ?? 'index1.php?controller=home';

        // Validation dữ liệu đầu vào
        $errors = $this->validateLoginData($email, $password);
        
        if (!empty($errors)) {
            $_SESSION['login_error'] = implode('<br>', $errors);
            $isFromCompact = isset($_POST['compact']);
            $redirectUrl = $isFromCompact ? 'index1.php?controller=auth&action=login&compact=1' : 'index1.php?controller=auth&action=login';
            header('Location: ' . $redirectUrl);
            exit;
        }

        // Xác thực đăng nhập (hỗ trợ email hoặc số điện thoại)
        $user = $this->customerModel->authenticateUser($email, $password);
        
        if ($user) {
            // Đăng nhập thành công
            $_SESSION['user_id'] = $user['MaKhachHang'];
            $_SESSION['fullname'] = $user['HoTen'];
            $_SESSION['email'] = $user['Email'];
            $_SESSION['phone'] = $user['SoDienThoai'] ?? '';
            $_SESSION['user_role'] = $user['VaiTro'] ?? 'customer';
            
            FlashMessage::set('success', 'Đăng nhập thành công!');
            
            // Chuyển hướng dựa trên role
            if (isset($user['VaiTro']) && $user['VaiTro'] === 'admin') {
                header('Location: index1.php?controller=dashboard');
            } else {
                header('Location: ' . $returnUrl);
            }
            exit;
        } else {
            // Đăng nhập thất bại
            $_SESSION['login_error'] = 'Email/số điện thoại hoặc mật khẩu không đúng';
            $isFromCompact = isset($_POST['compact']);
            $redirectUrl = $isFromCompact ? 'index1.php?controller=auth&action=login&compact=1&returnUrl=' . urlencode($returnUrl) : 'index1.php?controller=auth&action=login&returnUrl=' . urlencode($returnUrl);
            header('Location: ' . $redirectUrl);
            exit;
        }
    }

    // Validate dữ liệu đăng nhập
    private function validateLoginData($email, $password) {
        $errors = [];
        
        // Kiểm tra email/số điện thoại
        if (empty($email)) {
            $errors[] = 'Email hoặc số điện thoại không được để trống';
        }
        
        // Kiểm tra mật khẩu
        if (empty($password)) {
            $errors[] = 'Mật khẩu không được để trống';
        }
        
        return $errors;
    }

    // Đăng xuất
    public function logout() {
        // Xóa tất cả session
        session_destroy();
        
        // Chuyển về trang chủ
        header('Location: index1.php?controller=home');
        exit;
    }

    // Kiểm tra đăng nhập (middleware)
    public static function checkLogin() {
        // Middleware kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            $currentUrl = $_SERVER['REQUEST_URI'];
            header('Location: index1.php?controller=auth&action=login&returnUrl=' . urlencode($currentUrl));
            exit;
        }
    }

    // Lấy thông tin user hiện tại
    public static function getCurrentUser() {
        if (isset($_SESSION['user_id'])) {
            return [
                'id' => $_SESSION['user_id'],
                'fullname' => $_SESSION['fullname'] ?? '',
                'email' => $_SESSION['email'] ?? '',
                'phone' => $_SESSION['phone'] ?? '',
                'role' => $_SESSION['user_role'] ?? 'customer'
            ];
        }
        return null;
    }
}
?>

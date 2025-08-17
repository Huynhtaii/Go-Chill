<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../models/RegisterModel.php';

class RegisterController {
    private $registerModel;

    public function __construct() {
        $this->registerModel = new RegisterModel();
    }

    // Hiển thị trang đăng ký
    public function index() {
        include_once './views/Site/Register.php';
    }

    // Xử lý đăng ký khách hàng
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            
            // Validate dữ liệu
            $errors = $this->validateData($data);
            
            if (empty($errors)) {
                // Kiểm tra email đã tồn tại chưa
                if ($this->registerModel->existsByEmail($data['email'])) {
                    $_SESSION['error_message'] = 'Email đã tồn tại trong hệ thống!';
                    header('Location: index1.php?controller=register');
                    exit;
                }
                
                // Kiểm tra số điện thoại đã tồn tại chưa
                if ($this->registerModel->existsByPhone($data['phone'])) {
                    $_SESSION['error_message'] = 'Số điện thoại đã tồn tại trong hệ thống!';
                    header('Location: index1.php?controller=register');
                    exit;
                }
                
                // Thêm khách hàng mới
                $result = $this->registerModel->addCustomer($data);
                
                if ($result) {
                    $_SESSION['success_message'] = 'Đăng ký thành công! Vui lòng đăng nhập.';
                    header('Location: index1.php?controller=auth&action=login&compact=1');
                    exit;
                } else {
                    $_SESSION['error_message'] = 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại!';
                    header('Location: index1.php?controller=register');
                    exit;
                }
            } else {
                $_SESSION['error_message'] = implode('<br>', $errors);
                header('Location: index1.php?controller=register');
                exit;
            }
        }
    }

    // Validate dữ liệu đăng ký
    private function validateData($data) {
        $errors = [];
        
        // Kiểm tra họ tên
        if (empty($data['fullName'])) {
            $errors[] = 'Họ tên không được để trống';
        }
        
        // Kiểm tra số điện thoại
        if (empty($data['phone'])) {
            $errors[] = 'Số điện thoại không được để trống';
        } elseif (!preg_match('/^[0-9]{10,11}$/', $data['phone'])) {
            $errors[] = 'Số điện thoại không hợp lệ';
        }
        
        // Kiểm tra email
        if (empty($data['email'])) {
            $errors[] = 'Email không được để trống';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email không hợp lệ';
        }
        
        // Kiểm tra mật khẩu
        if (empty($data['password'])) {
            $errors[] = 'Mật khẩu không được để trống';
        } elseif (strlen($data['password']) < 6) {
            $errors[] = 'Mật khẩu phải có ít nhất 6 ký tự';
        }
        
        // Kiểm tra xác nhận mật khẩu
        if (empty($data['confirmPassword'])) {
            $errors[] = 'Xác nhận mật khẩu không được để trống';
        } elseif ($data['password'] !== $data['confirmPassword']) {
            $errors[] = 'Mật khẩu xác nhận không khớp';
        }
        
        return $errors;
    }
}
?>

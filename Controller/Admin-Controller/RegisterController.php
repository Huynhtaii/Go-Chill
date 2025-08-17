<?php
require_once '../../models/Register.php';

class RegisterController {
    private $registerModel;

    public function __construct() {
        $this->registerModel = new Register();
    }

    // Hiển thị danh sách đăng ký
    public function index() {
        $registerList = $this->registerModel->getAll();
        include __DIR__ . '/../../views/Admin/Register/index.php';
    }

    // Trang thêm đăng ký
    public function renderAdd() {
        include __DIR__ . '/../../views/Admin/Register/add.php';
    }

    // Xử lý thêm đăng ký
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $result = $this->registerModel->add($data);
            
            if ($result['success']) {
                $_SESSION['success_message'] = 'Thêm đăng ký thành công!';
            } else {
                $_SESSION['error_message'] = $result['message'];
            }
        }
        header('Location: index.php?controller=register&action=index');
        exit;
    }

    // Trang sửa đăng ký
    public function renderEdit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $register = $this->registerModel->getById($id);
            include __DIR__ . '/../../views/Admin/Register/edit.php';
        } else {
            header('Location: index.php?controller=register&action=index');
            exit;
        }
    }

    // Xử lý sửa đăng ký
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $result = $this->registerModel->update($data);
            
            if ($result) {
                $_SESSION['success_message'] = 'Cập nhật đăng ký thành công!';
            } else {
                $_SESSION['error_message'] = 'Có lỗi xảy ra khi cập nhật';
            }
        }
        header('Location: index.php?controller=register&action=index');
        exit;
    }

    // Xóa đăng ký
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $result = $this->registerModel->delete($id);
            if ($result) {
                $_SESSION['success_message'] = 'Xóa đăng ký thành công!';
            } else {
                $_SESSION['error_message'] = 'Có lỗi xảy ra khi xóa';
            }
        }
        header('Location: index.php?controller=register&action=index');
        exit;
    }

    // Xem chi tiết đăng ký
    public function show() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $register = $this->registerModel->getById($id);
            include __DIR__ . '/../../views/Admin/Register/show.php';
        } else {
            header('Location: index.php?controller=register&action=index');
            exit;
        }
    }
}
?>

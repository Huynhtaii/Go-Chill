<?php
require_once './models/Contact.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    // Hiển thị danh sách liên hệ
    public function index() {
        $contacts = $this->contactModel->getAllContacts();
        include './views/Admin/Contact/index.php';
    }

    // Hiển thị chi tiết liên hệ
    public function show() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $contact = $this->contactModel->getById($id);
            include './views/Admin/Contact/show.php';
        } else {
            header('Location: index.php?controller=contact&action=index');
            exit;
        }
    }

    // Thêm liên hệ mới (thường từ form frontend)
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'HoTen' => $_POST['HoTen'] ?? '',
                'SoDienThoai' => $_POST['SoDienThoai'] ?? '',
                'GhiChu' => $_POST['GhiChu'] ?? '',
                'TrangThai' => $_POST['TrangThai'] ?? 1, // 1 = chưa xử lý
                'NgayTao' => date('Y-m-d')
            ];

            $this->contactModel->addContact($data);
            header('Location: index.php?controller=contact&action=index');
            exit;
        }

        include './views/Admin/Contact/add.php';
    }

    // Hiển thị form chỉnh sửa liên hệ
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $contact = $this->contactModel->getById($id);
            include './views/Admin/Contact/edit.php';
        } else {
            header('Location: index.php?controller=contact&action=index');
            exit;
        }
    }

    // Cập nhật thông tin liên hệ
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaLienHe' => $_POST['MaLienHe'],
                'HoTen' => $_POST['HoTen'],
                'SoDienThoai' => $_POST['SoDienThoai'],
                'GhiChu' => $_POST['GhiChu'],
                'TrangThai' => $_POST['TrangThai']
            ];

            $this->contactModel->updateContact($data);
            header('Location: index.php?controller=contact&action=index');
            exit;
        }
    }

    // Xoá liên hệ - Đã vô hiệu hóa để bảo toàn dữ liệu
    public function delete() {
        // Không cho phép xóa liên hệ để bảo toàn dữ liệu
        header('Location: index.php?controller=contact&action=index&error=delete_not_allowed');
        exit;
    }

    // Cập nhật trạng thái liên hệ (đã xử lý/chưa xử lý)
    public function updateStatus() {
        if (isset($_GET['id']) && isset($_GET['status'])) {
            $this->contactModel->updateStatus($_GET['id'], $_GET['status']);
        }
        header('Location: index.php?controller=contact&action=index');
    }

    // Đánh dấu là đã xử lý
    public function markAsProcessed() {
        if (isset($_GET['id'])) {
            $this->contactModel->updateStatus($_GET['id'], 0); // 0 = đã xử lý
        }
        header('Location: index.php?controller=contact&action=index');
    }
}
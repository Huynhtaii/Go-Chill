<?php
require_once './models/Customer.php';

class CustomerController {
    private $customerModel;

    public function __construct() {
        $this->customerModel = new Customer();
    }

    // Hiển thị danh sách khách hàng
    public function index() {
        // Sửa lỗi: gọi đúng method getAll() thay vì getAllCustomers()
        $customers = $this->customerModel->getAll();
        include './views/Admin/Customer/index.php';
    }

    // Thêm khách hàng mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'HoTen' => $_POST['HoTen'] ?? '',
                'SoDienThoai' => $_POST['SoDienThoai'] ?? '',
                'Email' => $_POST['Email'] ?? '',
                'MatKhau' => $_POST['MatKhau'] ?? '',
                'VaiTro' => $_POST['VaiTro'] ?? '',
                'TinhThanh' => $_POST['TinhThanh'] ?? '',
                'QuanHuyen' => $_POST['QuanHuyen'] ?? ''
            ];

            $this->customerModel->addCustomer($data);
            header('Location: index.php?controller=customer&action=index');
            exit;
        }

        include './views/Admin/Customer/add.php';
    }

    // Hiển thị form chỉnh sửa khách hàng
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $customer = $this->customerModel->getById($id);
            include './views/Admin/Customer/edit.php';
        }
    }

    // Cập nhật thông tin khách hàng
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaKhachHang' => $_POST['MaKhachHang'],
                'HoTen' => $_POST['HoTen'],
                'SoDienThoai' => $_POST['SoDienThoai'],
                'Email' => $_POST['Email'],
                'MatKhau' => $_POST['MatKhau'],
                'VaiTro' => $_POST['VaiTro'],
                'TinhThanh' => $_POST['TinhThanh'],
                'QuanHuyen' => $_POST['QuanHuyen']
            ];

            $this->customerModel->updateCustomer($data);
            header('Location: index.php?controller=customer&action=index');
            exit;
        }
    }

    // Xoá khách hàng
    public function delete() {
        if (isset($_GET['id'])) {
            $this->customerModel->deleteCustomer($_GET['id']);
        }
        header('Location: index.php?controller=customer&action=index');
    }
}

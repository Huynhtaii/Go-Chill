<?php
require_once './models/Payment.php';

class PaymentController {
    private $paymentModel;

    public function __construct() {
        $this->paymentModel = new Payment();
    }

    // Hiển thị danh sách thanh toán
    public function index() {
        $payments = $this->paymentModel->getAllPayments();
        include './views/Admin/Payment/index.php';
    }

    // Thêm thanh toán mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaDon' => $_POST['MaDon'] ?? '',
                'SoTienThanhToan' => $_POST['SoTienThanhToan'] ?? '',
                'NgayThanhToan' => $_POST['NgayThanhToan'] ?? date('Y-m-d'),
                'PhuongThucThanhToan' => $_POST['PhuongThucThanhToan'] ?? '',
                'GhiChu' => $_POST['GhiChu'] ?? ''
            ];

            $this->paymentModel->addPayment($data);
            header('Location: index.php?controller=payment&action=index');
            exit;
        }

        $orders = $this->paymentModel->getAllOrders();
        include './views/Admin/Payment/add.php';
    }

    // Hiển thị form chỉnh sửa thanh toán
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $payment = $this->paymentModel->getById($id);
            $orders = $this->paymentModel->getAllOrders();
            include './views/Admin/Payment/edit.php';
        }
    }

    // Cập nhật thông tin thanh toán
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaDon' => $_POST['MaDon'],
                'SoTienThanhToan' => $_POST['SoTienThanhToan'],
                'NgayThanhToan' => $_POST['NgayThanhToan'],
                'PhuongThucThanhToan' => $_POST['PhuongThucThanhToan'],
                'GhiChu' => $_POST['GhiChu']
            ];

            $this->paymentModel->updatePayment($data);
            header('Location: index.php?controller=payment&action=index');
            exit;
        }
    }

    // Xoá thanh toán
    public function delete() {
        if (isset($_GET['id'])) {
            $this->paymentModel->deletePayment($_GET['id']);
        }
        header('Location: index.php?controller=payment&action=index');
    }
}
?> 
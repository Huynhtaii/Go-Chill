<?php
require_once './models/Order.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    // Hiển thị danh sách đơn đặt tour
    public function index() {
        $orders = $this->orderModel->getAllOrders();
        include './views/Admin/Order/index.php';
    }

    // Thêm đơn đặt tour mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaKhachHang' => $_POST['MaKhachHang'] ?? '',
                'MaTour' => $_POST['MaTour'] ?? '',
                'NgayDat' => $_POST['NgayDat'] ?? date('Y-m-d'),
                'SoLuongNguoi' => $_POST['SoLuongNguoi'] ?? '',
                'TongTien' => $_POST['TongTien'] ?? '',
                'PhuongThucThanhToan' => $_POST['PhuongThucThanhToan'] ?? '',
                'TrangThai' => $_POST['TrangThai'] ?? 'Chờ duyệt'
            ];

            $this->orderModel->addOrder($data);
            header('Location: index.php?controller=order&action=index');
            exit;
        }

        $customers = $this->orderModel->getCustomers();
        $tours = $this->orderModel->getTours();
        include './views/Admin/Order/add.php';
    }

    // Hiển thị form chỉnh sửa đơn đặt tour
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $order = $this->orderModel->getById($id);
            
            // Kiểm tra trạng thái đơn hàng - chỉ cho phép sửa đơn "Chờ duyệt"
            if ($order && $order['TrangThai'] !== 'Chờ duyệt') {
                // Nếu đơn hàng không phải "Chờ duyệt", chuyển về trang danh sách với thông báo
                header('Location: index.php?controller=order&action=index&error=not_editable');
                exit;
            }
            
            $customers = $this->orderModel->getCustomers();
            $tours = $this->orderModel->getTours();
            include './views/Admin/Order/edit.php';
        }
    }

    // Cập nhật thông tin đơn đặt tour
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['MaDon'] ?? null;
            
            // Kiểm tra trạng thái hiện tại của đơn hàng
            if ($orderId) {
                $currentOrder = $this->orderModel->getById($orderId);
                if ($currentOrder && $currentOrder['TrangThai'] !== 'Chờ duyệt') {
                    // Nếu đơn hàng không phải "Chờ duyệt", không cho phép cập nhật
                    header('Location: index.php?controller=order&action=index&error=update_not_allowed');
                    exit;
                }
            }
            
            $data = [
                'MaDon' => $_POST['MaDon'],
                'MaKhachHang' => $_POST['MaKhachHang'],
                'MaTour' => $_POST['MaTour'],
                'NgayDat' => $_POST['NgayDat'],
                'SoLuongNguoi' => $_POST['SoLuongNguoi'],
                'TongTien' => $_POST['TongTien'],
                'PhuongThucThanhToan' => $_POST['PhuongThucThanhToan'],
                'TrangThai' => $_POST['TrangThai']
            ];

            $this->orderModel->updateOrder($data);
            header('Location: index.php?controller=order&action=index&success=updated');
            exit;
        }
    }

    // Xóa đơn đặt tour - Đã vô hiệu hóa để bảo toàn dữ liệu
    public function delete() {
        // Không cho phép xóa đơn hàng để bảo toàn dữ liệu
        // $this->orderModel->deleteOrder($_GET['id']); // Đã comment để bảo toàn dữ liệu
        header('Location: index.php?controller=order&action=index&error=delete_not_allowed');
        exit;
    }

    // Xem chi tiết đơn đặt tour
    public function show() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $order = $this->orderModel->getById($id);
            include './views/Admin/Order/show.php';
        }
    }
    
    // Cập nhật trạng thái đơn hàng
    public function updateStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['orderId'] ?? null;
            $newStatus = $_POST['status'] ?? null;
            
            if ($orderId && $newStatus) {
                $result = $this->orderModel->updateStatus($orderId, $newStatus);
                if ($result) {
                    header('Location: index.php?controller=order&action=index&success=status_updated');
                } else {
                    header('Location: index.php?controller=order&action=index&error=status_update_failed');
                }
                exit;
            }
        }
        header('Location: index.php?controller=order&action=index');
        exit;
    }
}
?> 
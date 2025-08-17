<?php
require_once './models/Tour.php';
require_once './models/Category.php';

class TourController {
    private $tourModel;
    private $categoryModel;
    
    public function __construct() {
        $this->tourModel = new Tour();
        $this->categoryModel = new Category();
    }

    public function index() {
        $tours = $this->tourModel->getAll();
        include './views/Admin/Tour/index.php';
    }

    public function add() {
        $categories = $this->categoryModel->getActiveCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra và lấy dữ liệu an toàn
            $data = [
                'TieuDe' => $_POST['TieuDe'] ?? '',
                'MoTa' => $_POST['MoTa'] ?? '',
                'ThoiGian' => $_POST['ThoiGian'] ?? '',
                'DiemDen' => $_POST['DiemDen'] ?? '',
                'NgayKhoiHanh' => $_POST['NgayKhoiHanh'] ?? '',
                'NgayKetThuc' => $_POST['NgayKetThuc'] ?? '',
                'GiaTour' => $_POST['GiaTour'] ?? 0,
                'GiamGia' => $_POST['GiamGia'] ?? 0,
                'HinhAnh' => (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['name']) ? $this->uploadImage($_FILES['HinhAnh']) : '',
                'NoiKhoiHanh' => $_POST['NoiKhoiHanh'] ?? '',
                'PhuongTien' => $_POST['PhuongTien'] ?? '',
                'TrangThai' => $_POST['TrangThai'] ?? '',
                'IDDanhMuc' => $_POST['IDDanhMuc'] ?? null
            ];
            $this->tourModel->addTour($data);
            header('Location: index.php?controller=tour&action=index');
            exit;
        }

        include './views/Admin/Tour/add.php';
    }

    public function edit() {
        $id = $_GET['MaTour'] ?? $_GET['id'] ?? null;
        
        if (!$id) {
            $this->showError('Không có ID tour được cung cấp');
            return;
        }
        
        $tour = $this->tourModel->getById($id);
        
        if (!$tour) {
            $this->showError("Không tìm thấy tour với ID: $id");
            return;
        }
        
        $categories = $this->categoryModel->getActiveCategories();
        include './views/Admin/Tour/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý upload ảnh nếu có
            $image = '';
            if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['name']) {
                $image = $this->uploadImage($_FILES['HinhAnh']);
            } else {
                $image = $_POST['old_image'] ?? '';
            }
            
            $data = [
                'MaTour' => $_POST['MaTour'],
                'TieuDe' => $_POST['TieuDe'],
                'MoTa' => $_POST['MoTa'],
                'ThoiGian' => $_POST['ThoiGian'],
                'DiemDen' => $_POST['DiemDen'],
                'NgayKhoiHanh' => $_POST['NgayKhoiHanh'],
                'NgayKetThuc' => $_POST['NgayKetThuc'],
                'GiaTour' => $_POST['GiaTour'],
                'GiamGia' => $_POST['GiamGia'] ?? 0,
                'HinhAnh' => $image,
                'NoiKhoiHanh' => $_POST['NoiKhoiHanh'],
                'PhuongTien' => $_POST['PhuongTien'],
                'TrangThai' => $_POST['TrangThai'],
                'IDDanhMuc' => $_POST['IDDanhMuc'] ?? null
            ];
            
            $result = $this->tourModel->updateTour($data);
            header('Location: index.php?controller=tour&action=index');
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['MaTour'])) {
            $this->tourModel->deleteTour($_GET['MaTour']);
        }
        header('Location: index.php?controller=tour&action=index');
    }

    private function uploadImage($file) {
        $targetDir = 'public/img/';
        $fileName = basename($file['name']);
        $targetFile = $targetDir . $fileName;
        move_uploaded_file($file['tmp_name'], $targetFile);
        return $fileName;
    }
    
    private function showError($message) {
        echo "<div style='background: #e74c3c; color: white; padding: 20px; margin: 20px; border-radius: 5px;'>";
        echo "<h3>Lỗi: $message</h3>";
        echo "<a href='index.php?controller=tour&action=index' style='color: white; text-decoration: underline;'>Quay lại danh sách tour</a>";
        echo "</div>";
    }
}
<?php
require_once './models/TourDetail.php';

class TourDisplayController {
    private $tourDetailModel;

    public function __construct() {
        $this->tourDetailModel = new TourDetail();
    }

    // Hiển thị chi tiết tour theo mã tour
    public function show($maTour) {
        $tourDetail = $this->tourDetailModel->getByTourId($maTour);
        include __DIR__ . '/../../views/Admin/TourDetails/show.php';
    }

    // Hiển thị danh sách tất cả tour details
    public function index() {
        // Lấy tất cả tour details
        $tourDetails = $this->tourDetailModel->getAll();
        include __DIR__ . '/../../views/Admin/TourDetails/index.php';
    }

    // Trang thêm chi tiết tour
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaTour' => $_POST['MaTour'] ?? '',
                'NoiDung' => $_POST['NoiDung'] ?? '',
                'HinhAnh' => $_POST['HinhAnh'] ?? ''
            ];
            
            $result = $this->tourDetailModel->add($data);
            if ($result) {
                header('Location: index.php?controller=tourdisplay&action=index');
                exit;
            }
        }
        
        include __DIR__ . '/../../views/Admin/TourDetails/add.php';
    }

    // Trang sửa chi tiết tour
    public function edit() {
        $id = $_GET['id'] ?? null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'] ?? '',
                'NoiDung' => $_POST['NoiDung'] ?? '',
                'HinhAnh' => $_POST['HinhAnh'] ?? ''
            ];
            
            $result = $this->tourDetailModel->update($data);
            if ($result) {
                header('Location: index.php?controller=tourdisplay&action=index');
                exit;
            }
        }
        
        if ($id) {
            $tourDetail = $this->tourDetailModel->getById($id);
            include __DIR__ . '/../../views/Admin/TourDetails/edit.php';
        }
    }

    // Xóa chi tiết tour
    public function delete() {
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            $result = $this->tourDetailModel->delete($id);
            if ($result) {
                header('Location: index.php?controller=tourdisplay&action=index');
                exit;
            }
        }
    }
}

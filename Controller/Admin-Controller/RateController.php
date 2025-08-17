<?php
require_once './models/Rate.php';

class RateController {
    private $rateModel;

    public function __construct() {
        $this->rateModel = new Rate();
    }

    public function index() {
        $rateList = $this->rateModel->getAllRates();
        include './views/Admin/Rate/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaKhachHang' => $_POST['MaKhachHang'] ?? '',
                'MaTour' => $_POST['MaTour'] ?? '',
                'SoSao' => $_POST['SoSao'] ?? 5,
                'NhanXet' => $_POST['NhanXet'] ?? '',
                'NgayDang' => $_POST['NgayDang'] ?? date('Y-m-d'),
            ];
            $this->rateModel->addRate($data);
            header('Location: index.php?controller=rate&action=index');
            exit;
        }

        include './views/Admin/Rate/add.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $rate = $this->rateModel->getById($id);
            include './views/Admin/Rate/edit.php';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'MaDanhGia' => $_POST['MaDanhGia'],
                'MaKhachHang' => $_POST['MaKhachHang'],
                'MaTour' => $_POST['MaTour'],
                'SoSao' => $_POST['SoSao'],
                'NhanXet' => $_POST['NhanXet'],
                'NgayDang' => $_POST['NgayDang']
            ];
            $this->rateModel->updateRate($data);
            header('Location: index.php?controller=rate&action=index');
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->rateModel->deleteRate($_GET['id']);
        }
        header('Location: index.php?controller=rate&action=index');
    }
}

<?php
require_once './models/News.php';

class NewsController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    public function index() {
        $newsList = $this->newsModel->getAllNews();
        include './views/Admin/News/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'TieuDe' => $_POST['TieuDe'] ?? '',
                'NoiDung' => $_POST['NoiDung'] ?? '',
                'ChuDe' => $_POST['ChuDe'] ?? '',
                'NgayDang' => $_POST['NgayDang'] ?? date('Y-m-d'),
                'HinhDaiDien' => (isset($_FILES['HinhDaiDien']) && $_FILES['HinhDaiDien']['name']) ? $this->uploadImage($_FILES['HinhDaiDien']) : ''
            ];
            $this->newsModel->addNews($data);
            header('Location: index.php?controller=news&action=index');
            exit;
        }

        include './views/Admin/News/add.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $news = $this->newsModel->getById($id);
            include './views/Admin/News/edit.php';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $_FILES['HinhDaiDien']['name'] ? $this->uploadImage($_FILES['HinhDaiDien']) : $_POST['old_image'];

            $data = [
                'MaTin' => $_POST['MaTin'],
                'TieuDe' => $_POST['TieuDe'],
                'NoiDung' => $_POST['NoiDung'],
                'ChuDe' => $_POST['ChuDe'],
                'NgayDang' => $_POST['NgayDang'],
                'HinhDaiDien' => $image
            ];
            $this->newsModel->updateNews($data);
            header('Location: index.php?controller=news&action=index');
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->newsModel->deleteNews($_GET['id']);
        }
        header('Location: index.php?controller=news&action=index');
    }

    private function uploadImage($file) {
        $targetDir = 'public/img/';
        $fileName = basename($file['name']);
        $targetFile = $targetDir . $fileName;
        move_uploaded_file($file['tmp_name'], $targetFile);
        return $fileName;
    }
}

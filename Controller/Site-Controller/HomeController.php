<?php
require_once './models/Tour.php';

class HomeController {
    private $tourModel;

    public function __construct() {
        $this->tourModel = new Tour();
    }

    public function index() {
        // Lấy danh sách tour, có thể lọc theo trạng thái hoặc danh mục nếu muốn
        $tourList = $this->tourModel->getAll();
        include './views/Site/home.php';
    }
}

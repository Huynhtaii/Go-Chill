<?php
include_once './models/News.php';

class NewsController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    // Hiển thị danh sách tin tức
    public function index() {
        // Lấy danh sách tin tức từ Model
        $newsList = $this->newsModel->getAllNews();
        
        // Truyền dữ liệu sang view
        include './views/Site/news.php';
    }
}




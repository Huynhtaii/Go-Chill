<?php
require_once './models/Tour.php';
require_once './models/Category.php';

class TourSiteController {
    // Khai báo các model cần thiết
    private $tourModel;
    private $categoryModel;

    public function __construct() {
        // Khởi tạo các model khi tạo controller
        $this->tourModel = new Tour();
        $this->categoryModel = new Category();
    }
   
    // Hiển thị trang chủ với danh sách tour và tour bán chạy
    public function index() {
        // Lấy toàn bộ tour từ database
        $tourList = $this->tourModel->getAll();
        
        // Lấy tour bán chạy để hiển thị nổi bật
        $bestsellerTours = $this->tourModel->getBestsellerTours();
        
        // Lấy danh sách danh mục để hiển thị menu
        $categories = $this->categoryModel->getActiveCategories();
    
        // Truyền dữ liệu sang view trang chủ
        include './views/Site/home.php';
    }

    // Hiển thị tất cả tour (không theo danh mục)
    public function allTours() {
        // Lấy tất cả tour từ database
        $tourList = $this->tourModel->getAll();
        
        // Lấy danh sách danh mục để hiển thị filter
        $categories = $this->categoryModel->getActiveCategories();
        
        // Truyền model object để view có thể sử dụng
        $tourModel = $this->tourModel;
        
        // Hiển thị trang danh sách tour
        include './views/Site/tours.php';
    }

    // 🔍 LỌC DANH MỤC - Lấy tour theo tên danh mục (VD: "Tour bán chạy", "Du lịch trong nước")
    public function toursByCategory($categoryName) {
        // Lấy tour theo tên danh mục
        $tourList = $this->tourModel->getToursByCategoryName($categoryName);
        
        // Lấy danh sách tất cả danh mục để hiển thị menu
        $categories = $this->categoryModel->getActiveCategories();
        
        // Lưu danh mục hiện tại để highlight trong menu
        $currentCategory = $categoryName;
        
        // Truyền model object để view có thể sử dụng
        $tourModel = $this->tourModel;
        
        // Hiển thị trang danh sách tour với filter
        include './views/Site/tours.php';
    }

    // Hiển thị trang thêm tour (nếu cần cho site)
    public function renderAddTour() {
        // Include view form thêm tour
        include_once('./views/Site/addtour.php');
    }
    
    // Thêm tour mới (nếu cần cho site)
    public function addTour($data) {
        // Gọi model để thêm tour vào database
        $this->tourModel->addTour($data);
        
        // Redirect về trang danh sách tour
        header('Location: index.php?page=tour');
    }
    
    // Hiển thị trang sửa tour (nếu cần cho site)
    public function renderEditTour($id) {
        // Lấy thông tin tour theo ID
        $tour = $this->tourModel->getById($id);
        
        // Include view form sửa tour
        include_once('./views/Site/edittour.php');
    }
    
    // Sửa thông tin tour (nếu cần cho site)
    public function editTour($data) {
        // Gọi model để cập nhật tour trong database
        $this->tourModel->updateTour($data);
        
        // Redirect về trang danh sách tour
        header('Location: index.php?page=tour');
    }
    
    // Xóa tour (nếu cần cho site)
    public function deleteTour($id) {
        // Gọi model để xóa tour khỏi database
        $this->tourModel->deleteTour($id);
        
        // Redirect về trang danh sách tour
        header('Location: index.php?page=tour');
    }
}
?>

<?php
// Import model Category để làm việc với database
require_once './models/Category.php';

// Controller quản lý DANH MỤC TOUR (Admin Panel)
// Chức năng: CRUD (Thêm, Sửa, Xóa, Hiển thị) danh mục tour
class CategoryController {
    private $categoryModel;

    // Khởi tạo controller - tạo kết nối với model Category
    public function __construct() {
        $this->categoryModel = new Category();
    }

    // Hiển thị danh sách danh mục
    public function index() {
        $categories = $this->categoryModel->getAll();
        include './views/Admin/Category/index.php';
    }


    // Thêm danh mục mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'TenDanhMuc' => $_POST['TenDanhMuc'] ?? '',
                'TrangThai' => $_POST['TrangThai'] ?? 'Hoạt động'
            ];
            
            if ($this->categoryModel->addCategory($data)) {
                header('Location: index.php?controller=category&action=index');
                exit;
            } else {
                $error = "Có lỗi xảy ra khi thêm danh mục";
            }
        }
        
        include './views/Admin/Category/add.php';
    }

    // Sửa danh mục
    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?controller=category&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ID' => $id,
                'TenDanhMuc' => $_POST['TenDanhMuc'] ?? '',
                'TrangThai' => $_POST['TrangThai'] ?? 'Hoạt động'
            ];
            
            if ($this->categoryModel->updateCategory($data)) {
                header('Location: index.php?controller=category&action=index');
                exit;
            } else {
                $error = "Có lỗi xảy ra khi cập nhật danh mục";
            }
        }

        $category = $this->categoryModel->getCategoryById($id);
        if (!$category) {
            header('Location: index.php?controller=category&action=index');
            exit;
        }

        include './views/Admin/Category/edit.php';
    }

    // Xóa danh mục
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            if ($this->categoryModel->deleteCategory($id)) {
                header('Location: index.php?controller=category&action=index');
                exit;
            } else {
                $error = "Không thể xóa danh mục này vì có tour đang sử dụng";
            }
        }
        header('Location: index.php?controller=category&action=index');
    }
}


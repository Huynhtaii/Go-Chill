<?php
include_once 'database.php';

// Model quản lý tour du lịch
class Tour {
    // Khai báo biến database connection
    private $db;

    public function __construct() {
        // Khởi tạo kết nối database khi tạo object
        $this->db = Database::getInstance();
    }

    // Lấy tất cả tour từ database với thông tin danh mục
    public function getAll() {
        // Truy vấn SQL JOIN với bảng danh mục để lấy tên danh mục
        $sql = "SELECT t.*, d.TenDanhMuc 
                FROM tourdulich t 
                LEFT JOIN danhmuctour d ON t.IDDanhMuc = d.ID 
                ORDER BY t.MaTour DESC";
        return $this->db->getAll($sql);
    }

    // Lấy thông tin tour theo ID với thông tin danh mục
    public function getById($id) {
        // Truy vấn SQL JOIN với bảng danh mục, lọc theo ID tour
        $sql = "SELECT t.*, d.TenDanhMuc
                FROM tourdulich t 
                LEFT JOIN danhmuctour d ON t.IDDanhMuc = d.ID 
                WHERE t.MaTour = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // CHÚ Ý: Thêm tour mới vào database
    public function addTour($data) {
        // Xử lý dữ liệu ngày tháng - chuyển thành null nếu rỗng
        $ngayKhoiHanh = !empty($data['NgayKhoiHanh']) ? $data['NgayKhoiHanh'] : null;
        $ngayKetThuc = !empty($data['NgayKetThuc']) ? $data['NgayKetThuc'] : null;
        
        // Xử lý dữ liệu giảm giá và giá sale
        $giamGia = isset($data['GiamGia']) ? $data['GiamGia'] : null;
        $giaTourSale = isset($data['GiaTourSale']) ? $data['GiaTourSale'] : 0; // Đảm bảo không bao giờ null
        
        // Xử lý dữ liệu đánh giá và danh mục
        $danhGia = isset($data['Danhgia']) ? $data['Danhgia'] : '';
        $idDanhMuc = !empty($data['IDDanhMuc']) ? (int)$data['IDDanhMuc'] : null; // Đảm bảo là số nguyên hoặc null
        
        // Câu lệnh SQL INSERT với tất cả các trường
        $sql = "INSERT INTO tourdulich (TieuDe, MoTa, ThoiGian, DiemDen, NgayKhoiHanh, NgayKetThuc, GiaTour, GiamGia, GiaTourSale, HinhAnh, NoiKhoiHanh, PhuongTien, TrangThai, IDDanhMuc, Danhgia)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Thực thi câu lệnh INSERT với dữ liệu đã xử lý
        return $this->db->execute($sql, [
            $data['TieuDe'],
            $data['MoTa'],
            $data['ThoiGian'],
            $data['DiemDen'],
            $ngayKhoiHanh,
            $ngayKetThuc,
            $data['GiaTour'],
            $giamGia,
            $giaTourSale,
            $data['HinhAnh'],
            $data['NoiKhoiHanh'],
            $data['PhuongTien'],
            $data['TrangThai'],
            $idDanhMuc,
            $danhGia
        ]);
    }

    // Cập nhật thông tin tour trong database
    public function updateTour($data) {
        // Xử lý dữ liệu ngày tháng - chuyển thành null nếu rỗng
        $ngayKhoiHanh = !empty($data['NgayKhoiHanh']) ? $data['NgayKhoiHanh'] : null;
        $ngayKetThuc = !empty($data['NgayKetThuc']) ? $data['NgayKetThuc'] : null;
        
        // Xử lý dữ liệu giảm giá và giá sale
        $giamGia = isset($data['GiamGia']) ? $data['GiamGia'] : null;
        $giaTourSale = isset($data['GiaTourSale']) ? $data['GiaTourSale'] : 0; // Đảm bảo không bao giờ null
        
        // Xử lý dữ liệu đánh giá và danh mục
        $danhGia = isset($data['Danhgia']) ? $data['Danhgia'] : '';
        $idDanhMuc = !empty($data['IDDanhMuc']) ? (int)$data['IDDanhMuc'] : null; // Đảm bảo là số nguyên hoặc null
        
        // Câu lệnh SQL UPDATE tất cả các trường
        $sql = "UPDATE tourdulich SET 
            TieuDe = ?,
            MoTa = ?,
            ThoiGian = ?,
            DiemDen = ?,
            NgayKhoiHanh = ?,
            NgayKetThuc = ?,
            GiaTour = ?,
            GiamGia = ?,
            GiaTourSale = ?,
            HinhAnh = ?,
            NoiKhoiHanh = ?,
            PhuongTien = ?,
            TrangThai = ?,
            IDDanhMuc = ?,
            Danhgia = ?
            WHERE MaTour = ?";
        
        // Thực thi câu lệnh UPDATE với dữ liệu đã xử lý
        return $this->db->execute($sql, [
            $data['TieuDe'],
            $data['MoTa'],
            $data['ThoiGian'],
            $data['DiemDen'],
            $ngayKhoiHanh,
            $ngayKetThuc,
            $data['GiaTour'],
            $giamGia,
            $giaTourSale,
            $data['HinhAnh'],
            $data['NoiKhoiHanh'],
            $data['PhuongTien'],
            $data['TrangThai'],
            $idDanhMuc,
            $danhGia,
            $data['MaTour'] // ID tour cần cập nhật
        ]);
    }

    // Xóa tour theo ID
    public function deleteTour($id) {
        // Câu lệnh SQL DELETE với tham số ID
        $sql = "DELETE FROM tourdulich WHERE MaTour = ?";
        return $this->db->execute($sql, [$id]);
    }

    // Lấy danh sách tour theo ID danh mục lọc tour theo danh mục  //ADMIN (quản lý theo ID danh mục)
    public function getToursByCategory($categoryId) {
        // Truy vấn SQL JOIN với bảng danh mục, lọc theo ID danh mục và trạng thái hoạt động
        $sql = "SELECT t.*, d.TenDanhMuc 
                FROM tourdulich t 
                LEFT JOIN danhmuctour d ON t.IDDanhMuc = d.ID 
                WHERE t.IDDanhMuc = ? AND t.TrangThai = 'Hoạt động'
                ORDER BY t.MaTour DESC";
        
        // Sử dụng PDO trực tiếp thay vì method getAll
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách tour bán chạy bên home
    public function getBestsellerTours() {
        // Truy vấn SQL lấy tour thuộc danh mục "Tour bán chạy"
        $sql = "SELECT t.*, d.TenDanhMuc 
                FROM tourdulich t 
                LEFT JOIN danhmuctour d ON t.IDDanhMuc = d.ID 
                WHERE d.TenDanhMuc = 'Tour bán chạy'
                ORDER BY t.MaTour DESC";
        return $this->db->getAll($sql);
    }

    // Lọc theo danh mục bên trang danh mục
    public function getToursByCategoryName($categoryName) {
        // Truy vấn SQL JOIN với bảng danh mục, lọc theo tên danh mục
        $sql = "SELECT t.*, d.TenDanhMuc 
                FROM tourdulich t 
                LEFT JOIN danhmuctour d ON t.IDDanhMuc = d.ID 
                WHERE d.TenDanhMuc = ?
                ORDER BY t.MaTour DESC";
        
        // Sử dụng PDO trực tiếp thay vì method getAll
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->execute([$categoryName]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

} 

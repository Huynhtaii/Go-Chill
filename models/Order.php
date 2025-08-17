<?php
include_once 'database.php';

// Model quản lý đơn đặt tour
class Order {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Lấy tất cả đơn đặt tour
    public function getAllOrders() {
        $sql = "SELECT o.*, c.HoTen as TenKhachHang, t.TieuDe as TenTour 
                FROM dattour o 
                LEFT JOIN khachhang c ON o.MaKhachHang = c.MaKhachHang 
                LEFT JOIN tourdulich t ON o.MaTour = t.MaTour 
                ORDER BY o.NgayDat DESC";
        return $this->db->getAll($sql);
    }

    // Lấy đơn đặt tour theo ID
    public function getById($id) {
        $sql = "SELECT o.*, c.HoTen as TenKhachHang, t.TieuDe as TenTour 
                FROM dattour o 
                LEFT JOIN khachhang c ON o.MaKhachHang = c.MaKhachHang 
                LEFT JOIN tourdulich t ON o.MaTour = t.MaTour 
                WHERE o.MaDon = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Thêm đơn đặt tour mới
    public function addOrder($data) {
        $sql = "INSERT INTO dattour (MaKhachHang, MaTour, NgayDat, SoLuongNguoi, TongTien, PhuongThucThanhToan, TrangThai) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $params = [
            $data['MaKhachHang'],
            $data['MaTour'],
            $data['NgayDat'],
            $data['SoLuongNguoi'],
            $data['TongTien'],
            $data['PhuongThucThanhToan'],
            $data['TrangThai']
        ];
        
        return $this->db->execute($sql, $params);
    }

    // Cập nhật đơn đặt tour
    public function updateOrder($data) {
        $sql = "UPDATE dattour SET 
                MaKhachHang = ?, 
                MaTour = ?, 
                NgayDat = ?, 
                SoLuongNguoi = ?, 
                TongTien = ?, 
                PhuongThucThanhToan = ?, 
                TrangThai = ? 
                WHERE MaDon = ?";
        
        $params = [
            $data['MaKhachHang'],
            $data['MaTour'],
            $data['NgayDat'],
            $data['SoLuongNguoi'],
            $data['TongTien'],
            $data['PhuongThucThanhToan'],
            $data['TrangThai'],
            $data['MaDon']
        ];
        
        return $this->db->execute($sql, $params);
    }

    // Xóa đơn đặt tour
    public function deleteOrder($id) {
        $sql = "DELETE FROM dattour WHERE MaDon = ?";
        return $this->db->execute($sql, [$id]);
    }

    // Lấy danh sách khách hàng
    public function getCustomers() {
        $sql = "SELECT MaKhachHang, HoTen FROM khachhang ORDER BY HoTen";
        return $this->db->getAll($sql);
    }

    // Lấy danh sách tour
    public function getTours() {
        $sql = "SELECT MaTour, TieuDe as TenTour FROM tourdulich ORDER BY TieuDe";
        return $this->db->getAll($sql);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus($id, $status) {
        $sql = "UPDATE dattour SET TrangThai = ? WHERE MaDon = ?";
        return $this->db->execute($sql, [$status, $id]);
    }

    // Đếm đơn hàng tháng hiện tại
    public function getMonthlyBookings() {
        $sql = "SELECT COUNT(*) as total FROM dattour 
                WHERE MONTH(NgayDat) = MONTH(CURDATE()) 
                AND YEAR(NgayDat) = YEAR(CURDATE())";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    // Tính doanh thu tháng hiện tại
    public function getMonthlyRevenue() {
        $sql = "SELECT COALESCE(SUM(TongTien), 0) as total FROM dattour 
                WHERE MONTH(NgayDat) = MONTH(CURDATE()) 
                AND YEAR(NgayDat) = YEAR(CURDATE())";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    // Lấy doanh thu theo từng tháng trong khoảng thời gian
    public function getRevenueByMonth($months = 12) {
        // Truy vấn SQL tính doanh thu và số đơn hàng theo tháng
        $sql = "SELECT 
                    DATE_FORMAT(NgayDat, '%Y-%m') as month,
                    DATE_FORMAT(NgayDat, '%m/%Y') as month_label,
                    SUM(TongTien) as revenue,
                    COUNT(*) as orders
                FROM dattour 
                WHERE NgayDat >= DATE_SUB(CURDATE(), INTERVAL ? MONTH)
                AND TrangThai IN ('Đã thanh toán', 'Hoàn thành')
                GROUP BY DATE_FORMAT(NgayDat, '%Y-%m')
                ORDER BY month ASC";
        return $this->db->getAll($sql, [$months]);
    }

    // Lấy danh sách tour được đặt nhiều nhất
    public function getMostBookedTours($limit = 5) {
        // Truy vấn SQL thống kê tour theo số lượng đặt và doanh thu
        $sql = "SELECT t.TieuDe, t.DiemDen, COUNT(dt.MaTour) as total_bookings,
                    SUM(dt.TongTien) as total_revenue
                FROM dattour dt
                JOIN tourdulich t ON dt.MaTour = t.MaTour
                GROUP BY dt.MaTour
                ORDER BY total_bookings DESC, total_revenue DESC
                LIMIT ?";
        return $this->db->getAll($sql, [$limit]);
    }

    // Thống kê đơn hàng theo danh mục (trong nước/ngoài nước)
    public function getBookingByCategory() {
        // Truy vấn SQL phân loại tour theo điểm đến và thống kê
        $sql = "SELECT 
                    CASE 
                        WHEN t.DiemDen LIKE '%Việt Nam%' OR t.DiemDen IN ('Hà Nội', 'TP.HCM', 'Đà Nẵng', 'Hội An', 'Nha Trang', 'Đà Lạt', 'Phú Quốc', 'Sapa', 'Hạ Long') 
                        THEN 'Trong nước' 
                        ELSE 'Ngoài nước' 
                    END as category,
                    COUNT(*) as total_bookings,
                    SUM(dt.TongTien) as total_revenue
                FROM dattour dt
                JOIN tourdulich t ON dt.MaTour = t.MaTour
                GROUP BY category";
        return $this->db->getAll($sql);
    }

    // Lấy danh sách đơn hàng chờ xử lý
    public function getPendingOrders() {
        // Truy vấn SQL lấy đơn hàng có trạng thái chờ xác nhận hoặc chờ thanh toán
        $sql = "SELECT dt.*, kh.HoTen as TenKhachHang, t.TieuDe as TenTour
                FROM dattour dt
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang
                LEFT JOIN tourdulich t ON dt.MaTour = t.MaTour
                WHERE dt.TrangThai IN ('Chờ xác nhận', 'Chờ thanh toán')
                ORDER BY dt.NgayDat DESC
                LIMIT 10";
        return $this->db->getAll($sql);
    }

    // Lấy đơn hàng sắp đến hạn khởi hành
    public function getOrdersNearDeadline($days = 3) {
        // Truy vấn SQL lấy đơn hàng có ngày khởi hành trong vòng X ngày tới
        $sql = "SELECT dt.*, kh.HoTen as TenKhachHang, t.TieuDe as TenTour,
                    DATEDIFF(t.NgayKhoiHanh, CURDATE()) as days_left
                FROM dattour dt
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang
                LEFT JOIN tourdulich t ON dt.MaTour = t.MaTour
                WHERE t.NgayKhoiHanh BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL ? DAY)
                AND dt.TrangThai NOT IN ('Hủy', 'Hoàn thành')
                ORDER BY t.NgayKhoiHanh ASC";
        return $this->db->getAll($sql, [$days]);
    }

    // Đếm tổng số đơn hàng
    public function getTotalOrders() {
        // Truy vấn SQL đếm tất cả đơn hàng
        $sql = "SELECT COUNT(*) as total FROM dattour";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    // Thống kê đơn hàng theo trạng thái
    public function getOrdersByStatus() {
        // Truy vấn SQL đếm đơn hàng theo từng trạng thái
        $sql = "SELECT TrangThai, COUNT(*) as total FROM dattour GROUP BY TrangThai";
        return $this->db->getAll($sql);
    }
}
?>
<?php
include_once 'database.php';

// Model quản lý thanh toán
class Payment {
    private $db;

    public function __construct() {
        $this->db = database::getInstance();
    }

    // Lấy tất cả thanh toán
    public function getAllPayments() {
        $sql = "SELECT tt.*, dt.MaKhachHang, kh.HoTen as TenKhachHang, dt.MaTour 
                FROM thanhtoan tt 
                LEFT JOIN dattour dt ON tt.MaDon = dt.MaDon 
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang 
                ORDER BY tt.MaThanhToan DESC";
        return $this->db->getAll($sql);
    }

    // Lấy thông tin thanh toán theo mã
    public function getById($id) {
        $sql = "SELECT tt.*, dt.MaKhachHang, kh.HoTen as TenKhachHang, dt.MaTour 
                FROM thanhtoan tt 
                LEFT JOIN dattour dt ON tt.MaDon = dt.MaDon 
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang 
                WHERE tt.MaThanhToan = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Thêm thanh toán mới
    public function addPayment($data) {
        $sql = "INSERT INTO thanhtoan (MaDon, MaVoucher, SoTienThanhToan, NgayThanhToan, PhuongThucThanhToan, SoDT, DiaChi, TrangThai, GhiChu)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->execute($sql, [
            $data['MaDon'],
            $data['MaVoucher'],
            $data['SoTienThanhToan'],
            $data['NgayThanhToan'],
            $data['PhuongThucThanhToan'],
            $data['SoDT'],
            $data['DiaChi'],
            $data['TrangThai'],
            $data['GhiChu']
        ]);
    }

    // Cập nhật thông tin thanh toán
    public function updatePayment($data) {
        $sql = "UPDATE thanhtoan SET 
                    MaDon = ?, 
                    MaVoucher = ?, 
                    SoTienThanhToan = ?, 
                    NgayThanhToan = ?, 
                    PhuongThucThanhToan = ?, 
                    SoDT = ?, 
                    DiaChi = ?, 
                    TrangThai = ?, 
                    GhiChu = ?
                WHERE MaThanhToan = ?";
        return $this->db->execute($sql, [
            $data['MaDon'],
            $data['MaVoucher'],
            $data['SoTienThanhToan'],
            $data['NgayThanhToan'],
            $data['PhuongThucThanhToan'],
            $data['SoDT'],
            $data['DiaChi'],
            $data['TrangThai'],
            $data['GhiChu'],
            $data['MaThanhToan']
        ]);
    }

    // Xóa thanh toán theo mã
    public function deletePayment($id) {
        $sql = "DELETE FROM thanhtoan WHERE MaThanhToan = ?";
        return $this->db->execute($sql, [$id]);
    }

    // Lấy thông tin đơn hàng cho dropdown
    public function getAllOrders() {
        $sql = "SELECT dt.MaDon, dt.MaKhachHang, kh.HoTen, dt.MaTour, dt.SoLuongNguoi, dt.TongTien
                FROM dattour dt 
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang 
                ORDER BY dt.MaDon DESC";
        return $this->db->getAll($sql);
    }

    // Lấy thông tin voucher cho dropdown
    public function getAllVouchers() {
        $sql = "SELECT MaVoucher, TenVoucher FROM voucher ORDER BY TenVoucher";
        return $this->db->getAll($sql);
    }

    // ===== PHƯƠNG THỨC THỐNG KÊ CHO DASHBOARD =====
    
    public function getPaymentsDue($days = 7) {
        $sql = "SELECT tt.*, dt.NgayDat, kh.HoTen as TenKhachHang, t.TieuDe as TenTour
                FROM thanhtoan tt
                LEFT JOIN dattour dt ON tt.MaDon = dt.MaDon
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang
                LEFT JOIN tourdulich t ON dt.MaTour = t.MaTour
                WHERE tt.TrangThai = 'Chờ thanh toán'
                AND tt.NgayThanhToan BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL ? DAY)
                ORDER BY tt.NgayThanhToan ASC";
        return $this->db->getAll($sql, [$days]);
    }

    public function getTotalRevenue() {
        $sql = "SELECT SUM(SoTienThanhToan) as total FROM thanhtoan WHERE TrangThai = 'Đã thanh toán'";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    public function getMonthlyPayments() {
        $sql = "SELECT COUNT(*) as total FROM thanhtoan 
                WHERE MONTH(NgayThanhToan) = MONTH(CURDATE()) 
                AND YEAR(NgayThanhToan) = YEAR(CURDATE())
                AND TrangThai = 'Đã thanh toán'";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    public function getPaymentsByMethod() {
        $sql = "SELECT PhuongThucThanhToan, COUNT(*) as total, SUM(SoTienThanhToan) as total_amount
                FROM thanhtoan 
                WHERE TrangThai = 'Đã thanh toán'
                GROUP BY PhuongThucThanhToan";
        return $this->db->getAll($sql);
    }

    public function getPendingPayments() {
        $sql = "SELECT tt.*, dt.NgayDat, kh.HoTen as TenKhachHang
                FROM thanhtoan tt
                LEFT JOIN dattour dt ON tt.MaDon = dt.MaDon
                LEFT JOIN khachhang kh ON dt.MaKhachHang = kh.MaKhachHang
                WHERE tt.TrangThai IN ('Chờ thanh toán', 'Đang xử lý')
                ORDER BY tt.NgayThanhToan ASC
                LIMIT 10";
        return $this->db->getAll($sql);
    }

    public function getRevenueByMonth($months = 12) {
        $sql = "SELECT 
                    DATE_FORMAT(NgayThanhToan, '%Y-%m') as month,
                    DATE_FORMAT(NgayThanhToan, '%m/%Y') as month_label,
                    SUM(SoTienThanhToan) as revenue,
                    COUNT(*) as payments
                FROM thanhtoan 
                WHERE NgayThanhToan >= DATE_SUB(CURDATE(), INTERVAL ? MONTH)
                AND TrangThai = 'Đã thanh toán'
                GROUP BY DATE_FORMAT(NgayThanhToan, '%Y-%m')
                ORDER BY month ASC";
        return $this->db->getAll($sql, [$months]);
    }
}
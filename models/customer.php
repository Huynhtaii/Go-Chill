<?php
include_once 'database.php';

// Model quản lý khách hàng
class Customer {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Lấy tất cả khách hàng
    public function getAll() {
        $sql = "SELECT * FROM khachhang ORDER BY MaKhachHang DESC";
        return $this->db->getAll($sql);
    }

    // Lấy khách hàng theo ID
    public function getById($id) {
        $sql = "SELECT * FROM khachhang WHERE MaKhachHang = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Lấy khách hàng theo email
    public function getByEmail($email) {
        $sql = "SELECT * FROM khachhang WHERE Email = ?";
        return $this->db->getOne($sql, [$email]);
    }

    // Thêm khách hàng mới
    public function addCustomer($data) {
        $sql = "INSERT INTO khachhang (HoTen, SoDienThoai, Email, MatKhau, VaiTro, TinhThanh, QuanHuyen) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $result = $this->db->execute($sql, [
            $data['HoTen'],
            $data['SoDienThoai'],
            $data['Email'],
            $data['MatKhau'] ?? null,
            $data['VaiTro'] ?? 'user',
            $data['TinhThanh'] ?? null,
            $data['QuanHuyen'] ?? null
        ]);

        if ($result) {
            return $this->db->getConn()->lastInsertId();
        }
        
        return false;
    }

    // Cập nhật thông tin khách hàng
    public function updateCustomer($data) {
        // Câu lệnh SQL UPDATE các trường thông tin
        $sql = "UPDATE khachhang SET 
                HoTen = ?,
                SoDienThoai = ?,
                Email = ?,
                TinhThanh = ?,
                QuanHuyen = ?
                WHERE MaKhachHang = ?";
        
        // Thực thi câu lệnh UPDATE
        return $this->db->execute($sql, [
            $data['HoTen'],
            $data['SoDienThoai'],
            $data['Email'],
            $data['TinhThanh'] ?? null, // Có thể null
            $data['QuanHuyen'] ?? null,  // Có thể null
            $data['MaKhachHang'] // ID khách hàng cần cập nhật
        ]);
    }

    // Xóa khách hàng theo ID
    public function deleteCustomer($id) {
        // Câu lệnh SQL DELETE với tham số ID
        $sql = "DELETE FROM khachhang WHERE MaKhachHang = ?";
        return $this->db->execute($sql, [$id]);
    }

    // CHÚ Ý: Đăng nhập khách hàng - kiểm tra email và mật khẩu
    public function login($email, $password) {
        // Truy vấn SQL kiểm tra email và mật khẩu
        $sql = "SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ?";
        return $this->db->getOne($sql, [$email, $password]);
    }

    // Xác thực đăng nhập bằng email hoặc số điện thoại (nâng cấp)
    public function authenticateUser($emailOrPhone, $password) {
        $isEmail = filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL);
        
        if ($isEmail) {
            $sql = "SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ?";
        } else {
            $sql = "SELECT * FROM khachhang WHERE SoDienThoai = ? AND MatKhau = ?";
        }
        
        return $this->db->getOne($sql, [$emailOrPhone, $password]);
    }

    // Kiểm tra email đã tồn tại trong database chưa
    public function emailExists($email) {
        // Truy vấn SQL đếm số lượng email trùng
        $sql = "SELECT COUNT(*) as count FROM khachhang WHERE Email = ?";
        $result = $this->db->getOne($sql, [$email]);
        // Trả về true nếu email đã tồn tại (count > 0)
        return $result['count'] > 0;
    }

    // Đếm tổng số khách hàng trong database
    public function getTotalCustomers() {
        // Truy vấn SQL đếm tất cả khách hàng
        $sql = "SELECT COUNT(*) as total FROM khachhang";
        $result = $this->db->getOne($sql);
        // Trả về số lượng hoặc 0 nếu không có dữ liệu
        return $result['total'] ?? 0;
    }
    
    // Alias method - gọi lại getTotalCustomers
    public function countAll() {
        return $this->getTotalCustomers();
    }
}
?>

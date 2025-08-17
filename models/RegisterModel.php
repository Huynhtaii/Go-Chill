<?php
require_once __DIR__ . '/../database.php';

class RegisterModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConn();
    }

    // Lấy tất cả khách hàng
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM khachhang ORDER BY MaKhachHang DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm khách hàng mới
    public function addCustomer($data) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO khachhang (HoTen, SoDienThoai, Email, MatKhau, VaiTro, TinhThanh, QuanHuyen) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $ok = $stmt->execute([
                $data['fullName'], // sửa lại cho đồng bộ với controller
                $data['phone'],
                $data['email'],
                $data['password'],
                $data['role'] ?? 'user', // nếu không có thì mặc định là 'user'
                $data['province'],
                $data['district']
            ]);
            return $ok;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Kiểm tra email đã tồn tại chưa
    public function existsByEmail($email) {
        $stmt = $this->conn->prepare("SELECT MaKhachHang FROM khachhang WHERE Email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    // Kiểm tra số điện thoại đã tồn tại chưa
    public function existsByPhone($phone) {
        $stmt = $this->conn->prepare("SELECT MaKhachHang FROM khachhang WHERE SoDienThoai = ? LIMIT 1");
        $stmt->execute([$phone]);
        return $stmt->fetch() !== false;
    }

    // Xác thực đăng nhập
    public function authenticate($email, $password) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ? LIMIT 1");
            $stmt->execute([$email, $password]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
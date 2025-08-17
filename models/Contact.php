<?php
include_once 'database.php';

class Contact {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Lấy tất cả liên hệ
    public function getAllContacts() {
        $sql = "SELECT * FROM lienhe ORDER BY NgayTao DESC";
        return $this->db->getAll($sql);
    }

    // Lấy thông tin liên hệ theo mã
    public function getById($id) {
        $sql = "SELECT * FROM lienhe WHERE MaLienHe = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Thêm liên hệ mới
    public function addContact($data) {
        $sql = "INSERT INTO lienhe (HoTen, SoDienThoai, GhiChu, TrangThai, NgayTao)
                VALUES (?, ?, ?, ?, ?)";
        return $this->db->execute($sql, [
            $data['HoTen'],
            $data['SoDienThoai'],
            $data['GhiChu'],
            $data['TrangThai'],
            $data['NgayTao']
        ]);
    }

    // Cập nhật thông tin liên hệ
    public function updateContact($data) {
        $sql = "UPDATE lienhe SET 
                    HoTen = ?, 
                    SoDienThoai = ?, 
                    GhiChu = ?, 
                    TrangThai = ?
                WHERE MaLienHe = ?";
        return $this->db->execute($sql, [
            $data['HoTen'],
            $data['SoDienThoai'],
            $data['GhiChu'],
            $data['TrangThai'],
            $data['MaLienHe']
        ]);
    }

    // Xóa liên hệ theo mã
    public function deleteContact($id) {
        $sql = "DELETE FROM lienhe WHERE MaLienHe = ?";
        return $this->db->execute($sql, [$id]);
    }

    // Cập nhật trạng thái liên hệ
    public function updateStatus($id, $status) {
        $sql = "UPDATE lienhe SET TrangThai = ? WHERE MaLienHe = ?";
        return $this->db->execute($sql, [$status, $id]);
    }

    // Đếm số liên hệ chưa xử lý
    public function countUnprocessed() {
        $sql = "SELECT COUNT(*) as total FROM lienhe WHERE TrangThai = 1";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    // ===== PHƯƠNG THỨC THỐNG KÊ CHO DASHBOARD =====
    
    public function getRecentUnprocessed($limit = 5) {
        $sql = "SELECT * FROM lienhe 
                WHERE TrangThai = 1 
                ORDER BY NgayTao DESC 
                LIMIT ?";
        return $this->db->getAll($sql, [$limit]);
    }

    public function getTotalContacts() {
        $sql = "SELECT COUNT(*) as total FROM lienhe";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }

    public function getContactsByStatus() {
        $sql = "SELECT 
                    CASE WHEN TrangThai = 1 THEN 'Chưa xử lý' ELSE 'Đã xử lý' END as status,
                    COUNT(*) as total 
                FROM lienhe 
                GROUP BY TrangThai";
        return $this->db->getAll($sql);
    }

    public function getMonthlyContacts() {
        $sql = "SELECT COUNT(*) as total FROM lienhe 
                WHERE MONTH(NgayTao) = MONTH(CURDATE()) 
                AND YEAR(NgayTao) = YEAR(CURDATE())";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }
}
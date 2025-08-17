<?php
include_once 'database.php';

class Rate {
    private $db;

    public function __construct() {
        $this->db = database::getInstance();
    }

    // Lấy tất cả đánh giá
    public function getAllRates() {
        $sql = "SELECT * FROM danhgia ORDER BY NgayDang DESC";
        return $this->db->getAll($sql);
    }

    // Lấy đánh giá theo ID
    public function getById($id) {
        $sql = "SELECT * FROM danhgia WHERE MaDanhGia = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Thêm đánh giá mới
    public function addRate($data) {
        $sql = "INSERT INTO danhgia (MaKhachHang, MaTour, SoSao, NhanXet, NgayDang)
                VALUES (?, ?, ?, ?, ?)";
        return $this->db->execute($sql, [
            $data['MaKhachHang'],
            $data['MaTour'],
            $data['SoSao'],
            $data['NhanXet'],
            $data['NgayDang']
        ]);
    }

    // Cập nhật đánh giá
    public function updateRate($data) {
        $sql = "UPDATE danhgia SET 
                    MaKhachHang = ?, 
                    MaTour = ?, 
                    SoSao = ?, 
                    NhanXet = ?, 
                    NgayDang = ?
                WHERE MaDanhGia = ?";
        return $this->db->execute($sql, [
            $data['MaKhachHang'],
            $data['MaTour'],
            $data['SoSao'],
            $data['NhanXet'],
            $data['NgayDang'],
            $data['MaDanhGia']
        ]);
    }

    // Xóa đánh giá
    public function deleteRate($id) {
        $sql = "DELETE FROM danhgia WHERE MaDanhGia = ?";
        return $this->db->execute($sql, [$id]);
    }
}
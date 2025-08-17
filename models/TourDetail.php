<?php
include_once 'database.php';

class TourDetail {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Lấy tất cả chi tiết tour
    public function getAll() {
        $sql = "SELECT td.*, t.TenTour FROM tourdetails td 
                LEFT JOIN tourdulich t ON td.MaTour = t.MaTour 
                ORDER BY td.id DESC";
        return $this->db->getAll($sql);
    }

    // Lấy chi tiết tour theo mã tour
    public function getByTourId($maTour) {
        $sql = "SELECT * FROM tourdetails WHERE MaTour = ?";
        return $this->db->getAll($sql, [$maTour]);
    }

    // Lấy chi tiết tour theo id chi tiết
    public function getById($id) {
        $sql = "SELECT * FROM tourdetails WHERE id = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Thêm chi tiết tour
    public function add($data) {
        $sql = "INSERT INTO tourdetails (MaTour, NoiDung, HinhAnh) VALUES (?, ?, ?)";
        return $this->db->execute($sql, [
            $data['MaTour'],
            $data['NoiDung'],
            $data['HinhAnh']
        ]);
    }

    // Sửa chi tiết tour
    public function update($data) {
        $sql = "UPDATE tourdetails SET NoiDung = ?, HinhAnh = ? WHERE id = ?";
        return $this->db->execute($sql, [
            $data['NoiDung'],
            $data['HinhAnh'],
            $data['id']
        ]);
    }

    // Xóa chi tiết tour
    public function delete($id) {
        $sql = "DELETE FROM tourdetails WHERE id = ?";
        return $this->db->execute($sql, [$id]);
    }
}
<?php
include_once __DIR__ . '/../database.php';

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM danhmuctour ORDER BY ID DESC";
        return $this->db->getAll($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM danhmuctour ORDER BY ID DESC";
        return $this->db->getAll($sql);
    }

    public function getCategoryById($id) {
        $sql = "SELECT * FROM danhmuctour WHERE ID = ?";
        return $this->db->getOne($sql, [$id]);
    }

    public function addCategory($data) {
        $sql = "INSERT INTO danhmuctour (TenDanhMuc, TrangThai) VALUES (?, ?)";
        return $this->db->execute($sql, [$data['TenDanhMuc'], $data['TrangThai']]);
    }

    public function updateCategory($data) {
        $sql = "UPDATE danhmuctour SET TenDanhMuc = ?, TrangThai = ? WHERE ID = ?";
        return $this->db->execute($sql, [$data['TenDanhMuc'], $data['TrangThai'], $data['ID']]);
    }

    public function deleteCategory($id) {
        // Kiểm tra xem có tour nào đang sử dụng danh mục này không
        $sql = "SELECT COUNT(*) as count FROM tourdulich WHERE IDDanhMuc = ?";
        $result = $this->db->getOne($sql, [$id]);
        
        if ($result['count'] > 0) {
            return false; // Không thể xóa vì có tour đang sử dụng
        }
        
        $sql = "DELETE FROM danhmuctour WHERE ID = ?";
        return $this->db->execute($sql, [$id]);
    }

    public function getActiveCategories() {
        $sql = "SELECT * FROM danhmuctour WHERE TrangThai = 'Hoạt động' ORDER BY TenDanhMuc";
        return $this->db->getAll($sql);
    }
}
?> 

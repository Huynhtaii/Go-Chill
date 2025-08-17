<?php
include_once 'database.php';

class News {
    private $db;

    public function __construct() {
        $this->db = database::getInstance();
    }

    // Lấy tất cả bản tin
    public function getAllNews() {
        $sql = "SELECT * FROM tintuc ORDER BY NgayDang DESC";
        return $this->db->getAll($sql);
    }

    // Lấy 1 bản tin theo MaTin
    public function getById($id) {
        $sql = "SELECT * FROM tintuc WHERE MaTin = ?";
        return $this->db->getOne($sql, [$id]);
    }

    // Thêm mới bản tin
    public function addNews($data) {
        $sql = "INSERT INTO tintuc (TieuDe, NoiDung, HinhDaiDien, NgayDang, ChuDe)
                VALUES (?, ?, ?, ?, ?)";
        return $this->db->execute($sql, [
            $data['TieuDe'],
            $data['NoiDung'],
            $data['HinhDaiDien'],
            $data['NgayDang'],
            $data['ChuDe']
        ]);
    }

    // Cập nhật bản tin
    public function updateNews($data) {
        $sql = "UPDATE tintuc SET 
                    TieuDe = ?, 
                    NoiDung = ?, 
                    HinhDaiDien = ?, 
                    NgayDang = ?, 
                    ChuDe = ?
                WHERE MaTin = ?";
        return $this->db->execute($sql, [
            $data['TieuDe'],
            $data['NoiDung'],
            $data['HinhDaiDien'],
            $data['NgayDang'],
            $data['ChuDe'],
            $data['MaTin']
        ]);
    }

    // Xóa bản tin
    public function deleteNews($id) {
        $sql = "DELETE FROM tintuc WHERE MaTin = ?";
        return $this->db->execute($sql, [$id]);
    }
}

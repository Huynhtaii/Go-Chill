<?php
include_once 'database.php';

// Model quản lý voucher
class Voucher {
    private $db;

    public function __construct() {
        $this->db = database::getInstance();
    }

    // Lấy tất cả voucher
    public function getAll() {
        $sql = "SELECT ID, MaVoucher, TenVoucher, MoTa, LoaiGiamGia, GiaTriGiamGia, SoLuong, NgayBatDau, NgayKetThuc, TrangThai, NgayTao FROM voucher ORDER BY NgayTao DESC";
        return $this->db->getAll($sql);
    }

    public function getById($id) {
        $sql = "SELECT ID, MaVoucher, TenVoucher, MoTa, LoaiGiamGia, GiaTriGiamGia, SoLuong, NgayBatDau, NgayKetThuc, TrangThai, NgayTao FROM voucher WHERE ID = ?";
        return $this->db->getOne($sql, [$id]);
    }

    public function getByCode($code) {
        $sql = "SELECT ID, MaVoucher, TenVoucher, MoTa, LoaiGiamGia, GiaTriGiamGia, SoLuong, NgayBatDau, NgayKetThuc, TrangThai, NgayTao FROM voucher WHERE MaVoucher = ?";
        return $this->db->getOne($sql, [$code]);
    }

    public function addVoucher($data) {
        $sql = "INSERT INTO voucher (MaVoucher, TenVoucher, MoTa, LoaiGiamGia, GiaTriGiamGia, SoLuong, NgayBatDau, NgayKetThuc, TrangThai, NgayTao)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        return $this->db->execute($sql, [
            $data['MaVoucher'],
            $data['TenVoucher'],
            $data['MoTa'],
            $data['LoaiGiamGia'],
            $data['GiaTriGiamGia'],
            $data['SoLuong'],
            $data['NgayBatDau'],
            $data['NgayKetThuc'],
            $data['TrangThai']
        ]);
    }

    public function updateVoucher($data) {
        $sql = "UPDATE voucher SET 
            MaVoucher = ?,
            TenVoucher = ?,
            MoTa = ?,
            LoaiGiamGia = ?,
            GiaTriGiamGia = ?,
            SoLuong = ?,
            NgayBatDau = ?,
            NgayKetThuc = ?,
            TrangThai = ?,
            NgayCapNhat = NOW()
            WHERE ID = ?";
        return $this->db->execute($sql, [
            $data['MaVoucher'],
            $data['TenVoucher'],
            $data['MoTa'],
            $data['LoaiGiamGia'],
            $data['GiaTriGiamGia'],
            $data['SoLuong'],
            $data['NgayBatDau'],
            $data['NgayKetThuc'],
            $data['TrangThai'],
            $data['ID']
        ]);
    }

    public function deleteVoucher($id) {
        $sql = "DELETE FROM voucher WHERE ID = ?";
        return $this->db->execute($sql, [$id]);
    }

    public function getActiveVouchers() {
        $sql = "SELECT ID, MaVoucher, TenVoucher, MoTa, LoaiGiamGia, GiaTriGiamGia, SoLuong, NgayBatDau, NgayKetThuc, TrangThai, NgayTao FROM voucher WHERE TrangThai = 1 AND NgayBatDau <= NOW() AND NgayKetThuc >= NOW() AND SoLuong > 0 ORDER BY NgayTao DESC";
        return $this->db->getAll($sql);
    }

    public function checkVoucherValid($code, $totalAmount = 0) {
        $sql = "SELECT ID, MaVoucher, TenVoucher, MoTa, LoaiGiamGia, GiaTriGiamGia, SoLuong, NgayBatDau, NgayKetThuc, TrangThai, NgayTao FROM voucher WHERE MaVoucher = ? AND TrangThai = 1 AND NgayBatDau <= NOW() AND NgayKetThuc >= NOW() AND SoLuong > 0";
        $voucher = $this->db->getOne($sql, [$code]);
        
        if (!$voucher) {
            return ['valid' => false, 'message' => 'Mã voucher không hợp lệ hoặc đã hết hạn'];
        }

        return ['valid' => true, 'voucher' => $voucher];
    }

    public function calculateDiscount($voucher, $totalAmount) {
        if ($voucher['LoaiGiamGia'] == 'phantram') {
            $discount = ($totalAmount * $voucher['GiaTriGiamGia']) / 100;
            return $discount;
        } else {
            return $voucher['GiaTriGiamGia'];
        }
    }

    public function decreaseQuantity($id) {
        $sql = "UPDATE voucher SET SoLuong = SoLuong - 1 WHERE ID = ? AND SoLuong > 0";
        return $this->db->execute($sql, [$id]);
    }
}
<?php
include_once './models/Voucher.php';

class VoucherController {
    private $voucherModel;

    public function __construct() {
        $this->voucherModel = new Voucher();
    }

    public function index() {
        // Lấy danh sách voucher từ Model
        $vouchers = $this->voucherModel->getActiveVouchers();
        
        // Truyền dữ liệu sang view
        include './views/Site/voucher.php';
    }
} 

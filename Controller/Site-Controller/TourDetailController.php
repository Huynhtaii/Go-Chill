<?php
include_once './models/TourDetail.php';

class TourDetailController {
    private $tourDetailModel;

    public function __construct() {
        $this->tourDetailModel = new TourDetail();
    }

    public function index() {
        // Truyền dữ liệu sang view
        include './views/Site/tourdetail.php';
    }

    // Lấy chi tiết tour theo mã tour
    public function getByTourId($maTour) {
        return $this->tourDetailModel->getByTourId($maTour);
    }

    // Lấy chi tiết tour theo id chi tiết
    public function getById($id) {
        return $this->tourDetailModel->getById($id);
    }
}

<?php
// Bật hiển thị lỗi
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Khởi tạo session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Trang website khách hàng
require_once 'views/Site/index.php';

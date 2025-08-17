<?php
include_once 'database.php';

// Kiểm tra đăng nhập user
function checkuser($username, $password) {
    $conn= Database::getInstance()->getConn();
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
?>
<?php
class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "1234";
    private $database = "duan2";
    private $conn;

    public static $instance;
    // Tạo 1 instance duy nhất cho toàn dự án
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Database();
        }
        return self::$instance;
    }
      
    // Kết nối database
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
        }
    }
    
    // Chạy câu lệnh INSERT, UPDATE, DELETE
    public function execute($sql,$param = []){
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($param);
    }
    
    // Lấy nhiều dòng dữ liệu
    public function getAll($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy 1 dòng dữ liệu
    public function getOne($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy kết nối PDO
    public function getConn(){
        return $this->conn;
    }
    
    // Đếm transporter
    public function getTotalshow() {
        $sql = "SELECT COUNT(id) AS total_show FROM transporter";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row["total_show"] : 0;
    }
    
    // Đếm suppliers
    public function getTotalshow1() {
        $sql = "SELECT COUNT(id) AS total_show FROM suppliers";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row["total_show1"] : 0;
    }
    
    // Đếm events
    public function getTotalshow2() {
        $sql = "SELECT COUNT(id) AS total_show FROM events";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row["total_show2"] : 0;
    }
}   
?>
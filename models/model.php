<?php
class database {
    public $conn;
    public function __construct(){
        $host = "localhost";
        $dbname = "igniteFoot";
        $user = "root";
        $pass = "";

        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        }catch(PDOException $e){
            error_log($e->getMessage());
            die("Lỗi không khởi chạy được cơ sở dữ liệu vui lòng liên hệ với admin");
        }
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategories() {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductByID($id){
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_san_pham = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug để xem có dữ liệu không
        if(!$result){
            error_log("Không tìm thấy sản phẩm với ID: " . $id);
        }

        return $result;
    }
}
?>

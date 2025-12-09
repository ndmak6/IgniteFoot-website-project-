<?php
class databaseAdmin {
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
            die("Lỗi không khởi chạy được cơ sở dữ liệu vui lòng kiểm tra lại kết nối!");
        }
    }

    public function getAllProduct(){
        $stmt = $this->conn->prepare("select * from san_pham");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_sp_by_id($idAdmin) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham where id_san_pham=?");
        $stmt->execute([$idAdmin]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProducts($nameP, $describe, $price, $imagePath){
        $stmt = $this->conn->prepare("insert into san_pham (ten_san_pham, mo_ta, gia, anh) values (?,?,?,?)");
        return $stmt->execute([$nameP, $describe, $price, $imagePath]);
    }

    public function deleteProducts($idAdmin){
        $stmt = $this->conn->prepare("delete from san_pham where id_san_pham = :id");
        return $stmt->execute([":id" => $idAdmin]);
    }

    public function editProduct($idAdmin){
        // lú quá tạm tạm đây đã 
    }
}
?>
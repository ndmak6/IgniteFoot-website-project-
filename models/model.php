<?php
class database {
    public $conn;
    public function __construct(){
        $host = "localhost";
        $dbname = "ignitefoot";
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
    public function getProductById( $id) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_san_pham = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function deteleProduct( $id) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_san_pham = ?");
        $stmt->execute([$id]);
    }
    public function getAllCategories() {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function register($id, $ten, $email, $passwordHash){
        $stmt = $this->conn->prepare("insert into nguoi_dung(id_nguoi_dung, ten_nguoi_dung, email, mat_khau) values(?, ?, ?, ?)");
        return $stmt->execute([$id, $ten, $email, $passwordHash]);
    }
    public function getUserByEmail($email){
    $stmt = $this->conn->prepare(
        "SELECT * FROM nguoi_dung WHERE email = ? LIMIT 1"
    );
    $stmt->execute([$email]);
    return $stmt->fetch();
    }
    public function getsanphamByDanhmuc($id_danh_muc){
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_danh_muc = ?");
        $stmt->execute([$id_danh_muc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getdanhmuc(){
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
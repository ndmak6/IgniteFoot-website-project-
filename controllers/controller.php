<?php

class controller {
    private $model;
    public function __construct(){
        require_once "./models/model.php";
        $this->model = new database();
    }

    private function isSaveSession($user){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'ten' => $user['ten'],
            'email' => $user['email']
        ];
    }

    public function home(){
        $productcategories  = $this->model->getdanhmuc();
        include "./views/main-content-home.php";
        include "./views/footer.php";
    }

    public function shop(){
        $page = "shop";
        $products = $this->model->getAll();
        $productcategories  = $this->model->getdanhmuc();
        $prod = $this -> model -> getAll();
        include "./views/header-main-without-home.php";
        include "./views/main-content-shop.php";
        include "./views/footer.php";
    }
    public function show_product(){
        
    }
    public function shoppingcart(){
        $id = $_GET['id'] ?? null;
        $product = null;

        if ($id) {
            $product = $this->model->getProductById($id);
        }
        include "./views/shoppingcart.php";
    }
    // Trong Controller (file controller.php)
    public function deleteproduct(){
        $id = $_GET['id'] ?? null; 
        
        if ($id !== null) {
            $this->model->deteleProduct($id); 
        }
        
        header('Location: index.php?page=shoppingcart'); 
        exit; 
    }
    public function productdetail(){
        include "./views/productdetail.php";
    }
    public function productcatalog(){
        $id_danh_muc = isset($_GET['id_danh_muc'])
            ? (int)$_GET['id_danh_muc']
            : 0;

        $products = [];

        if ($id_danh_muc > 0) {
            $products = $this->model->getSanPhamByDanhMuc($id_danh_muc);
        }

        include "./views/productcatalog.php";
    }

    public function show_category(){
        $cate = $this -> model -> getAllCategories();
    }  

    public function product_detail($id = null){
        if($id === null){
            echo "không có id sản phẩm! ";
            exit;
        }

        $productdetail = $this->model->getProductByID($id);
        
        // Thêm dòng này để debug
        if(!$productdetail){
            echo "Không tìm thấy sản phẩm với ID: " . $id;
            var_dump($productdetail);
            exit;
        }
    // Truyền biến vào view
    include "views/header-main-without-home.php";
    include "views/productdetail.php";
    include "views/footer.php";
    }

    public function order_success() {
    $id = $_GET["id"];
    include "./views/checkout-success.php";
    }

    public function registerLoginForm(){
        include "./views/register-login-form.php";
    }

    public function registerCustomer(){
        $id = uniqid('USER');
        $ten = $_POST['ten-tai-khoan'];
        $email = $_POST['email'];
        $mk = $_POST['mat-khau'];
        $re_mk = $_POST['nhap-lai-mk'];

        if($re_mk !== $mk){
            echo "<script> alert('Nhập lại mật khẩu sai! Yêu cầu nhập lại mật khẩu!'); 
            window.location.href = 'index.php?page=registerLoginForm';</script>";
            return;
        } 
        
        if($this->model->getUserByEmail($email)){
            echo "<script> alert('Email đã tồn tại yêu cầu nhập lại email'); 
            window.location.href = 'index.php?page=registerLoginForm';</script>";
            return;
        }
        
        else{
            $passwordHash = password_hash($mk, PASSWORD_DEFAULT);
            $this->model->register($id, $ten, $email, $passwordHash);

            // $user = $this->model->getUserByEmail($email);

            if($this->model->getUserByEmail($email)){
                $user = $this->model->getUserByEmail($email);
                $this->isSaveSession($user);
                header("location: index.php");
            } else{
                echo "<script> alert('Đăng ký thất bại'); </script>";
            }

            
        }
    }

    public function loginCustomer(){
        $mail = $_POST['mail'];
        $mk = $_POST['mk'];

        $user = $this->model->getUserByEmail($mail);

        if(!$user){
            echo "<script>
            alert('Email ko tồn tại');
            window.location.href = 'index.php?page=registerLoginForm';
            </script>";
            exit();
        }
        if(password_verify($mk, $user['mat_khau'])){
            $this->isSaveSession($user);
            header("location: index.php");
            exit;
        }else{
            echo "<script>
            alert('Sai mật khẩu!');
            window.location.href = 'index.php?page=registerLoginForm';
            </script>";
            exit();
        }
    }

    public function profileCustomer(){
        include "./views/profileCustomer.php";
    }

    public function logoutFunction(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    session_unset($_SESSION['user']);
    session_destroy($_SESSION['user']);

    header("Location: index.php");
    exit;
    }


}

?>
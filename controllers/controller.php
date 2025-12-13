<?php

class controller {
    private $model;
    public function __construct(){
        require_once "./models/model.php";
        $this->model = new database();
    }

    private function isSaveStatus($user){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $_SESSION['user'] = [
            'id' => $user['id_nguoi_dung'],
            'ten' => $user['ten_nguoi_dung'],
            'email' => $user['email'],
            'vai_tro' => $user['vai_tro']
        ];
    }

    public function home(){
        include "./views/main-content-home.php";
        include "./views/footer.php";
    }

    public function shop(){
        $page = "shop";
        include "./views/header-main-without-home.php";
        include "./views/main-content-shop.php";
        include "./views/footer.php";
    }
    public function show_product(){
        $prod = $this -> model -> getAll();
        
    }
    public function checkout(){
        include "./views/checkout-page.php";
    }

    public function formRegisLogin(){
        include_once "./views/register-login-form.php";
    }

    public function regisFunction(){
        $id = uniqid('USER');
        $name = $_POST['ten-tai-khoan'];
        $email = $_POST['email'];
        $mk = $_POST['mat-khau'];
        $reMk = $_POST['nhap-lai-mk'];

        if($reMk !== $mk){
            echo "<script> alert('Xác minh mật khẩu sai!'); </script>";
            return;
        } else{
            $pashWordHash = password_hash($mk, PASSWORD_DEFAULT);
            $this->model->register($id, $name, $email, $pashWordHash);


            $user = $this->model->getUserByEmail($email);

            $this->isSaveStatus($user);

            header("location: index.php");
        }
    }

    public function profileCustomer(){
        include "./views/profile-customer.php";
    }

    
}

?>
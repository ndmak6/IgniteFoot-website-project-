<?php

class controller {
    private $model;
    public function __construct(){
        require_once "./models/model.php";
        $this->model = new database();
    }

    public function home(){
        include "./views/main-content-home.php";
        include "./views/footer.php";
    }

    public function shop(){
        $page = "shop";
        $products = $this->model->getAll();
        include "./views/header-main-without-home.php";
        include "./views/main-content-shop.php";
        include "./views/footer.php";
    }
    // public function getAllProducts(){
    //     include "./views/main-content-shop.php";
    // }
    public function shoppingcart(){
        include "./views/shoppingcart.php";
    }
}

?>
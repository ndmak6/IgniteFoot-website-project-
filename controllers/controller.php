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
    public function show_product(){
        $prod = $this -> model -> getAll();
        
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
        include "./views/productcatalog.php";
    }
}

?>
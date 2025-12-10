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
        include "./views/header-main-without-home.php";
        include "./views/main-content-shop.php";
        include "./views/footer.php";
    }
<<<<<<< Updated upstream
    public function show_product(){
        $prod = $this -> model -> getAll();
        
=======
    public function checkout(){
        include "./views/header-main-without-home.php";
        include "./views/checkout.php";
        include "./views/footer.php";
    }
    public function shoppingcart(){
        $id = $_GET['id'] ?? null;
        $product = null;

        if ($id) {
            $product = getProductById($id);
        }
        include "./views/shoppingcart.php";
>>>>>>> Stashed changes
    }
}

?>
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
    public function show_product(){
        $prod = $this -> model -> getAll();
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

}

?>
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
        // Lấy ID: Cần kiểm tra xem key 'id' có tồn tại không trước khi truy cập
        $id = $_GET['id'] ?? null; 
        
        if ($id !== null) {
            // 1. Thực hiện xóa sản phẩm
            $this->model->deteleProduct($id); 
        }
        
        // 2. Chuyển hướng về trang Giỏ hàng để gọi lại hàm hiển thị
        // Giả sử key để hiển thị Giỏ hàng trong index.php là 'shoppingcart'
        header('Location: index.php?page=shoppingcart'); 
        exit; // Luôn dùng exit/die sau header('Location')
    }
}

?>
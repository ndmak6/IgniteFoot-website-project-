<?php
class controllerAdmin {
    private $modelAdmin;
    function __construct()
    {
        require_once "admin/models/model.php";
        $this->modelAdmin = new databaseAdmin();
    }

    public function loginAdminPage(){
        include "admin/views/login.php";
    }

    public function addProductPage(){
        include "admin/views/addProducts.php";
    }

    public function addProductHandle(){
        $nameP = $_POST['ten'];
        $describe = $_POST['mo_ta'];
        $price = $_POST['gia'];

        $imagePath = null;
        
        if(isset($_FILES['anh']) && $_FILES['anh']['error'] == 0){
            $imagePath = 'assets/uploads/' .$_FILES['anh']['name'];
            move_uploaded_file($_FILES['anh']['tmp_name'], $imagePath);
        }

        $this->modelAdmin->addProducts($nameP, $describe, $price, $imagePath);
        header('location: admin.php?pageAdmin=show_product_control');
    }

    public function deleteFunction($idAdmin){
        if($idAdmin){
            $this->modelAdmin->deleteProducts($idAdmin);
            header("location: admin.php?pageAdmin=show_product_control");
        }
    }
    public function edit_form(){
       $idAdmin = $_GET['idAdmin'];
        $sanpham = $this->modelAdmin->get_sp_by_id($idAdmin);
        require_once "admin/views/edit_form.php";
    }
    public function editFunction($idAdmin){
    $ten_sp = $_POST["ten"];
    $mota_sp = $_POST["mo_ta"];
    $gia_sp = $_POST["gia"];

    // Xử lý ảnh upload
    if (!empty($_FILES['anh']['name'])) {
    $target = "assets/uploads/" . basename($_FILES['anh']['name']);
    move_uploaded_file($_FILES['anh']['tmp_name'], $target);
    $anh_sp = $target;
    } else {
        $anh_sp = $_POST['anh_cu'];
    }

    $ma_sp = $_POST["ma_sp"];

    $this->modelAdmin->update_func($ten_sp,$mota_sp,$gia_sp,$anh_sp,$ma_sp);
    header("Location: admin.php?pageAdmin=show_product_control");
    }
    public function show_p(){
    $products = $this->modelAdmin->getAllProduct();
    ob_start();
    require "admin/views/productControl.php";
    $content = ob_get_clean();
    include "admin/views/layout.php";
}

public function dashboard(){
    ob_start();
    require "admin/views/dashboard.php";
    $content = ob_get_clean();
    include "admin/views/layout.php";
}


// public function customerControl(){
//     $customers = $this->modelAdmin->getAllCustomers();
//     ob_start();
//     require "admin/views/customerControl.php";
//     $content = ob_get_clean();
//     include "admin/views/layout.php";
// }
}
    

?>
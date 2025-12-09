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

    public function dashboard(){
        $products = $this->modelAdmin->getAllProduct();
        include "admin/views/header.php";
        include "admin/views/dashboard.php";
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
        header('location: admin.php');
    }

    public function deleteFunction($idAdmin){
        if($idAdmin){
            $this->modelAdmin->deleteProducts($idAdmin);
            header("location: admin.php");
        }
    }
    public function edit_form(){
       $idAdmin = $_GET['idAdmin'];
        $sanpham = $this->modelAdmin->get_sp_by_id($idAdmin);
        require_once "admin/views/edit_form.php";
    }
}
    

?>
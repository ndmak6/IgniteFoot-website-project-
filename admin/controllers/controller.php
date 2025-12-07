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

        if(isset($_POST['ten'])) {

        $ten = $_POST['ten'];
        $mo_ta = $_POST['mo_ta'];
        $gia = $_POST['gia'];

        $file = $_FILES['anh']['name'];
        $tmp  = $_FILES['anh']['tmp_name'];

        move_uploaded_file($tmp, "upload/" . $file);
    }

    }
}
?>
<?php
require_once "admin/controllers/controller.php";
$controllerAdmin = new controllerAdmin();

$pageAdmin = $_GET['pageAdmin'] ?? 'dashboard';
$idAdmin = $_GET['idAdmin'] ?? null;
switch ($pageAdmin) {
    case 'loginAdmin':
        $controllerAdmin->loginAdminPage();
        break;

    case 'dashboard':
        $controllerAdmin->dashboard();
        break;

    case 'addProduct':
        $controllerAdmin->addProductPage();
        break;

    case 'addNewProduct':
        $controllerAdmin->addProductHandle();
        break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
    
}
?>

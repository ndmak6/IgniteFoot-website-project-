<?php
require_once "./controllers/controller.php";

$controller = new controller();

$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null;
switch ($page) {
    case 'home':
        $controller->home();
        break;

    case 'shop':
        $controller->shop();
        break;
    case 'checkout' :
        $controller->checkout();
        break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
    
}
?>

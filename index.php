<?php
require_once "./controllers/controller.php";

$controller = new controller();

$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'home':
        $controller->home();
        break;
    echo "Lỗi trang không tồn tại";
    
}
?>

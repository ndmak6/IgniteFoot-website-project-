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
    case 'shoppingcart':
        $controller->shoppingcart();
        break;
     case 'editCateProducts':
        $controllerAdmin->editCateProductsF();
        break;
    case 'detele':
        $controller->deleteproduct();
        break;
    case 'productdetail':
        $controller->productdetail();
        break;
    case 'productcatalog':
        $controller->productcatalog();
        break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
}
?>
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
    case 'shoppingcart':
        $controller->shoppingcart();
        break;
     case 'editCateProducts':
        $controllerAdmin->editCateProductsF();
        break;
    case 'detele':
        $controller->deleteproduct();
        break;
    case 'productdetail':
        $controller->productdetail();
        break;
    case 'productcatalog':
        $controller->productcatalog();
        break;
    case 'registerLoginForm':
        $controller->registerLoginForm();
        break;
    case 'registerCustomer':
        $controller->registerCustomer();
        break;
    case 'profileCustomer':
        $controller->profileCustomer();
        break;
    case 'logoutFunction':
        $controller->logoutFunction();
        break;
    case 'loginCustomer':
        $controller->loginCustomer();
        break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
}
?>
<!-- chả hiểu kiểu j ae làm cái j v -->
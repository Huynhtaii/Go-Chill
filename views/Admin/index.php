<?php
// index.php - Dieu huong controller & action bang switch-case
include_once 'layout/header.php';

$controller = $_GET['controller'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'dashboard':
        include_once './Controller/Admin-Controller/DashboardController.php';
        $controllerObj = new DashboardController();
        break;
    case 'tour':
        include_once './Controller/Admin-Controller/TourController.php';
        $controllerObj = new TourController();
        break;
    case 'category':
        include_once './Controller/Admin-Controller/CategoryController.php';
        $controllerObj = new CategoryController();
        break;
        
    case 'voucher':
        include_once './Controller/Admin-Controller/VoucherController.php';
        $controllerObj = new VoucherController();
        break;
    
    case 'news':
        include_once './Controller/Admin-Controller/NewsController.php';
        $controllerObj = new NewsController();
        break;

    case 'rate':
        include_once './Controller/Admin-Controller/RateController.php';
        $controllerObj = new RateController();
        break;
    case 'customer':
        include_once './Controller/Admin-Controller/CustomerController.php';
        $controllerObj = new CustomerController();
        break;
    case 'order':
        include_once './Controller/Admin-Controller/OrderController.php';
        $controllerObj = new OrderController();
        break;
    case 'payment':
        include_once './Controller/Admin-Controller/PaymentController.php';
        $controllerObj = new PaymentController();
        break;
    case 'contact':
        include_once './Controller/Admin-Controller/ContactController.php';
        $controllerObj = new ContactController();
        break;
    case 'tourdetail':
        include_once './Controller/Admin-Controller/TourDisplayController.php';
        $controllerObj = new TourDisplayController();
        break;
    case 'tourdisplay':
        include_once './Controller/Admin-Controller/TourDisplayController.php';
        $controllerObj = new TourDisplayController();
        break;
    case 'sigup':
        include_once './Controller/Admin-Controller/RegisterController.php';
        $controllerObj = new RegisterController();
        break;
    case 'register':
        include_once './Controller/Admin-Controller/RegisterController.php';
        $controllerObj = new RegisterController();
        break;
    default:
        die("Khong tim thay controller: $controller");
}

if (method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    echo "Khong tim thay action: $action";
}

include_once 'layout/footer.php';
?>
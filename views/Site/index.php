
<?php
// Bắt đầu output buffering để tránh lỗi headers already sent
ob_start();

// Kiểm tra session trước khi start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include FlashMessage helper
require_once './helpers/FlashMessage.php';

$controller = $_GET['controller'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

// Xử lý tất cả redirects trước khi có bất kỳ output nào
// Điều này đảm bảo header() có thể được gọi mà không bị lỗi
switch ($controller) {
    case 'home':
        include_once './Controller/Site-Controller/TourSiteController.php';
        $controllerObj = new TourSiteController();
        break;
    case 'about':
        include_once './Controller/Site-Controller/AboutController.php';
        $controllerObj = new AboutController();
        break;
    case 'tour':
        include_once './Controller/Site-Controller/TourSiteController.php';
        $controllerObj = new TourSiteController();
        
        // Xử lý hiển thị tour theo danh mục
        if (isset($_GET['category'])) {
            $categoryName = $_GET['category'];
            $controllerObj->toursByCategory($categoryName);
            exit; // Dừng thực thi để không chạy action mặc định
        } else {
            // Nếu không có category, hiển thị tất cả tour
            $controllerObj->allTours();
            exit;
        }
        break;
    case 'category':
        include_once './Controller/Admin-Controller/CategoryController.php';
        $controllerObj = new CategoryController();
        break;
        
    case 'voucher':
        include_once './Controller/Site-Controller/VoucherController.php';
        $controllerObj = new VoucherController();
        break;
        
    case 'payment':
        include_once './Controller/Site-Controller/PaymentController.php';
        $controllerObj = new PaymentController();
        break;
        
    case 'auth':
        include_once './Controller/Site-Controller/AuthController.php';
        $controllerObj = new AuthController();
        break;
    
    case 'news':
        include_once './Controller/Site-Controller/NewsController.php';
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

    case 'tourdetail':
        include_once './Controller/Site-Controller/TourDetailController.php';
        $controllerObj = new TourDetailController();
        break;

    case 'contact':
        include_once './Controller/Site-Controller/ContactController.php';
        $controllerObj = new ContactController();
        break;

    case 'sigup':
        include_once './Controller/Site-Controller/RegisterController.php';
        if ($action === 'authenticate') {
            $controllerObj = new RegisterController();
            $controllerObj->store();
        } else {
            $controllerObj = new RegisterController();
        }
        break;
    case 'register':
        include_once './Controller/Site-Controller/RegisterController.php';
        if ($action === 'index' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controllerObj = new RegisterController();
            $controllerObj->store();
        } else {
            $controllerObj = new RegisterController();
        }
        break;
    case 'login':
        // Redirect to auth controller for unified login system
        header('Location: index1.php?controller=auth&action=' . $action . 
               (isset($_GET['compact']) ? '&compact=1' : '') . 
               (isset($_GET['returnUrl']) ? '&returnUrl=' . urlencode($_GET['returnUrl']) : ''));
        exit;
        break;

    default:
        die("Khong tim thay controller: $controller");
}

// Sau khi xử lý tất cả redirects, bây giờ có thể output HTML
echo '<link rel="stylesheet" type="text/css" href="../public/styleWeb.css">';

// Thêm Font Awesome cho tất cả các trang
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">';

// Include header cho tất cả các trang trừ login (register cần header)
if ($controller !== 'login') {
    include_once 'header.php';
}

if (method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    echo "Khong tim thay action: $action";
}

// Luôn include footer
include_once 'footer.php';

// Kết thúc output buffering và gửi output
ob_end_flush();
?>

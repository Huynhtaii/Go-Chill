<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php'; // Thêm dòng này
require_once __DIR__ . '/../../database.php'; // Thêm database connection
require_once './models/Tour.php';
require_once './models/Voucher.php';
require_once './models/Customer.php';
require_once './Controller/Site-Controller/AuthController.php';
require_once './helpers/FlashMessage.php';
require_once './includes/mailer/Exception.php';
require_once './includes/mailer/PHPMailer.php';
require_once './includes/mailer/SMTP.php';


class PaymentController {
    // Khai báo các model cần thiết cho thanh toán
    private $tourModel;
    private $voucherModel;
    private $customerModel;
    
    public function __construct() {
        // Khởi tạo các model khi tạo controller
        $this->tourModel = new Tour();
        $this->voucherModel = new Voucher();
        $this->customerModel = new Customer();
    }

    // CHÚ Ý: Hiển thị trang thanh toán
    public function index() {
        // Kiểm tra user đã đăng nhập chưa
        AuthController::checkLogin();
        
        // Lấy thông tin tour từ URL parameter
        $tourId = $_GET['tour_id'] ?? null;
        $tour = null;
        
        // Nếu có tour_id thì lấy thông tin tour
        if ($tourId) {
            $tour = $this->tourModel->getById($tourId);
        }
        
        // Nếu không tìm thấy tour, chuyển về trang chủ
        if (!$tour) {
            header('Location: index1.php?controller=home');
            exit;
        }
        
        // Lấy danh sách voucher có sẵn để user chọn
        $vouchers = $this->voucherModel->getActiveVouchers();
        
        // Lấy thông tin user hiện tại để pre-fill form
        $currentUser = AuthController::getCurrentUser();
        
        // Truyền dữ liệu sang view thanh toán
        include './views/Site/payment.php';
    }

    // CHÚ Ý: Xử lý thanh toán - method quan trọng nhất
    public function checkout() {

        // Kiểm tra user đã đăng nhập chưa
        AuthController::checkLogin();
        
        // Kiểm tra method POST để tránh truy cập trực tiếp
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index1.php?controller=payment');
            exit;
        }

        // Lấy thông tin user hiện tại
        $currentUser = AuthController::getCurrentUser();

        // Lấy dữ liệu từ form thanh toán
        $data = [
            'fullName' => $_POST['fullName'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? '',
            'datetime' => $_POST['datetime'] ?? '',
            'voucherCode' => $_POST['voucherCode'] ?? '',
            'paymentMethod' => $_POST['paymentMethod'] ?? '',
            'tourId' => $_POST['tourId'] ?? '',
            'quantity' => $_POST['quantity'] ?? 1
        ];

        // Validation dữ liệu đầu vào
        $errors = $this->validatePaymentData($data);
        
        // Nếu có lỗi validation, quay lại form với thông báo lỗi
        if (!empty($errors)) {
            $_SESSION['payment_errors'] = $errors;
            $_SESSION['payment_data'] = $data;
            header('Location: index1.php?controller=payment&action=index&tour_id=' . $data['tourId']);
            exit;
        }

        // Lấy thông tin tour để tính toán giá
        $tour = $this->tourModel->getById($data['tourId']);
        if (!$tour) {
            $_SESSION['payment_errors'] = ['Tour không tồn tại'];
            header('Location: index1.php?controller=payment&action=index');
            exit;
        }

        // Tính toán giá ban đầu và khởi tạo biến giảm giá
        $originalPrice = $tour['GiaTour'] * $data['quantity'];
        $discount = 0;
        $voucherId = null;

        // Kiểm tra và áp dụng voucher nếu có
        if (!empty($data['voucherCode'])) {
            $voucherResult = $this->voucherModel->checkVoucherValid($data['voucherCode'], $originalPrice);
            if ($voucherResult['valid']) {
                // Lấy thông tin voucher và tính toán giảm giá
                $voucher = $voucherResult['voucher'];
                $discount = $this->voucherModel->calculateDiscount($voucher, $originalPrice);
                $voucherId = $voucher['ID'];
            } else {
                // Nếu voucher không hợp lệ, lưu lỗi và quay lại form
                $_SESSION['payment_errors'] = [$voucherResult['message']];
                $_SESSION['payment_data'] = $data;
                header('Location: index1.php?controller=payment&action=index&tour_id=' . $data['tourId']);
                exit;
            }
        }

        // Tính giá cuối cùng sau khi trừ giảm giá
        $finalPrice = $originalPrice - $discount;

        // Cập nhật thông tin khách hàng nếu cần
        $this->updateCustomerInfo($currentUser['id'], $data);

        // CHÚ Ý: Chuẩn bị dữ liệu đơn hàng để lưu vào database
        $orderData = [
            'MaKhachHang' => $currentUser['id'],        // ID khách hàng
            'MaTour' => $data['tourId'],                // ID tour
            'MaVoucher' => $voucherId,                  // ID voucher (có thể null)
            'SoLuongNguoi' => $data['quantity'],        // Số lượng người
            'TongTien' => $originalPrice,               // Tổng tiền gốc
            'GiamGia' => $discount,                     // Số tiền giảm giá
            'SoTienThanhToan' => $finalPrice,           // Số tiền cuối cùng
            'PhuongThucThanhToan' => $data['paymentMethod'], // Phương thức thanh toán
            'TrangThai' => 'Chờ duyệt',                 // Trạng thái ban đầu
            'GhiChu' => 'Ngày đặt: ' . $data['datetime'] // Ghi chú
        ];

        // Lưu đơn hàng vào database
        $orderId = $this->saveOrder($orderData);

        if ($orderId) {
            // Giảm số lượng voucher nếu sử dụng
            if ($voucherId) {
                $this->voucherModel->decreaseQuantity($voucherId);
            }

            // Nếu chọn VNPAY thì chuyển hướng sang confirm_vnpay
            if ($data['paymentMethod'] === 'vnpay') {
                $_SESSION['vnpay_amount'] = $finalPrice;
                $_SESSION['vnpay_order_id'] = $orderId;
                header('Location: index1.php?controller=payment&action=confirm_vnpay');
                exit;
            }

            // Nếu chọn MOMO thì chuyển hướng sang confirm_momo
            if ($data['paymentMethod'] === 'momo') {
                $_SESSION['momo_amount'] = $finalPrice;
                $_SESSION['momo_order_id'] = $orderId;
                header('Location: index1.php?controller=payment&action=confirm_momo');
                exit;
            }

            // Thêm flash message thành công
            FlashMessage::set('success', 'Đặt tour thành công! Mã đơn hàng: #' . $orderId . '. Chúng tôi sẽ liên hệ sớm nhất để xác nhận.');
            // Chuyển về trang chủ thay vì trang success
            header('Location: index1.php?controller=home');
            exit;
        } else {
            // Nếu lưu thất bại, lưu lỗi và quay lại form
            $_SESSION['payment_errors'] = ['Có lỗi xảy ra khi xử lý thanh toán'];
            header('Location: index1.php?controller=payment&action=index&tour_id=' . $data['tourId']);
            exit;
        }
    }

    // Hiển thị trang thành công (không còn sử dụng, redirect về home với flash message)
    public function success() {
        // Redirect về trang chủ vì đã có flash message
        header('Location: index1.php?controller=home');
        exit;
    }

    // CHÚ Ý: Validation dữ liệu thanh toán - kiểm tra tất cả thông tin đầu vào
    private function validatePaymentData($data) {
        $errors = [];

        // Validate họ tên - phải có ít nhất 2 ký tự
        if (empty($data['fullName']) || strlen($data['fullName']) < 2) {
            $errors[] = 'Họ tên phải có ít nhất 2 ký tự';
        }

        // Validate số điện thoại - phải có 10-11 số
        if (empty($data['phone']) || !preg_match('/^[0-9]{10,11}$/', $data['phone'])) {
            $errors[] = 'Số điện thoại không hợp lệ';
        }

        // Validate email - phải đúng format email
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email không hợp lệ';
        }

        // Validate ngày giờ - phải lớn hơn hiện tại
        if (empty($data['datetime'])) {
            $errors[] = 'Vui lòng chọn ngày và thời gian';
        } else {
            $selectedDate = new DateTime($data['datetime']);
            $now = new DateTime();
            if ($selectedDate <= $now) {
                $errors[] = 'Ngày giờ phải lớn hơn hiện tại';
            }
        }

        // Validate phương thức thanh toán - phải chọn
        if (empty($data['paymentMethod'])) {
            $errors[] = 'Vui lòng chọn phương thức thanh toán';
        }

        // Validate tour ID - phải có
        if (empty($data['tourId'])) {
            $errors[] = 'Thông tin tour không hợp lệ';
        }

        return $errors;
    }

    // Cập nhật thông tin khách hàng trong database
    private function updateCustomerInfo($customerId, $data) {
        // Gọi model để cập nhật thông tin khách hàng
        $this->customerModel->updateCustomer([
            'MaKhachHang' => $customerId,
            'HoTen' => $data['fullName'],
            'SoDienThoai' => $data['phone'],
            'Email' => $data['email']
        ]);
    }

    // CHÚ Ý: Lưu đơn hàng vào database - method quan trọng
    private function saveOrder($orderData) {
        // Câu lệnh SQL INSERT với tất cả thông tin đơn hàng
        $sql = "INSERT INTO dattour (MaKhachHang, MaTour, MaVoucher, SoLuongNguoi, TongTien, GiamGia, SoTienThanhToan, PhuongThucThanhToan, TrangThai, GhiChu, NgayDat) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        
        // Lấy instance database và thực thi câu lệnh INSERT
        $db = Database::getInstance();
        $result = $db->execute($sql, [
            $orderData['MaKhachHang'],        // ID khách hàng
            $orderData['MaTour'],             // ID tour
            $orderData['MaVoucher'],          // ID voucher
            $orderData['SoLuongNguoi'],       // Số lượng người
            $orderData['TongTien'],           // Tổng tiền gốc
            $orderData['GiamGia'],            // Số tiền giảm giá
            $orderData['SoTienThanhToan'],    // Số tiền cuối cùng
            $orderData['PhuongThucThanhToan'], // Phương thức thanh toán
            $orderData['TrangThai'],          // Trạng thái
            $orderData['GhiChu']              // Ghi chú
        ]);

        // Nếu thêm thành công, trả về ID đơn hàng vừa tạo
        if ($result) {
            return $db->getConn()->lastInsertId();
        }
        
        // Nếu thất bại, trả về false
        return false;
    }
    public function vnpay_post()
    {
        // VNPAY trả về qua GET
        $vnp_ResponseCode = $_GET['vnp_ResponseCode'] ?? '';
        $orderId = $_GET['vnp_TxnRef'] ?? '';
        $amount = isset($_GET['vnp_Amount']) ? ($_GET['vnp_Amount'] / 100) : 0;

        if ($vnp_ResponseCode == '00') {
            // Cập nhật trạng thái thanh toán trong database
            $this->updatePaymentStatus($orderId, 'Đã thanh toán', $amount);
            // Gửi mail xác nhận cho khách hàng
            $order = $this->getOrderById($orderId); // Bạn cần viết hàm này để lấy thông tin đơn hàng
            if ($order && !empty($order['Email'])) {
                sendMail($order['Email'], $order);
            }
            // Hiển thị thông báo thành công
            FlashMessage::set('success', 'Thanh toán thành công! Mã đơn hàng: #' . $orderId);
        } else {
            // Hiển thị thông báo lỗi nếu thanh toán không thành công
            FlashMessage::set('error', 'Thanh toán thất bại hoặc bị hủy.');
        }

        // Chuyển hướng về trang chủ hoặc trang thanh toán
        header('Location: index1.php?controller=home');
        exit;
    }
    public function confirm_vnpay()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        

        
        // Lấy số tiền và mã đơn hàng từ session
        $tongtien = $_SESSION['vnpay_amount'] ?? 0;
        $orderId = $_SESSION['vnpay_order_id'] ?? '';
        unset($_SESSION['vnpay_amount'], $_SESSION['vnpay_order_id']);

        $vnp_TmnCode = "F0OOJJAJ";
        $vnp_HashSecret = "28GU8D5IHGZ9MB92J32V6IVYK3PYGQQR";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = BASE_URL . "index1.php?controller=payment&action=vnpay_post";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        // Sử dụng orderId làm mã giao dịch để đối soát về sau
        $vnp_TxnRef = $orderId ?: (time() . "");
        $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
        $vnp_OrderType = 'billpayment';

        $vnp_Amount = $tongtien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $expire;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        if ($tongtien > 0) {
            header('Location: ' . $vnp_Url);
            exit();
        } else {
            echo "Không có số tiền thanh toán hợp lệ!";
            exit();
        }
    }
    private function updatePaymentStatus($orderId, $status, $amount)
{
    // Đảm bảo orderId là số nguyên
    $orderId = (int)$orderId;
    

    
    
    // Cập nhật trạng thái và số tiền thanh toán cho đơn hàng
    $sql = "UPDATE dattour SET TrangThai = ?, SoTienThanhToan = ? WHERE MaDon = ?";
    $db = Database::getInstance();
    $db->execute($sql, [$status, $amount, $orderId]);
}
public function momo_post()
    {

        
        // Kiểm tra resultCode từ MoMo
        $resultCode = $_GET['resultCode'] ?? '';
        $momoOrderId = $_GET['orderId'] ?? '';
        $amount = $_GET['amount'] ?? 0;
        
        // Lấy orderId gốc từ momoOrderId
        $originalOrderId = '';
        if (!empty($momoOrderId)) {
            if (strpos($momoOrderId, '_') !== false) {
                $orderIdParts = explode('_', $momoOrderId);
                $originalOrderId = $orderIdParts[0];
            } else {
                $originalOrderId = $momoOrderId;
            }
        }
        

        
        if ($resultCode == '0') {
            // Thanh toán thành công
            if ($originalOrderId) {
                // Cập nhật trạng thái đơn hàng
                $this->updatePaymentStatus($originalOrderId, 'Đã thanh toán', $amount);
                
                // Gửi mail xác nhận cho khách hàng
                $order = $this->getOrderById($originalOrderId);
                if ($order && !empty($order['Email'])) {
                    sendMail($order['Email'], $order);
                }
                
                // Hiển thị thông báo thành công
                FlashMessage::set('success', 'Thanh toán MoMo thành công! Mã đơn hàng: #' . $originalOrderId);
            }
            
            // Redirect về trang chủ với thông báo thành công
            header('Location: index1.php?controller=home');
            exit;
        } else {
            // Thanh toán thất bại
            FlashMessage::set('error', 'Thanh toán MoMo thất bại! Vui lòng thử lại.');
            header('Location: index1.php?controller=home');
            exit;
        }
    }
     public function momo_ipn()
    {
        // Xử lý IPN từ MoMo
        $inputData = file_get_contents('php://input');
        $jsonData = json_decode($inputData, true);
        
        if ($jsonData) {
            $resultCode = $jsonData['resultCode'] ?? '';
            $orderId = $jsonData['orderId'] ?? '';
            $amount = $jsonData['amount'] ?? 0;
            
            // Lấy orderId gốc từ orderId MoMo
            $originalOrderId = '';
            if (strpos($orderId, '_') !== false) {
                $orderIdParts = explode('_', $orderId);
                $originalOrderId = $orderIdParts[0];
            }
            
            if ($resultCode == '0' && $originalOrderId) {
                // Cập nhật trạng thái đơn hàng
                $this->updatePaymentStatus($originalOrderId, 'Đã thanh toán', $amount);
            }
        }
        
        // Trả về response cho MoMo
        http_response_code(200);
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function storeMomoInfo($customer_id, $momo_status, $link_data)
    {
        // Prepare the SQL query to insert the Momo information
        $query = "
        INSERT INTO momos (customer_id, momo_status, link_data)
        VALUES (:customer_id, :momo_status, :link_data)
    ";

        // Prepare the statement
        $stmt = $this->db->prepare($query);

        // Bind the parameters to the query
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
        $stmt->bindParam(':momo_status', $momo_status, PDO::PARAM_INT);
        $stmt->bindParam(':link_data', $link_data, PDO::PARAM_STR);

        // Execute the query and return the result (true on success, false on failure)
        return $stmt->execute();
    }

    public function confirm_momo()
    {
        $amount = $_SESSION['momo_amount'] ?? 0;
        $orderId = $_SESSION['momo_order_id'] ?? '';
        unset($_SESSION['momo_amount'], $_SESSION['momo_order_id']);



        if ($amount > 0 && $orderId) {
            // Endpoint MoMo test
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            // Tạo orderId duy nhất cho MoMo
            $momoOrderId = $orderId . '_' . time();

            // Thông tin MoMo test (sử dụng thông tin test chuẩn)
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán tour Go-Chill";
            $redirectUrl = BASE_URL . "index1.php?controller=payment&action=momo_post";
            $ipnUrl = BASE_URL . "index1.php?controller=payment&action=momo_ipn";
            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM"; // Thử lại payWithATM
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $momoOrderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;

            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Go-Chill Travel",
                "storeId" => "GoChillStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $momoOrderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            if (isset($jsonResult['payUrl'])) {
                header('Location: ' . $jsonResult['payUrl']);
                exit;
            } else {
                // Hiển thị lỗi MoMo trả về
                echo "<h3>Thanh toán MoMo thất bại!</h3>";
                if (isset($jsonResult['message'])) {
                    echo "<p>Lý do: " . htmlspecialchars($jsonResult['message']) . "</p>";
                } else {
                    echo "<pre>" . htmlspecialchars($result) . "</pre>";
                }
                exit;
            }
        } else {
            echo "Không có số tiền thanh toán hợp lệ!";
            exit;
        }
    }
    private function getOrderById($orderId)
{
    // Đảm bảo orderId là số nguyên
    $orderId = (int)$orderId;
    
    $db = Database::getInstance();
    $sql = "SELECT d.*, k.Email, k.HoTen FROM dattour d JOIN khachhang k ON d.MaKhachHang = k.MaKhachHang WHERE d.MaDon = ?";
    $result = $db->getOne($sql, [$orderId]);
    return $result ?: null;
}
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($emailTo, $order = [])
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Disable debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'chipheongunhubo@gmail.com';                     //SMTP username
        $mail->Password   = 'fxnd mooq xdyw xusu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('chipheongunhubo@gmail.com', 'Go&Chill');
        $mail->addAddress($emailTo);     //Add a recipient


        //Content
        $mail->CharSet = 'UTF-8'; // Set character encoding to UTF-8
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Xác nhận thanh toán đơn hàng';

        // Tạo nội dung thông tin đơn hàng
        $body = '<h2>Thông tin đơn hàng</h2>';
        $body .= '<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">';
        $body .= '<tr><td><strong>Mã đơn hàng</strong></td><td>' . htmlspecialchars($order['MaDon'] ?? '') . '</td></tr>';
        $body .= '<tr><td><strong>Khách hàng</strong></td><td>' . htmlspecialchars($order['HoTen'] ?? '') . '</td></tr>';
        $body .= '<tr><td><strong>Email</strong></td><td>' . htmlspecialchars($order['Email'] ?? '') . '</td></tr>';
        $body .= '<tr><td><strong>Số lượng người</strong></td><td>' . htmlspecialchars($order['SoLuongNguoi'] ?? '') . '</td></tr>';
        $body .= '<tr><td><strong>Tổng tiền</strong></td><td>' . number_format($order['TongTien'] ?? 0) . ' VND</td></tr>';
        $body .= '<tr><td><strong>Giảm giá</strong></td><td>' . number_format($order['GiamGia'] ?? 0) . ' VND</td></tr>';
        $body .= '<tr><td><strong>Thanh toán</strong></td><td>' . number_format($order['SoTienThanhToan'] ?? 0) . ' VND</td></tr>';
        $body .= '<tr><td><strong>Phương thức</strong></td><td>' . htmlspecialchars($order['PhuongThucThanhToan'] ?? '') . '</td></tr>';
        $body .= '<tr><td><strong>Ngày đặt</strong></td><td>' . htmlspecialchars($order['NgayDat'] ?? '') . '</td></tr>';
        $body .= '</table>';
        $body .= '<p>Cảm ơn bạn đã tin dùng dịch vụ tại Go&Chill!</p>';
        $body .= '<p>Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin.</p>';
        $body .= '<p>Trân trọng,<br>Đội ngũ Go&Chill</p>';

        $mail->Body = $body;

        $mail->SMTPOptions = array(
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        );
        return $mail->send();
    } catch (Exception $e) {
        echo "Gửi thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    
    //execute post
    $result = curl_exec($ch);
    

    if (curl_errno($ch)) {
        // Handle curl error silently or add proper error handling
    }
    
    //close connection
    curl_close($ch);
    return $result;
}
?>

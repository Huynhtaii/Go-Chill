<?php
include_once './models/Contact.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    // Hàm show trang liên hệ ra cho người dùng
    public function index() {
        // Truyền dữ liệu sang view
        include './views/Site/contact.php';
    }
    
    // Xử lý form liên hệ từ frontend
    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'HoTen' => $_POST['fullName'] ?? '',
                'SoDienThoai' => $_POST['phone'] ?? '',
                'GhiChu' => $_POST['message'] ?? '',
                'TrangThai' => 1, // 1 = chưa xử lý
                'NgayTao' => date('Y-m-d')
            ];
            
            // Validate dữ liệu
            if (empty($data['HoTen']) || empty($data['SoDienThoai'])) {
                $_SESSION['contact_error'] = 'Vui lòng điền đầy đủ thông tin bắt buộc!';
                header('Location: index1.php?controller=contact&action=index#contactForm');
                exit;
            }
            
            // Lưu vào database thông qua Model
            $result = $this->contactModel->addContact($data);
            
            if ($result) {
                $_SESSION['contact_success'] = 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.';
            } else {
                $_SESSION['contact_error'] = 'Có lỗi xảy ra, vui lòng thử lại sau!';
            }
            
            header('Location: index1.php?controller=contact&action=index#contactForm');
            exit;
        }
        
        // Nếu không phải POST, chuyển về trang liên hệ
        header('Location: index1.php?controller=contact&action=index');
        exit;
    }

}

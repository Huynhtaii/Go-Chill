<?php
require_once './models/Tour.php';
require_once './models/Customer.php';
require_once './models/Contact.php';

class DashboardController {
    private $tourModel;
    private $customerModel;
    private $contactModel;

    public function __construct() {
        $this->tourModel = new Tour();
        $this->customerModel = new Customer();
        $this->contactModel = new Contact();
    }

    public function index() {
        // 1. Thống kê tổng quan - phiên bản đơn giản
        $stats = $this->getGeneralStats();
        
        // 2. Biểu đồ & xu hướng - để trống tạm thời
        $charts = [
            'monthly_revenue_chart' => [],
            'popular_tours' => [],
            'popular_destinations' => [],
            'booking_by_category' => []
        ];
        
        // 3. Thông báo quan trọng - để trống tạm thời
        $notifications = [
            'new_orders' => [],
            'upcoming_tours' => [],
            'contacts_need_response' => [],
            'tours_need_update' => []
        ];
        
        // 4. Lịch trình sắp tới - để trống tạm thời
        $schedule = [
            'tours_this_week' => [],
            'payments_due' => [],
            'orders_deadline' => []
        ];

        include './views/Admin/Dashboard/index.php';
    }

    private function getGeneralStats() {
        try {
            // Chỉ lấy những thống kê cơ bản nhất
            $totalTours = $this->getTotalToursSimple();
            $totalCustomers = $this->getTotalCustomersSimple();
            $totalContacts = $this->getTotalContactsSimple();
            
            return [
                'total_tours' => $totalTours,
                'monthly_bookings' => 0, // Tạm thời để 0
                'monthly_revenue' => 0, // Tạm thời để 0
                'new_customers' => $totalCustomers,
                'unprocessed_contacts' => $totalContacts
            ];
        } catch (Exception $e) {
            // Trả về dữ liệu mặc định nếu có lỗi
            return [
                'total_tours' => 0,
                'monthly_bookings' => 0,
                'monthly_revenue' => 0,
                'new_customers' => 0,
                'unprocessed_contacts' => 0
            ];
        }
    }

    private function getTotalToursSimple() {
        try {
            $tours = $this->tourModel->getAll();
            return count($tours);
        } catch (Exception $e) {
            return 0;
        }
    }

    private function getTotalCustomersSimple() {
        try {
            // Sử dụng countAll() thay vì getAll() để tối ưu hiệu suất
            return $this->customerModel->countAll();
        } catch (Exception $e) {
            return 0;
        }
    }

    private function getTotalContactsSimple() {
        try {
            $contacts = $this->contactModel->getAllContacts();
            $unprocessed = 0;
            foreach ($contacts as $contact) {
                if (($contact['TrangThai'] ?? 0) == 1) {
                    $unprocessed++;
                }
            }
            return $unprocessed;
        } catch (Exception $e) {
            return 0;
        }
    }
}
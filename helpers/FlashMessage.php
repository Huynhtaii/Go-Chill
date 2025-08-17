<?php
/**
 * Flash Message Helper
 * Quản lý thông báo tạm thời giữa các request
 */
class FlashMessage {
    
    /**
     * Set flash message
     * @param string $type success|error|warning|info
     * @param string $message Nội dung thông báo
     */
    public static function set($type, $message) {
        $_SESSION['flash_message'] = [
            'type' => $type,
            'message' => $message
        ];
    }
    
    /**
     * Get flash message và xóa khỏi session
     * @return array|null
     */
    public static function get() {
        if (isset($_SESSION['flash_message'])) {
            $message = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
            return $message;
        }
        return null;
    }
    
    /**
     * Hiển thị flash message nếu có
     * @return string HTML của message
     */
    public static function display() {
        $flash = self::get();
        if (!$flash) return '';
        
        $type = $flash['type'];
        $message = $flash['message'];
        
        $class = 'alert';
        switch ($type) {
            case 'success':
                $class .= ' alert-success';
                $icon = 'fa-check-circle';
                break;
            case 'error':
                $class .= ' alert-danger';
                $icon = 'fa-exclamation-circle';
                break;
            case 'warning':
                $class .= ' alert-warning';
                $icon = 'fa-exclamation-triangle';
                break;
            case 'info':
                $class .= ' alert-info';
                $icon = 'fa-info-circle';
                break;
            default:
                $class .= ' alert-info';
                $icon = 'fa-info-circle';
        }
        
        return "
        <div class='{$class}'>
            <i class='fa {$icon}' style='margin-right: 10px;'></i>
            {$message}
        </div>";
    }
}
?>

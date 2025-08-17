<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - GO & CHILL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <style>
        /* ...existing code from index_fixed.html... */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; transition: background-color 0.3s ease; }
        body.dark-mode { background-color: #1a1a1a; color: white; }
        .header { background-color: white; padding: 10px 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease; }
        body.dark-mode .header { background-color: #2d2d2d; box-shadow: 0 2px 4px rgba(255, 255, 255, 0.1); }
        .header-container { max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: center; gap: 80px; }
        .logo { display: flex; align-items: center; gap: 10px; }
        .logo img { width: 120px; height: auto; }
        .search-wrapper { display: flex; align-items: center; gap: 10px; justify-content: center; }
        .search-container { max-width: 400px; position: relative; width: 400px; }
        .search-box { width: 100%; padding: 12px 45px 12px 15px; border: 1px solid #e5e7eb; border-radius: 25px; font-size: 14px; outline: none; transition: border-color 0.3s ease, background-color 0.3s ease; }
        body.dark-mode .search-box { background-color: #3d3d3d; border-color: #555; color: white; }
        .search-container span { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #6b7280; cursor: pointer; }
        body.dark-mode .search-container span { color: #9ca3af; }
        .search-btn { background-color: #000; color: white; padding: 10px 20px; border: none; border-radius: 20px; cursor: pointer; font-size: 14px; transition: background-color 0.3s; white-space: nowrap; }
        .search-btn:hover { background-color: #333; }
        body.dark-mode .search-btn { background-color: #0891b2; }
        body.dark-mode .search-btn:hover { background-color: #0e7490; }
        .header-actions { display: flex; align-items: center; gap: 15px; }
        .dark-mode-toggle { width: 60px; height: 30px; background: linear-gradient(135deg, #fff, #DDDDDD); border-radius: 15px; position: relative; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 19px rgba(0, 0, 0, 0.2); }
        .dark-mode-toggle.dark { background: linear-gradient(135deg, #1e293b, #334155); box-shadow: 0 2px 19px rgba(204, 203, 203, 0.5); }
        .toggle-slider { position: absolute; top: 3px; left: 3px; width: 24px; height: 24px; background: #079CCC; border-radius: 50%; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(234, 234, 234, 0.2); display: flex; align-items: center; justify-content: center; }
        .dark-mode-toggle.dark .toggle-slider { transform: translateX(30px); }
        .toggle-icon { font-size: 12px; color: #fff; transition: all 0.3s ease; }
        .dark-mode-toggle.dark .toggle-icon { color: #fff; }
        .language-selector { display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 8px 12px; border-radius: 8px; transition: background-color 0.3s; }
        .language-selector:hover { background-color: #f3f4f6; }
        body.dark-mode .language-selector { color: white; }
        body.dark-mode .language-selector:hover { background-color: #4a4a4a; }
        .acount-icon { display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background-color: #f3f4f6; border-radius: 50%; cursor: pointer; transition: background-color 0.3s; }
        .acount-icon:hover { background-color: #e5e7eb; }
        body.dark-mode .acount-icon { background-color: #4a4a4a; color: white; }
        body.dark-mode .acount-icon:hover { background-color: #555; }
        .nav-menu { background-color: white; padding: 15px 20px; border-top: 1px solid #e5e7eb; transition: background-color 0.3s ease; }
        body.dark-mode .nav-menu { background-color: #2d2d2d; border-top-color: #555; }
        .nav-container { max-width: 1200px; margin: 0 auto; display: flex; justify-content: center; align-items: center; }
        .nav-links { display: flex; gap: 30px; }
        .nav-link { color: #374151; text-decoration: none; font-weight: 500; font-size: 14px; position: relative; padding: 8px 0; transition: color 0.3s; }
        .nav-link:hover { color: #0891b2; }
        body.dark-mode .nav-link { color: #d1d5db; }
        body.dark-mode .nav-link:hover { color: #22d3ee; }
        .nav-link.dropdown::after { content: '▼'; font-size: 10px; margin-left: 5px; }
        .breadcrumb { padding: 20px 0; margin-bottom: 30px; }
        .breadcrumb-item { color: #666; font-size: 14px; }
        .breadcrumb-item.current { color: #079CCC; font-weight: 600; }
        .breadcrumb-separator { margin: 0 8px; color: #999; }
        .main-content { max-width: 800px; margin: 40px auto; background-color: white; padding: 40px 35px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .form-title { text-align: center; font-size: 32px; font-weight: 700; margin-bottom: 15px; color: #2c3e50; text-shadow: 2px 2px 6px rgba(0,0,0,0.1); letter-spacing: 1px; }
        .form-subtitle { text-align: center; color: #666; margin-bottom: 30px; line-height: 1.5; font-size: 13px; }
        .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 40px; }
        .company-info { background: #f8f9fa; padding: 30px; border-radius: 8px; border-left: 4px solid #4a90e2; }
        .company-title { font-size: 18px; font-weight: 600; color: #333; margin-bottom: 20px; }
        .company-details { list-style: none; }
        .company-details li { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 12px; font-size: 13px; line-height: 1.5; color: #555; }
        .company-details i { color: #4a90e2; font-size: 14px; margin-top: 2px; min-width: 14px; }
        .contact-form { background: #f8f9fa; padding: 30px; border-radius: 8px; border-left: 4px solid #079ccc; }
        .contact-form form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #333;
            font-size: 15px;
        }

        .contact-form form input[type="text"],
        .contact-form form input[type="tel"],
        .contact-form form textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 15px;
            background-color: #fff;
            color: #222;
            font-family: 'Poppins', Arial, sans-serif;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .contact-form form input[type="text"]:focus,
        .contact-form form input[type="tel"]:focus,
        .contact-form form textarea:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .contact-form form textarea {
            resize: vertical;
            min-height: 100px;
        }

        .contact-form .submit-btn {
            width: 100%;
            background-color: #4a90e2;
            color: white;
            padding: 14px 0;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background-color 0.3s;
            letter-spacing: 0.5px;
        }

        .contact-form .submit-btn:hover {
            background-color: #357abd;
        }

        .contact-form .required {
            color: #e74c3c;
            font-weight: bold;
        }

        /* Responsive for mobile */
        @media (max-width: 600px) {
            .contact-form {
                padding: 18px 8px;
            }
            .contact-form form input,
            .contact-form form textarea {
                font-size: 14px;
                padding: 10px 10px;
            }
            .contact-form .submit-btn {
                font-size: 15px;
                padding: 12px 0;
            }
        }

        .maps-section {
            margin-top: 40px;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .maps-title {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #222;
        }
        .maps-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        .map-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.13);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .map-header {
            background: #3498db;
            color: #fff;
            padding: 18px 10px 10px 10px;
            text-align: center;
        }
        .map-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }
        .map-address {
            font-size: 14px;
            opacity: 0.95;
            margin-bottom: 2px;
        }
        .map-iframe {
            width: 100%;
            height: 250px;
            border: none;
            display: block;
        }
        /* Responsive */
        @media (max-width: 900px) {
            .maps-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            .maps-section {
                padding: 18px 2vw;
            }
        }

        body.dark-mode .main-content,
        body.dark-mode .contact-form,
        body.dark-mode .company-info,
        body.dark-mode .maps-section,
        body.dark-mode .map-card {
            background-color: #23272f !important;
            color: #f3f4f6 !important;
        }

        body.dark-mode .company-title,
        body.dark-mode .form-title,
        body.dark-mode .maps-title,
        body.dark-mode .map-title {
            color: #22d3ee !important;
        }

        body.dark-mode .company-details li,
        body.dark-mode .form-subtitle,
        body.dark-mode .map-address {
            color: #bfc9d1 !important;
        }

        body.dark-mode .contact-form form input,
        body.dark-mode .contact-form form textarea {
            background-color: #181b20 !important;
            color: #f3f4f6 !important;
            border-color: #444 !important;
        }

        body.dark-mode .contact-form form input:focus,
        body.dark-mode .contact-form form textarea:focus {
            border-color: #22d3ee !important;
        }

        body.dark-mode .contact-form .submit-btn {
            background-color: #22d3ee !important;
            color: #181b20 !important;
        }

        body.dark-mode .contact-form .submit-btn:hover {
            background-color: #0891b2 !important;
            color: #fff !important;
        }

        body.dark-mode .map-header {
            background: #0891b2 !important;
            color: #fff !important;
        }
        body.dark-mode .contact-form form label {
    color: #bfc9d1 !important;
}
        /* ...footer and responsive CSS... */
        /* ...existing code from index_fixed.html... */
    </style>
</head>
<body>

    <main>
        <div class="container">
            <nav class="breadcrumb">
                <span class="breadcrumb-item">Trang chủ</span>
                <span class="breadcrumb-separator">/</span>
                <span class="breadcrumb-item current">Liên hệ</span>
            </nav>
        </div>
    </main>
    <div class="main-content">
        <h1 class="form-title">Liên Hệ Với Chúng Tôi</h1>
        <p class="form-subtitle">
            Hãy liên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất cho chuyến du lịch của bạn.<br>
            Đội ngũ chuyên gia của GO & CHILL luôn sẵn sàng phục vụ quý khách 24/7.
        </p>
        <div class="contact-grid">
            <div class="company-info">
                <h2 class="company-title">CÔNG TY TNHH DU LỊCH VIỆT NAM</h2>
                <ul class="company-details">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span><strong>Trụ Sở:</strong> Lô 142 vận khí, La Khê, Hà Đông</span>
                    </li>
                    <li>
                        <i class="fas fa-building"></i>
                        <span><strong>HCM Nhánh 2:</strong> 212 Nguyễn Trãi, Thanh Xuân, Hà Nội</span>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span><strong>Đà Nẵng:</strong> 328 Điện Biên Phủ, Quận Thanh Khê</span>
                    </li>
                    <li>
                        <i class="fas fa-building"></i>
                        <span><strong>Hồ Chí Minh:</strong> 204 Phan Đình Phùng, Phường 2, Phú Nhuận</span>
                    </li>
                    <li>
                        <i class="fas fa-id-card"></i>
                        <span><strong>Giấy phép kinh doanh:</strong> 01-1082/2018/TCDL-GP LHQT</span>
                    </li>
                    <li>
                        <i class="fas fa-certificate"></i>
                        <span><strong>Số ĐKKD:</strong> 0106622865 - Mã số thuế: 0105622865</span>
                    </li>
                    <li>
                        <i class="fas fa-calendar-alt"></i>
                        <span><strong>Ngày ĐKKD:</strong> 09/11/2018 - Nơi cấp: Sở KHĐT TP Hà Nội</span>
                    </li>
                    <li>
                        <i class="fas fa-user-tie"></i>
                        <span><strong>Người đại diện:</strong> Huỳnh Minh Thái (Tổng Giám Đốc)</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span><strong>Hotline:</strong> 0903394744</span>
                    </li>
                </ul>
            </div>
            <div class="contact-form">
                <h3 class="company-title">YÊU CẦU GỬI LẠI</h3>
                <p style="font-size: 12px; margin-bottom: 20px;">
                    (Quý khách điền thông tin bên dưới, chuyên viên của GO&CHILL sẽ liên hệ ngay)
                </p>
                <?php
                // Hiển thị thông báo lỗi/thành công
                if (isset($_SESSION['contact_error'])) {
                    echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">';
                    echo '<strong>Lỗi:</strong> ' . htmlspecialchars($_SESSION['contact_error']);
                    echo '</div>';
                    unset($_SESSION['contact_error']);
                }
                
                if (isset($_SESSION['contact_success'])) {
                    echo '<div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">';
                    echo '<strong>Thành công:</strong> ' . htmlspecialchars($_SESSION['contact_success']);
                    echo '</div>';
                    unset($_SESSION['contact_success']);
                }
                ?>
                
                <form id="contactForm" method="POST" action="index1.php?controller=contact&action=submit">
                    <label for="fullName">HỌ VÀ TÊN: <span class="required">*</span></label>
                    <input type="text" id="fullName" name="fullName" required 
                           value="<?php echo htmlspecialchars($_POST['fullName'] ?? ''); ?>">

                    <label for="phone">SĐT: <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required 
                           value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">

                    <label for="message">Yêu cầu khác: (nếu có)</label>
                    <textarea id="message" name="message" rows="4" placeholder="Nhập yêu cầu của bạn..."><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>

                    <button type="submit" class="submit-btn" id="submitBtn">GỬI NGAY</button>
                </form>
            </div>
        </div>
        <!-- Maps Section -->
        <div class="maps-section">
            <h2 class="maps-title">Vị Trí Văn Phòng</h2>
            <div class="maps-grid">
                <div class="map-card">
                    <div class="map-header">
                        <h3 class="map-title">TRỤ SỞ TẠI HÀ NỘI</h3>
                        <p class="map-address">Lô 142 vận khí, La Khê, Hà Đông</p>
                    </div>
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.636655917!2d105.7751845!3d20.9817041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acec176b9bc5%3A0x91f04bb7b35dfd2e!2sLa%20Kh%C3%AA%2C%20H%C3%A0%20%C4%90%C3%B4ng%2C%20Hanoi%2C%20Vietnam!5e0!3m2!1sen!2s!4v1644399999999!5m2!1sen!2s"
                        class="map-iframe"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
                <div class="map-card">
                    <div class="map-header">
                        <h3 class="map-title">CHI NHÁNH HỒ CHÍ MINH</h3>
                        <p class="map-address">204 Phan Đình Phùng, Phường 2, Phú Nhuận</p>
                    </div>
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3171394141!2d106.6836885!3d10.7891076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529b0f8b06d0f%3A0x4f14c65a0b3b9b12!2s204%20Phan%20%C4%90%C3%ACnh%20Ph%C3%B9ng%2C%20Ph%C6%B0%E1%BB%9Dng%202%2C%20Ph%C3%BA%20Nhu%E1%BA%ADn%2C%20Th%C3%A0nh%20ph%E1%BB%91%20H%E1%BB%93%20Ch%C3%AD%20Minh%2C%20Vietnam!5e0!3m2!1sen!2s!4v1644399999999!5m2!1sen!2s"
                        class="map-iframe"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ...existing JS from index_fixed.html...
        document.addEventListener('DOMContentLoaded', function() {
            // ...form validation and dark mode toggle code...
        });
    </script>
</body>
</html>

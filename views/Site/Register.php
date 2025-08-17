<main>
        <div class="container">
                    <!-- Breadcrumb Navigation -->
        <nav class="breadcrumb">
            <a href="index1.php" class="breadcrumb-item">Trang chủ</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-item current">Đăng ký hội viên</span>
        </nav>

            <section class="registration-section">
                <div class="registration-header">
                    <h1>Đăng ký hội viên</h1>
                    <p>Bạn hãy điền đầy đủ thông tin dưới đây, chúng tôi sẽ liên hệ để xác nhận với bạn trong thời gian sớm nhất.</p>
                </div>
                
                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error_message']; ?>
                        <?php unset($_SESSION['error_message']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success_message']; ?>
                        <?php unset($_SESSION['success_message']); ?>
                    </div>
                <?php endif; ?>
                
                <form class="registration-form" id="registrationForm" method="post" action="index1.php?controller=register&action=index#">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Họ và tên <span class="required-asterisk">(*)</span></label>
                        <input type="text" id="fullName" name="fullName" class="form-input" placeholder="Nhập họ và tên" required>
                        <div class="error-message" id="fullNameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại <span class="required-asterisk">(*)</span></label>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="Nhập số điện thoại" required>
                        <div class="error-message" id="phoneError"></div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email <span class="required-asterisk">(*)</span></label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Nhập email" required>
                        <div class="error-message" id="emailError"></div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu <span class="required-asterisk">(*)</span></label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Nhập mật khẩu" required>
                        <div class="error-message" id="passwordError"></div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu <span class="required-asterisk">(*)</span></label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-input" placeholder="Nhập lại mật khẩu" required>
                        <div class="error-message" id="confirmPasswordError"></div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="province" class="form-label">Tỉnh / Thành</label>
                            <select id="province" name="province" class="form-input">
                                <option value="">Chọn tỉnh thành</option>
                                <option value="hanoi">Hà Nội</option>
                                <option value="hcm">Hồ Chí Minh</option>
                                <option value="danang">Đà Nẵng</option>
                                <option value="haiphong">Hải Phòng</option>
                                <option value="cantho">Cần Thơ</option>
                                <option value="quangninh">Quảng Ninh</option>
                                <option value="ninhbinh">Ninh Bình</option>
                                <option value="quangnam">Quảng Nam</option>
                                <option value="quangbinh">Quảng Bình</option>
                                <option value="quangtri">Quảng Trị</option>
                                <option value="thanhhoa">Thanh Hóa</option>
                                <option value="nghean">Nghệ An</option>
                                <option value="hue">Thừa Thiên Huế</option>
                                <option value="vungtau">Vũng Tàu</option>
                                <option value="dalat">Đà Lạt</option>
                                <option value="phuquoc">Phú Quốc</option>
                                <option value="binhduong">Bình Dương</option>
                                <option value="dongnai">Đồng Nai</option>
                                <option value="binhthuan">Bình Thuận</option>
                                <option value="kiengiang">Kiên Giang</option>
                                <option value="tiengiang">Tiền Giang</option>
                                <option value="longan">Long An</option>
                                <option value="angiang">An Giang</option>
                                <option value="dongthap">Đồng Tháp</option>
                                <option value="tayninh">Tây Ninh</option>
                                <option value="baoloc">Bảo Lộc</option>
                                <option value="binhphuoc">Bình Phước</option>
                                <option value="lamdong">Lâm Đồng</option>                               
                                <option value="other">Khác</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district" class="form-label">Quận / Huyện</label>
                            <select id="district" name="district" class="form-input">
                                <option value="">Chọn quận huyện</option>
                                <option value="district1">Quận 1</option>
                                <option value="district2">Quận 2</option>
                                <option value="district3">Quận 3</option>
                                <option value="district4">Quận 4</option>
                                <option value="district5">Quận 5</option>
                                <option value="district6">Quận 6</option>
                                <option value="district7">Quận 7</option>
                                <option value="district8">Quận 8</option>
                                <option value="district9">Quận 9</option>
                                <option value="district10">Quận 10</option>
                                <option value="district11">Quận 11</option>
                                <option value="district12">Quận 12</option>
                                <option value="district13">Tân Phú</option>
                                <option value="district14">Tân Bình</option>
                                <option value="district15">Bình Thạnh</option>
                                <option value="district16">Gò Vấp</option>
                                <option value="district17">Phú Nhuận</option>
                                <option value="district18">Bình Tân</option>
                                <option value="district19">Thủ Đức</option>
                                <option value="district20">Bình Chánh</option>
                                <option value="district21">Nhà Bè</option>
                                <option value="district22">Cần Giờ</option>
                                <option value="district23">Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" class="checkbox-input" required>
                        <label for="terms" class="checkbox-label">
                            Tôi đồng ý với <a href="#" target="_blank">điều khoản sử dụng</a> <span class="required-asterisk">*</span>
                        </label>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn" style="background: linear-gradient(135deg, #e6f8ff 0%, #b8e8ff 100%) !important; background-color: #e6f8ff !important; color: #333333 !important;">Đăng ký</button>
                </form>
            </section>
        </div>
</main>

<script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            let isValid = true;
            const errors = {};
            
            // Reset error messages
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            document.querySelectorAll('.form-input').forEach(el => el.classList.remove('error'));
            
            // Validate full name
            const fullName = document.getElementById('fullName').value.trim();
            if (!fullName) {
                errors.fullName = 'Họ tên không được để trống';
                isValid = false;
            }
            
            // Validate phone
            const phone = document.getElementById('phone').value.trim();
            if (!phone) {
                errors.phone = 'Số điện thoại không được để trống';
                isValid = false;
            } else if (!/^[0-9]{10,11}$/.test(phone)) {
                errors.phone = 'Số điện thoại không hợp lệ';
                isValid = false;
            }
            
            // Validate email
            const email = document.getElementById('email').value.trim();
            if (!email) {
                errors.email = 'Email không được để trống';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                errors.email = 'Email không hợp lệ';
                isValid = false;
            }
            
            // Validate password
            const password = document.getElementById('password').value;
            if (!password) {
                errors.password = 'Mật khẩu không được để trống';
                isValid = false;
            } else if (password.length < 6) {
                errors.password = 'Mật khẩu phải có ít nhất 6 ký tự';
                isValid = false;
            }
            
            // Validate confirm password
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (!confirmPassword) {
                errors.confirmPassword = 'Xác nhận mật khẩu không được để trống';
                isValid = false;
            } else if (password !== confirmPassword) {
                errors.confirmPassword = 'Mật khẩu xác nhận không khớp';
                isValid = false;
            }
            
            // Display errors
            Object.keys(errors).forEach(field => {
                const errorElement = document.getElementById(field + 'Error');
                const inputElement = document.getElementById(field);
                if (errorElement && inputElement) {
                    errorElement.textContent = errors[field];
                    inputElement.classList.add('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
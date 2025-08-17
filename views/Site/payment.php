<?php
// Include header
include_once 'header.php';

// Lấy dữ liệu từ session nếu có lỗi
$errors = $_SESSION['payment_errors'] ?? [];
$formData = $_SESSION['payment_data'] ?? [];
unset($_SESSION['payment_errors'], $_SESSION['payment_data']);

// Tính toán giá tour
$originalPrice = $tour ? $tour['GiaTour'] : 0;
$salePrice = $tour ? ($tour['GiaTourSale'] ?: $tour['GiaTour']) : 0;
$finalPrice = $salePrice;

// Lấy thông tin user hiện tại
$currentUser = AuthController::getCurrentUser();
?>

<style>
    /* XÓA HOÀN TOÀN BÓNG MỜ FORM THANH TOÁN VÀ CÁC THẺ LIÊN QUAN */
    .payment-section,
    .payment-form-visual,
    .modern-card,
    .checkout-tour-card,
    .checkout-banner img,
    .payment-form-btn,
    .submit-btn,
    .map-container {
        box-shadow: none !important;
        filter: none !important;
    }
    
    body.dark-mode .payment-section,
    body.dark-mode .payment-form-visual,
    body.dark-mode .modern-card,
    body.dark-mode .checkout-tour-card,
    body.dark-mode .checkout-banner img,
    body.dark-mode .payment-form-btn,
    body.dark-mode .submit-btn,
    body.dark-mode .map-container {
        box-shadow: none !important;
        filter: none !important;
        background: #232323 !important;
    }

    .payment-form-visual {
        max-width: 420px;
        margin: 40px auto 0 auto;
        background: #fff;
        border-radius: 16px;
        padding: 32px 24px 24px 24px;
        font-family: 'Montserrat', Arial, sans-serif;
    }
    
    .payment-form-title {
        text-align: center;
        color: #1e4fae;
        margin-bottom: 24px;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    
    .payment-form-group {
        margin-bottom: 16px;
    }
    
    .payment-form-group label {
        display: block;
        color: #1e4fae;
        font-weight: 600;
        margin-bottom: 6px;
        font-size: 15px;
    }
    
    .payment-form-group label i {
        margin-right: 6px;
        color: #b2e0ff;
    }
    
    .payment-form-group input,
    .payment-form-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
        background: #f7fafd;
        outline: none;
        transition: border 0.2s;
    }
    
    .payment-form-group input:focus,
    .payment-form-group select:focus {
        border: 1.5px solid #1e4fae;
    }
    
    .error-message {
        color: #e74c3c;
        font-size: 12px;
        margin-top: 4px;
        display: none;
    }
    
    .payment-form-voucher {
        margin-bottom: 12px;
    }
    
    .voucher-item {
        display: flex;
        align-items: center;
        background: #f7fafd;
        border-radius: 8px;
        padding: 8px 12px;
        margin-bottom: 6px;
        font-size: 14px;
        color: #222;
    }
    
    .voucher-item i {
        color: #1e4fae;
        margin-right: 8px;
        font-size: 16px;
    }
    
    .voucher-discount {
        color: #1e4fae;
        margin-left: auto;
        font-weight: 600;
        border: none;
        background: transparent;
        outline: none;
    }
    
    .voucher-points {
        color: #1e4fae;
        margin-left: auto;
        font-weight: 600;
    }
    
    .payment-form-summary {
        background: #f7fafd;
        border-radius: 8px;
        padding: 12px 12px 4px 12px;
        margin-bottom: 16px;
        font-size: 14px;
    }
    
    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 6px;
    }
    
    .summary-row.total {
        font-weight: 700;
        color: #1e4fae;
    }
    
    .payment-form-note {
        font-size: 12px;
        color: #888;
        margin-bottom: 12px;
        text-align: left;
    }
    
    .payment-form-note a {
        color: #1e4fae;
        text-decoration: underline;
    }
    
    .payment-form-btn {
        width: 100%;
        background: #b2e0ff;
        color: #1e4fae;
        border: none;
        border-radius: 8px;
        padding: 12px 0;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    
    .payment-form-btn:hover {
        background: #1e4fae;
        color: #fff;
    }
    
    /* Breadcrumb */
    .breadcrumb {
        background: #f8f9fa;
        padding: 15px 0;
        margin-bottom: 30px;
    }
    
    .breadcrumb-item {
        color: #6c757d;
        text-decoration: none;
    }
    
    .breadcrumb-item.current {
        color: #1e4fae;
        font-weight: 600;
    }
    
    .breadcrumb-separator {
        margin: 0 10px;
        color: #6c757d;
    }
    
    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .checkout-grid {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 40px;
        margin-bottom: 40px;
    }
    
    /* Tour card */
    .checkout-tour-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    
    .checkout-tour-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .tour-info {
        padding: 20px;
    }
    
    .tour-title {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    
    .tour-rating {
        color: #f39c12;
        font-size: 14px;
        margin-bottom: 10px;
    }
    
    .tour-meta {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .tour-price {
        font-size: 18px;
        font-weight: 700;
        color: #e74c3c;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .checkout-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .payment-form-visual {
            margin: 20px auto 0 auto;
            padding: 20px 16px 16px 16px;
        }
    }
</style>

<!-- Banner trắng xanh -->
<div class="banner-main" style="margin: 10px auto 0 auto; max-width: 1900px;">
    <img src="public/img/img_white_and_blue_modern.png" alt="Go & Chill Banner" style="width:100%; border-radius:16px; display:block;">
</div>

<main>
    <!-- Breadcrumb Navigation -->
    <nav class="breadcrumb">
        <div class="container">
            <span class="breadcrumb-item">Trang chủ</span>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-item current">Thanh Toán</span>
        </div>
    </nav>

    <div class="container">
        <div class="checkout-grid">
            <!-- Left: Form -->
            <section class="payment-section">
                <div class="payment-form-visual">
                    <div class="payment-form-title">Thông Tin Thanh Toán</div>
                    <form id="paymentForm" method="POST" action="index1.php?controller=payment&action=checkout">
                        <input type="hidden" name="tourId" value="<?php echo $tour ? $tour['MaTour'] : ''; ?>">
                        <div class="payment-form-group">
                            <label><i class="fa-regular fa-user"></i> Họ và Tên</label>
                            <input type="text" name="fullName" id="fullName" placeholder="Họ và Tên" 
                                   value="<?php echo htmlspecialchars($formData['fullName'] ?? $currentUser['fullname']); ?>" required>
                            <div class="error-message" id="fullNameError"></div>
                        </div>
                        
                        <div class="payment-form-group">
                            <label><i class="fa-solid fa-phone"></i> SĐT</label>
                            <input type="text" name="phone" id="phone" placeholder="SĐT" 
                                    value="<?php echo htmlspecialchars($formData['phone'] ?? ($currentUser['phone'] ?? '')); ?>" required>
                            <div class="error-message" id="phoneError"></div>
                        </div>
                        
                        <div class="payment-form-group">
                            <label><i class="fa-regular fa-envelope"></i> Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" 
                                   value="<?php echo htmlspecialchars($formData['email'] ?? ($currentUser['email'] ?? '')); ?>" required>
                            <div class="error-message" id="emailError"></div>
                        </div>
                        
                        <div class="payment-form-group">
                            <label><i class="fa-regular fa-calendar"></i> Ngày và thời gian</label>
                            <input type="datetime-local" name="datetime" id="datetime" 
                                   value="<?php echo htmlspecialchars($formData['datetime'] ?? ''); ?>" required>
                            <div class="error-message" id="datetimeError"></div>
                        </div>
                        
                        <div class="payment-form-group">
                            <label><i class="fa-solid fa-users"></i> Số lượng người</label>
                            <input type="number" name="quantity" id="quantity" placeholder="Số lượng người" 
                                   value="<?php echo htmlspecialchars($formData['quantity'] ?? '1'); ?>" min="1" required>
                            <div class="error-message" id="quantityError"></div>
                        </div>
                        
                        <div class="payment-form-voucher">
                            <div class="voucher-item">
                                <i class="fa-solid fa-ticket"></i> Go&Chill Voucher
                                <select name="voucherCode" id="voucherSelect" class="voucher-discount">
                                    <option value="">Chọn mã giảm giá</option>
                                    <?php if (isset($vouchers) && !empty($vouchers)): ?>
                                        <?php foreach ($vouchers as $voucher): ?>
                                            <option value="<?php echo htmlspecialchars($voucher['MaVoucher']); ?>" 
                                                    data-discount="<?php echo $voucher['GiaTriGiamGia']; ?>"
                                                    data-type="<?php echo $voucher['LoaiGiamGia']; ?>">
                                                <?php echo htmlspecialchars($voucher['TenVoucher']); ?> 
                                                (<?php echo $voucher['LoaiGiamGia'] == 'phantram' ? $voucher['GiaTriGiamGia'] . '%' : number_format($voucher['GiaTriGiamGia']) . 'đ'; ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="voucher-item">
                                <i class="fa-solid fa-coins"></i> Số dư tích điểm 
                                <span class="voucher-points">0 điểm</span>
                            </div>
                        </div>
                        
                        <div class="payment-form-group">
                            <label><i class="fa-solid fa-credit-card"></i> Phương thức thanh toán</label>
                            <select name="paymentMethod" id="paymentMethod" required>
                                <option value="">Phương thức thanh toán</option>
                                <option value="zalopay" <?php echo ($formData['paymentMethod'] ?? '') == 'zalopay' ? 'selected' : ''; ?>>ZaloPay</option>
                                <option value="cash" <?php echo ($formData['paymentMethod'] ?? '') == 'cash' ? 'selected' : ''; ?>>Thanh toán tại văn phòng</option>
                                <option value="vnpay" <?php echo ($formData['paymentMethod'] ?? '') == 'vnpay' ? 'selected' : ''; ?>>VNPAY</option>
                                <option value="momo" <?php echo ($formData['paymentMethod'] ?? '') == 'momo' ? 'selected' : ''; ?>>MOMO</option>
                            </select>
                            <div class="error-message" id="paymentMethodError"></div>
                        </div>

                        <div id="momoFormWrapper" style="display:none; margin-bottom: 16px;">
                        </div>
                        
                        <div class="payment-form-summary">
                            <div class="summary-row">
                                <span>Giá trị hóa đơn</span>
                                <span id="orderValue"><?php echo number_format($originalPrice); ?>đ</span>
                            </div>
                            <div class="summary-row">
                                <span>Tổng cộng Voucher giảm giá</span>
                                <span id="voucherValue">0đ</span>
                            </div>
                            <div class="summary-row total">
                                <span>Giá thanh toán</span>
                                <span id="totalValue"><?php echo number_format($finalPrice); ?>đ</span>
                            </div>
                        </div>
                        
                        <div class="payment-form-note">
                            Nhà *Đặt tour đồng nghĩa với việc bạn đã đồng ý tuân theo 
                            <a href="#">Điều khoản GO&CHILL</a>
                        </div>
                        
                        <button type="submit" class="payment-form-btn">ĐẶT TOUR</button>
                    </form>
                </div>
            </section>
            
            <!-- Right: Tour Info & Banner -->
            <aside class="checkout-aside">
                <?php if ($tour): ?>
                    <div class="checkout-tour-card modern-card">
                        <img src="public/img/<?php echo htmlspecialchars($tour['HinhAnh']); ?>" alt="<?php echo htmlspecialchars($tour['TieuDe']); ?>">
                        <div class="tour-info modern-info">
                            <div class="tour-title">
                                <b><?php echo htmlspecialchars($tour['TieuDe']); ?></b>
                            </div>
                            <div class="tour-rating">
                                <span class="star">★</span> 
                                <?php echo $tour['DanhGia'] ?: '4.96'; ?> 
                                <span class="review-count">(672 reviews)</span>
                            </div>
                            <div class="tour-meta">
                                <span class="tour-location">
                                    <i class="fa-solid fa-location-dot"></i> 
                                    <?php echo htmlspecialchars($tour['DiemDen']); ?>
                                </span>
                            </div>
                            <div class="tour-price">
                                Giá tour: 
                                <span>
                                    <?php if ($tour['GiaTourSale'] && $tour['GiaTourSale'] < $tour['GiaTour']): ?>
                                        <span style="text-decoration: line-through; color: #999; font-size: 14px;">
                                            <?php echo number_format($tour['GiaTour']); ?>₫
                                        </span>
                                        <span style="color: #e74c3c;">
                                            <?php echo number_format($tour['GiaTourSale']); ?>₫
                                        </span>
                                    <?php else: ?>
                                        <?php echo number_format($tour['GiaTour']); ?>₫
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="checkout-banner">
                    <img src="public/img/Blue Ripped Paper Modern Travel Instagram Post.png" alt="Banner" style="width:100%;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                </div>
            </aside>
        </div>
    </div>
</main>

<script>
// Validate & dynamic voucher JS
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('paymentForm');
    const fullName = document.getElementById('fullName');
    const phone = document.getElementById('phone');
    const email = document.getElementById('email');
    const datetime = document.getElementById('datetime');
    const quantity = document.getElementById('quantity');
    const voucherSelect = document.getElementById('voucherSelect');
    const paymentMethod = document.getElementById('paymentMethod');
    const vnpayFormWrapper = document.getElementById('vnpayFormWrapper');
    const momoFormWrapper = document.getElementById('momoFormWrapper');
    const selectedAmountInput = document.getElementById('selectedAmountInput');
    
    // Lấy giá tour từ PHP
    const originalPrice = <?php echo $originalPrice; ?>;
    const orderValueSpan = document.getElementById('orderValue');
    const voucherValueSpan = document.getElementById('voucherValue');
    const totalValueSpan = document.getElementById('totalValue');

    function showError(input, message) {
        const error = document.getElementById(input.id + 'Error');
        if (error) {
            error.textContent = message;
            error.style.display = 'block';
        }
    }
    
    function hideError(input) {
        const error = document.getElementById(input.id + 'Error');
        if (error) error.style.display = 'none';
    }
    
    function validateName() {
        if (fullName.value.trim().length < 2) {
            showError(fullName, 'Họ tên phải có ít nhất 2 ký tự');
            return false;
        }
        hideError(fullName); 
        return true;
    }
    
    function validatePhone() {
        const phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone.value.replace(/\s/g, ''))) {
            showError(phone, 'Số điện thoại không hợp lệ');
            return false;
        }
        hideError(phone); 
        return true;
    }
    
    function validateEmail() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            showError(email, 'Email không hợp lệ');
            return false;
        }
        hideError(email); 
        return true;
    }
    
    function validateDatetime() {
        if (!datetime.value) {
            showError(datetime, 'Vui lòng chọn ngày và thời gian');
            return false;
        }
        const selected = new Date(datetime.value);
        const now = new Date();
        if (selected < now) {
            showError(datetime, 'Ngày giờ phải lớn hơn hiện tại');
            return false;
        }
        hideError(datetime); 
        return true;
    }
    
    function validateQuantity() {
        if (!quantity.value || quantity.value < 1) {
            showError(quantity, 'Số lượng phải lớn hơn 0');
            return false;
        }
        hideError(quantity); 
        return true;
    }
    
    function validatePaymentMethod() {
        if (!paymentMethod.value) {
            document.getElementById('paymentMethodError').textContent = 'Vui lòng chọn phương thức thanh toán';
            document.getElementById('paymentMethodError').style.display = 'block';
            return false;
        }
        document.getElementById('paymentMethodError').style.display = 'none';
        return true;
    }
    
    function updateVoucherAndTotal() {
        const currentQuantity = parseInt(quantity.value) || 1;
        const currentPrice = originalPrice * currentQuantity;
        let discount = 0;
        let voucherText = '0đ';
        let totalText = '';
        
        if (voucherSelect.value) {
            const selectedOption = voucherSelect.options[voucherSelect.selectedIndex];
            const discountValue = parseFloat(selectedOption.dataset.discount);
            const discountType = selectedOption.dataset.type;
            
            if (discountType === 'phantram') {
                discount = Math.round(currentPrice * (discountValue / 100));
            } else {
                discount = discountValue;
            }
            
            voucherText = '-' + discount.toLocaleString('vi-VN') + 'đ';
            totalText = (currentPrice - discount).toLocaleString('vi-VN') + 'đ';
        } else {
            totalText = currentPrice.toLocaleString('vi-VN') + 'đ';
        }
        
        orderValueSpan.textContent = currentPrice.toLocaleString('vi-VN') + 'đ';
        voucherValueSpan.textContent = voucherText;
        totalValueSpan.textContent = totalText;
    }
    
    // Hiện/ẩn form VNPAY và MOMO khi chọn phương thức
    paymentMethod.addEventListener('change', function() {
        if (paymentMethod.value === 'vnpay') {
            vnpayFormWrapper.style.display = 'block';
            momoFormWrapper.style.display = 'none';
            updateVnpayAmount();
        } else if (paymentMethod.value === 'momo') {
            momoFormWrapper.style.display = 'block';
            if (typeof vnpayFormWrapper !== 'undefined' && vnpayFormWrapper) vnpayFormWrapper.style.display = 'none';
            updateMomoAmount();
        } else {
            if (typeof vnpayFormWrapper !== 'undefined' && vnpayFormWrapper) vnpayFormWrapper.style.display = 'none';
            momoFormWrapper.style.display = 'none';
        }
    });
    
    // Cập nhật số tiền vào input hidden khi thay đổi voucher/quantity cho MOMO
    function updateMomoAmount() {
        let total = totalValueSpan.textContent.replace(/[^\d]/g, '');
        selectedAmountInput.value = total;
    }
    voucherSelect.addEventListener('change', updateMomoAmount);
    quantity.addEventListener('change', updateMomoAmount);
    
    // Khi load lại trang nếu đã chọn MOMO thì hiện form
    if (paymentMethod.value === 'momo') {
        momoFormWrapper.style.display = 'block';
        updateMomoAmount();
    }

    // Initialize
    updateVoucherAndTotal();

    form.addEventListener('submit', function(e) {
        const valid = validateName() && validatePhone() && validateEmail() && 
                     validateDatetime() && validateQuantity() && validatePaymentMethod();
        
        if (!valid) {
            e.preventDefault();
        }
    });
});
</script>

<?php
// Include footer
include_once 'footer.php';
?>

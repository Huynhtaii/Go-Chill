<?php
// Include header chung
include_once 'header.php';
?>



<?php
// Function helper để hiển thị giá
function displayPrice($giaTour, $giaTourSale, $giamGia = 0) {
    $giaTour = isset($giaTour) ? (float)$giaTour : 0;
    $giaTourSale = isset($giaTourSale) ? (float)$giaTourSale : 0;
    $giamGia = isset($giamGia) ? (float)$giamGia : 0;
    
    // Tính giá sau giảm từ GiamGia nếu GiaTourSale không có
    $giaSauGiam = $giaTour - $giamGia;
    
    // Nếu có giá giảm (từ GiaTourSale hoặc GiamGia) và giá giảm > 0 và nhỏ hơn giá gốc, hiển thị cả hai
    if (($giaTourSale > 0 && $giaTourSale < $giaTour) || ($giamGia > 0 && $giaSauGiam > 0 && $giaSauGiam < $giaTour)) {
        echo '<span class="original-price">' . number_format($giaTour, 0, ',', '.') . '₫</span>';
        if ($giaTourSale > 0 && $giaTourSale < $giaTour) {
            echo '<span class="current-price">' . number_format($giaTourSale, 0, ',', '.') . '₫</span>';
        } else {
            echo '<span class="current-price">' . number_format($giaSauGiam, 0, ',', '.') . '₫</span>';
        }
    } else {
        // Chỉ hiển thị giá gốc nếu không có giảm giá hoặc giá giảm không hợp lệ
        echo '<span class="current-price">' . number_format($giaTour, 0, ',', '.') . '₫</span>';
    }
}
?>

<style>
    /* Đảm bảo spacing phù hợp với header và footer */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        margin-top: 20px; /* Thêm khoảng cách từ header */
        margin-bottom: 40px; /* Thêm khoảng cách đến footer */
    }
    
    .category-filter {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .category-filter h3 {
        margin: 0 0 20px 0;
        color: #2c3e50;
        font-size: 18px;
        font-weight: 600;
    }
    
    .category-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .category-btn {
        padding: 12px 24px;
        border: 2px solid #3498db;
        background: white;
        color: #3498db;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
    }
    
    .category-btn:hover,
    .category-btn.active {
        background: #3498db;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    }
    
    .page-title {
        text-align: center;
        margin: 30px 0;
        color: #2c3e50;
        font-size: 28px;
        font-weight: 700;
    }
    
    .category-header {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        text-align: center;
    }
    
    .category-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }
    
    .category-header p {
        margin: 10px 0 0 0;
        opacity: 0.9;
        font-size: 16px;
    }
    
    .no-tours {
        text-align: center;
        padding: 50px;
        color: #666;
        background: #f8f9fa;
        border-radius: 10px;
        margin: 20px 0;
    }
    
    .tour-count {
        background: #e8f4fd;
        color: #2980b9;
        padding: 10px 20px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 20px;
        font-weight: 500;
    }
    
    .tour-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }
    
    .tour-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .tour-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .image-container {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    
    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .tour-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(52, 152, 219, 0.1) 0%, transparent 100%);
    }
    
    .product-content {
        padding: 20px;
    }
    
    .product-title {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .location-duration {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 14px;
        color: #666;
    }
    
    .location, .duration {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .location i, .duration i {
        color: #3498db;
    }
    
    .rating-box {
        background: #f8f9fa;
        border-radius: 20px;
        padding: 8px 15px;
        margin-bottom: 15px;
        display: inline-block;
    }
    
    .rating {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
        color: #f39c12;
    }
    
    .bottom-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .price-info {
        font-weight: 600;
        color: #e74c3c;
        font-size: 18px;
    }
    
    /* CSS cho hiển thị giá */
    .original-price {
        text-decoration: line-through;
        color: #999;
        font-size: 14px;
        margin-right: 8px;
    }
    
    .current-price {
        color: #e74c3c;
        font-weight: 700;
        font-size: 18px;
    }
    
    .book-button {
        background: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .book-button:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .tour-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .category-buttons {
            flex-direction: column;
        }
        
        .category-btn {
            text-align: center;
        }
    }
</style>

<div class="container">
    <?php if (isset($currentCategory)): ?>
        <div class="category-header">
            <h2><?php echo htmlspecialchars($currentCategory); ?></h2>
            <p>Khám phá những tour du lịch tuyệt vời trong danh mục này</p>
        </div>
    <?php else: ?>
        <h1 class="page-title">Tất cả tour du lịch</h1>
    <?php endif; ?>
    
    <div class="category-filter">
        <h3>🔍 Lọc theo danh mục:</h3>
        <div class="category-buttons">
            <a href="index1.php?controller=tour" class="category-btn <?php echo !isset($currentCategory) ? 'active' : ''; ?>">
                🌍 Tất cả tour
            </a>
            <?php if (isset($categories) && !empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <a href="index1.php?controller=tour&category=<?php echo urlencode($category['TenDanhMuc']); ?>" 
                       class="category-btn <?php echo (isset($currentCategory) && $currentCategory === $category['TenDanhMuc']) ? 'active' : ''; ?>">
                        <?php 
                        $icon = '';
                        switch($category['TenDanhMuc']) {
                            case 'Tour Trong Nước':
                                $icon = '🏠';
                                break;
                            case 'Tour Nước Ngoài':
                                $icon = '✈️';
                                break;
                            case 'Tour bán chạy':
                                $icon = '🔥';
                                break;
                            default:
                                $icon = '🎯';
                        }
                        echo $icon . ' ' . $category['TenDanhMuc']; 
                        ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <?php if (isset($tourList) && !empty($tourList)): ?>
        <div class="tour-count">
            📊 Hiển thị <?php echo count($tourList); ?> tour<?php echo count($tourList) > 1 ? 's' : ''; ?>
            <?php if (isset($currentCategory)): ?>
                trong danh mục "<?php echo htmlspecialchars($currentCategory); ?>"
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="no-tours">
            <p>Không có tour nào trong danh mục này.</p>
            <?php if (isset($currentCategory)): ?>
                <p><small>Đang tìm kiếm danh mục: "<?php echo htmlspecialchars($currentCategory); ?>"</small></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div class="tour-grid">
        <?php if (isset($tourList) && !empty($tourList)): ?>
            <?php foreach ($tourList as $tour): ?>
                <div class="tour-card">
                    <div class="image-container">
                        <img src="public/img/<?= isset($tour['HinhAnh']) ? $tour['HinhAnh'] : '' ?>" 
                             alt="<?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?>" class="product-image">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title"><?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?></h3>
                        
                        <div class="location-duration">
                            <div class="location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?= isset($tour['DiemDen']) ? $tour['DiemDen'] : '' ?></span>
                            </div>
                            <div class="duration">
                                <i class="fas fa-clock"></i>
                                <span><?= isset($tour['ThoiGian']) ? $tour['ThoiGian'] : '' ?></span>
                            </div>
                        </div>
                        
                        <div class="rating-box">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span><?= isset($tour['Danhgia']) ? $tour['Danhgia'] : '' ?></span>
                            </div>
                        </div>
                        
                        <div class="bottom-section">
                            <div class="price-info">
                                <?php displayPrice($tour['GiaTour'], $tour['GiaTourSale'], $tour['GiamGia']); ?>
                            </div>
                            <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $tour['MaTour']; ?>" class="book-button" style="text-decoration: none; display: inline-block;">Đặt Ngay</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-tours">
                <p>Không có tour nào trong danh mục này.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
// Include footer chung
include_once 'footer.php';
?>

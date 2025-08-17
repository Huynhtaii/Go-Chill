<?php
// Form chỉnh sửa tour
if (!isset($tour) || empty($tour)) {
    echo "<div style='background: #e74c3c; color: white; padding: 20px; margin: 20px; border-radius: 5px;'>";
    echo "<h3>Lỗi: Không có dữ liệu tour!</h3>";
    echo "<a href='index.php?controller=tour&action=index' style='color: white; text-decoration: underline;'>Quay lại danh sách tour</a>";
    echo "</div>";
    return;
}
?>

<div class="header-trang">
    <h2>Sửa Tour</h2>
    <a href="index.php?controller=tour&action=index" class="btn-quaylai">← Quay Lại</a>
</div>

<?php if (!empty($errors)): ?>
    <div class="error-message">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="form-container">
    <form action="index.php?controller=tour&action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MaTour" value="<?php echo htmlspecialchars($tour['MaTour']); ?>">
        <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($tour['HinhAnh'] ?? ''); ?>">
        
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Tiêu đề tour:</label>
                <input type="text" name="TieuDe" class="form-input" value="<?php echo htmlspecialchars($tour['TieuDe']); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Danh mục:</label>
                <select name="IDDanhMuc" class="form-select">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['ID']; ?>" 
                                <?php echo ($tour['IDDanhMuc'] ?? '') == $category['ID'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['TenDanhMuc']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Điểm đến:</label>
                <input type="text" name="DiemDen" class="form-input" value="<?php echo htmlspecialchars($tour['DiemDen']); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Thời gian:</label>
                <input type="text" name="ThoiGian" class="form-input" value="<?php echo htmlspecialchars($tour['ThoiGian'] ?? ''); ?>" placeholder="VD: 3 ngày 2 đêm">
            </div>
            
            <div class="form-group">
                <label class="form-label">Nơi khởi hành:</label>
                <input type="text" name="NoiKhoiHanh" class="form-input" value="<?php echo htmlspecialchars($tour['NoiKhoiHanh'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Phương tiện:</label>
                <select name="PhuongTien" class="form-select">
                    <option value="">Chọn phương tiện</option>
                    <option value="Máy bay" <?php echo ($tour['PhuongTien'] ?? '') == 'Máy bay' ? 'selected' : ''; ?>>Máy bay</option>
                    <option value="Tàu hỏa" <?php echo ($tour['PhuongTien'] ?? '') == 'Tàu hỏa' ? 'selected' : ''; ?>>Tàu hỏa</option>
                    <option value="Xe khách" <?php echo ($tour['PhuongTien'] ?? '') == 'Xe khách' ? 'selected' : ''; ?>>Xe khách</option>
                    <option value="Tàu thủy" <?php echo ($tour['PhuongTien'] ?? '') == 'Tàu thủy' ? 'selected' : ''; ?>>Tàu thủy</option>
                    <option value="Xe máy" <?php echo ($tour['PhuongTien'] ?? '') == 'Xe máy' ? 'selected' : ''; ?>>Xe máy</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Trạng thái:</label>
                <select name="TrangThai" class="form-select">
                    <option value="Hoạt động" <?php echo ($tour['TrangThai'] ?? 'Hoạt động') == 'Hoạt động' ? 'selected' : ''; ?>>Hoạt động</option>
                    <option value="Tạm dừng" <?php echo ($tour['TrangThai'] ?? '') == 'Tạm dừng' ? 'selected' : ''; ?>>Tạm dừng</option>
                    <option value="Đã hủy" <?php echo ($tour['TrangThai'] ?? '') == 'Đã hủy' ? 'selected' : ''; ?>>Đã hủy</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Ngày khởi hành:</label>
                <input type="date" name="NgayKhoiHanh" class="form-input" value="<?php echo htmlspecialchars($tour['NgayKhoiHanh'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Ngày kết thúc:</label>
                <input type="date" name="NgayKetThuc" class="form-input" value="<?php echo htmlspecialchars($tour['NgayKetThuc'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Giá tour (VNĐ):</label>
                <input type="number" name="GiaTour" class="form-input" value="<?php echo htmlspecialchars($tour['GiaTour']); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Giá giảm (VNĐ):</label>
                <input type="number" name="GiamGia" class="form-input" value="<?php echo htmlspecialchars($tour['GiamGia'] ?? '0'); ?>" placeholder="Nhập số tiền giảm giá (0 nếu không giảm)">
                <small style="color: #666;">Giá sau giảm sẽ là: Giá tour - Giá giảm</small>
            </div>
            
            <div class="form-group">
                <label class="form-label">Hình ảnh hiện tại:</label>
                <?php if (!empty($tour['HinhAnh'])): ?>
                    <img src="public/img/<?php echo htmlspecialchars($tour['HinhAnh']); ?>" alt="Current Image" style="width: 100px; height: 60px; object-fit: cover; border-radius: 4px; margin-top: 5px;">
                <?php else: ?>
                    <div class="anh-khong-co" style="margin-top: 5px;">Không có ảnh</div>
                <?php endif; ?>
                <input type="file" name="HinhAnh" class="form-input" accept="image/*" style="margin-top: 10px;">
                <small style="color: #666;">Chọn ảnh mới (để trống nếu không thay đổi)</small>
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Mô tả tour:</label>
            <textarea name="MoTa" class="form-textarea" rows="5" placeholder="Nhập mô tả chi tiết về tour..."><?php echo htmlspecialchars($tour['MoTa'] ?? ''); ?></textarea>
        </div>
        
        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" class="form-submit">Cập Nhật Tour</button>
        </div>
    </form>
</div>

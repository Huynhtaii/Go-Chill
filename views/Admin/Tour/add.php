<?php

?>
<div class="header-trang">
    <h2>Thêm Tour Mới</h2>
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
    <form action="index.php?controller=tour&action=add" method="POST" enctype="multipart/form-data">
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Tiêu đề tour:</label>
                <input type="text" name="TieuDe" class="form-input" value="<?php echo htmlspecialchars($_POST['TieuDe'] ?? ''); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Danh mục:</label>
                <select name="IDDanhMuc" class="form-select">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['ID']; ?>" 
                                <?php echo ($_POST['IDDanhMuc'] ?? '') == $category['ID'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['TenDanhMuc']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Điểm đến:</label>
                <input type="text" name="DiemDen" class="form-input" value="<?php echo htmlspecialchars($_POST['DiemDen'] ?? ''); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Thời gian:</label>
                <input type="text" name="ThoiGian" class="form-input" value="<?php echo htmlspecialchars($_POST['ThoiGian'] ?? ''); ?>" placeholder="VD: 3 ngày 2 đêm">
            </div>
            
            <div class="form-group">
                <label class="form-label">Nơi khởi hành:</label>
                <input type="text" name="NoiKhoiHanh" class="form-input" value="<?php echo htmlspecialchars($_POST['NoiKhoiHanh'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Phương tiện:</label>
                <select name="PhuongTien" class="form-select">
                    <option value="">Chọn phương tiện</option>
                    <option value="Máy bay" <?php echo ($_POST['PhuongTien'] ?? '') == 'Máy bay' ? 'selected' : ''; ?>>Máy bay</option>
                    <option value="Tàu hỏa" <?php echo ($_POST['PhuongTien'] ?? '') == 'Tàu hỏa' ? 'selected' : ''; ?>>Tàu hỏa</option>
                    <option value="Xe khách" <?php echo ($_POST['PhuongTien'] ?? '') == 'Xe khách' ? 'selected' : ''; ?>>Xe khách</option>
                    <option value="Tàu thủy" <?php echo ($_POST['PhuongTien'] ?? '') == 'Tàu thủy' ? 'selected' : ''; ?>>Tàu thủy</option>
                    <option value="Xe máy" <?php echo ($_POST['PhuongTien'] ?? '') == 'Xe máy' ? 'selected' : ''; ?>>Xe máy</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Trạng thái:</label>
                <select name="TrangThai" class="form-select">
                    <option value="Hoạt động" <?php echo ($_POST['TrangThai'] ?? 'Hoạt động') == 'Hoạt động' ? 'selected' : ''; ?>>Hoạt động</option>
                    <option value="Tạm dừng" <?php echo ($_POST['TrangThai'] ?? '') == 'Tạm dừng' ? 'selected' : ''; ?>>Tạm dừng</option>
                    <option value="Đã hủy" <?php echo ($_POST['TrangThai'] ?? '') == 'Đã hủy' ? 'selected' : ''; ?>>Đã hủy</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Ngày khởi hành:</label>
                <input type="date" name="NgayKhoiHanh" class="form-input" value="<?php echo htmlspecialchars($_POST['NgayKhoiHanh'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Ngày kết thúc:</label>
                <input type="date" name="NgayKetThuc" class="form-input" value="<?php echo htmlspecialchars($_POST['NgayKetThuc'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Giá tour (VNĐ):</label>
                <input type="number" name="GiaTour" class="form-input" value="<?php echo htmlspecialchars($_POST['GiaTour'] ?? ''); ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Giá giảm (VNĐ):</label>
                <input type="number" name="GiamGia" class="form-input" value="<?php echo htmlspecialchars($_POST['GiamGia'] ?? '0'); ?>" placeholder="Nhập số tiền giảm giá (0 nếu không giảm)">
                <small style="color: #666;">Giá sau giảm sẽ là: Giá tour - Giá giảm</small>
            </div>
            
            <div class="form-group">
                <label class="form-label">Hình ảnh:</label>
                <input type="file" name="HinhAnh" class="form-input" accept="image/*">
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Mô tả tour:</label>
            <textarea name="MoTa" class="form-textarea" rows="5" placeholder="Nhập mô tả chi tiết về tour..."><?php echo htmlspecialchars($_POST['MoTa'] ?? ''); ?></textarea>
        </div>
        
        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" class="form-submit">Thêm Tour</button>
        </div>
    </form>
</div>

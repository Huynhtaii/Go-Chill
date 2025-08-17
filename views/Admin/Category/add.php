<?php 
// Header đã được include trong index.php chính
?>

<div class="content">
    <div class="header-trang">
        <h2>Thêm Danh Mục Tour Mới</h2>
        <a href="index.php?controller=category&action=index" class="add-btn">← Quay lại</a>
    </div>

    <div class="form-container">
        <form method="POST" action="index.php?controller=category&action=add">
            <div class="form-group">
                <label for="TenDanhMuc">Tên Danh Mục *</label>
                <input type="text" id="TenDanhMuc" name="TenDanhMuc" required 
                       placeholder="Ví dụ: Tour Trong Nước, Tour Nước Ngoài">
            </div>

            <div class="form-group">
                <label for="TrangThai">Trạng Thái</label>
                <select id="TrangThai" name="TrangThai">
                    <option value="Hoạt động">Hoạt động</option>
                    <option value="Tạm dừng">Tạm dừng</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Thêm Danh Mục</button>
                <a href="index.php?controller=category&action=index" class="btn-cancel">Hủy</a>
            </div>
        </form>
    </div>
</div>

<?php 
// Footer đã được include trong index.php chính
?>


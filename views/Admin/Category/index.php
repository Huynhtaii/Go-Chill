<?php 
// Header đã được include trong index.php chính
?>

<div class="content">
    <div class="header-trang">
        <h2>Quản Lý Danh Mục Tour</h2>
        <a href="index.php?controller=category&action=add" class="add-btn">+ Thêm danh mục mới</a>
    </div>

    <div class="container-bang">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th>Trạng Thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $i => $category): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td>
                        <div style="font-weight: 500; color: #2c3e50;">
                            <?php echo htmlspecialchars($category['TenDanhMuc']); ?>
                        </div>
                    </td>
                    <td>
                        <?php 
                        $status = $category['TrangThai'] ?? 'Hoạt động';
                        $statusClass = 'badge-trangthai ';
                        switch(strtolower($status)) {
                            case 'hoạt động':
                                $statusClass .= 'badge-hoatdong';
                                break;
                            case 'tạm dừng':
                                $statusClass .= 'badge-tamdung';
                                break;
                            default:
                                $statusClass .= 'badge-hoatdong';
                        }
                        ?>
                        <span class="<?php echo $statusClass; ?>">
                            <?php echo htmlspecialchars($status); ?>
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="index.php?controller=category&action=edit&id=<?php echo $category['ID']; ?>" 
                               class="btn-action btn-edit">Sửa</a>
                            <a href="index.php?controller=category&action=delete&id=<?php echo $category['ID']; ?>" 
                               class="btn-action btn-delete"
                               onclick="return confirm('Bạn có chắc muốn xóa danh mục này?');">Xóa</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
// Footer đã được include trong index.php chính
?>


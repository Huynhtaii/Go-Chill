<style>
/* Fix sidebar layout for tour management page only */
.admin-wrapper {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 280px !important;
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    padding: 0;
    color: #fff;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    position: relative;
    overflow-y: auto;
    flex-shrink: 0;
    animation: none !important;
    transform: none !important;
}

.content {
    flex-grow: 1;
    padding: 40px;
    min-width: 0;
}

/* Ensure table doesn't overflow */
.container-bang {
    overflow-x: auto;
}

table {
    min-width: 1200px;
}
</style>

<div class="content">
    <div class="header-trang">
        <h2>Danh Sách Tour</h2>
        <a href="index.php?controller=tour&action=add" class="add-btn">+ Thêm tour mới</a>
    </div>

    <div class="container-bang">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Điểm đến</th>
                    <th>Phương tiện</th>
                    <th>Trạng thái</th>
                    <th>Mô tả</th>
                    <th>Ngày khởi hành</th>
                    <th>Ngày kết thúc</th>
                    <th>Giá (VNĐ)</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tours as $i => $tour): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td>
                        <?php if (!empty($tour['HinhAnh'])): ?>
                            <img src="public/img/<?php echo htmlspecialchars($tour['HinhAnh']); ?>" alt="Tour Image" class="anh-tour">
                        <?php else: ?>
                            <div class="anh-khong-co">No img</div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="font-weight: 500; color: #2c3e50;"><?php echo htmlspecialchars($tour['TieuDe']); ?></div>
                    </td>
                    <td>
                        <?php if (!empty($tour['TenDanhMuc'])): ?>
                            <span class="badge-danhmuc">
                                <?php echo htmlspecialchars($tour['TenDanhMuc']); ?>
                            </span>
                        <?php else: ?>
                            <span class="badge-khong-danhmuc">Chưa phân loại</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($tour['DiemDen']); ?></td>
                    <td>
                        <span class="badge-phuongtien">
                            <?php echo htmlspecialchars($tour['PhuongTien'] ?? 'Chưa cập nhật'); ?>
                        </span>
                    </td>
                    <td>
                        <?php 
                        $status = $tour['TrangThai'] ?? 'Hoạt động';
                        $statusClass = 'badge-trangthai ';
                        switch(strtolower($status)) {
                            case 'hoạt động':
                                $statusClass .= 'badge-hoatdong';
                                break;
                            case 'tạm dừng':
                                $statusClass .= 'badge-tamdung';
                                break;
                            case 'đã hủy':
                                $statusClass .= 'badge-dahuy';
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
                        <div class="mota-tour">
                            <?php echo htmlspecialchars(substr($tour['MoTa'] ?? 'Chưa có mô tả', 0, 100)) . (strlen($tour['MoTa'] ?? '') > 100 ? '...' : ''); ?>
                        </div>
                    </td>
                    <td>
                        <?php 
                        if (!empty($tour['NgayKhoiHanh']) && $tour['NgayKhoiHanh'] != '0000-00-00') {
                            echo date('d/m/Y', strtotime($tour['NgayKhoiHanh']));
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        if (!empty($tour['NgayKetThuc']) && $tour['NgayKetThuc'] != '0000-00-00') {
                            echo date('d/m/Y', strtotime($tour['NgayKetThuc']));
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td class="gia-tour">
                        <?php 
                        $giaGoc = $tour['GiaTour'];
                        $giamGia = isset($tour['GiamGia']) ? $tour['GiamGia'] : 0;
                        $giaSauGiam = $giaGoc - $giamGia;
                        if ($giamGia > 0) {
                            echo '<span style="color: #e74c3c; text-decoration: line-through; font-size: 12px;">' . number_format($giaGoc, 0, ',', '.') . ' ₫</span><br>';
                            echo '<span style="color: #27ae60; font-weight: bold; font-size: 14px;">' . number_format($giaSauGiam, 0, ',', '.') . ' ₫</span>';
                        } else {
                            echo '<span style="color: #2c3e50; font-weight: bold;">' . number_format($giaGoc, 0, ',', '.') . ' ₫</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="index.php?controller=tour&action=edit&MaTour=<?php echo $tour['MaTour']; ?>" 
                               class="btn-action btn-edit">Sửa</a>
                            <a href="index.php?controller=tour&action=delete&MaTour=<?php echo $tour['MaTour']; ?>" 
                               class="btn-action btn-delete"
                               onclick="return confirm('Bạn có chắc muốn xóa tour này?');">Xóa</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

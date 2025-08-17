<?php
// Trang hiển thị danh sách đánh giá
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Đánh Giá</h2>
        <a href="?controller=rate&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Thêm Đánh Giá</a>
    </div>

    <?php if (isset($rateList) && !empty($rateList)): ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #34495e; color: white;">
                    <th style="padding: 12px;">Mã Đánh Giá</th>
                    <th style="padding: 12px;">Mã Tour</th>
                    <th style="padding: 12px;">Mã Khách Hàng</th>
                    <th style="padding: 12px;">Điểm</th>
                    <th style="padding: 12px;">Bình Luận</th>
                    <th style="padding: 12px;">Ngày Đánh Giá</th>
                    <th style="padding: 12px;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rateList as $rate): ?>
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 12px;">
                            <?= isset($rate['MaDanhGia']) ? htmlspecialchars($rate['MaDanhGia']) : '' ?>
                        </td>
                        <td style="padding: 12px;">
                            <?= isset($rate['MaTour']) ? htmlspecialchars($rate['MaTour']) : '' ?>
                        </td>
                        <td style="padding: 12px;">
                            <?= isset($rate['MaKhachHang']) ? htmlspecialchars($rate['MaKhachHang']) : '' ?>
                        </td>
                        <td style="padding: 12px;">
                            <?= isset($rate['SoSao']) ? htmlspecialchars($rate['SoSao']) . ' ⭐' : '' ?>
                        </td>
                        <td style="padding: 12px;">
                            <?= isset($rate['NhanXet']) ? mb_strimwidth(strip_tags($rate['NhanXet']), 0, 80, '...') : '' ?>
                        </td>
                        <td style="padding: 12px;">
                            <?php
                                if (!empty($rate['NgayDang'])) {
                                    $date = strtotime($rate['NgayDang']);
                                    echo $date ? date('d/m/Y H:i', $date) : '';
                                } else {
                                    echo '';
                                }
                            ?>
                        </td>
                        <td style="padding: 12px;">
                            <a href="?controller=rate&action=edit&id=<?= isset($rate['MaDanhGia']) ? urlencode($rate['MaDanhGia']) : '' ?>" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Sửa</a>
                            <a href="?controller=rate&action=delete&id=<?= isset($rate['MaDanhGia']) ? urlencode($rate['MaDanhGia']) : '' ?>" onclick="return confirm('Bạn có chắc muốn xóa đánh giá này?')" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có đánh giá nào được đăng.</p>
            <a href="?controller=rate&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Thêm Đánh Giá</a>
        </div>
    <?php endif; ?>
</div>

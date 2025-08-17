<?php
// Trang hiển thị danh sách voucher
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Mã Giảm Giá</h2>
        <a href="?controller=voucher&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Thêm Voucher Mới</a>
    </div>

    <?php if(isset($vouchers) && !empty($vouchers)): ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #34495e; color: white;">
                    <th style="padding: 12px; text-align: left;">ID</th>
                    <th style="padding: 12px; text-align: left;">Mã Voucher</th>
                    <th style="padding: 12px; text-align: left;">Tên Voucher</th>
                    <th style="padding: 12px; text-align: left;">Loại Giảm Giá</th>
                    <th style="padding: 12px; text-align: left;">Giá Trị</th>
                    <th style="padding: 12px; text-align: left;">Số Lượng</th>
                    <th style="padding: 12px; text-align: left;">Ngày Bắt Đầu</th>
                    <th style="padding: 12px; text-align: left;">Ngày Kết Thúc</th>
                    <th style="padding: 12px; text-align: left;">Trạng Thái</th>
                    <th style="padding: 12px; text-align: left;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vouchers as $voucher): ?>
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 12px;"><?= $voucher['ID'] ?></td>
                        <td style="padding: 12px; font-weight: bold; color: #e74c3c;"><?= $voucher['MaVoucher'] ?></td>
                        <td style="padding: 12px;"><?= $voucher['TenVoucher'] ?></td>
                        <td style="padding: 12px;">
                            <?php if($voucher['LoaiGiamGia'] == 'phantram'): ?>
                                <span style="background: #3498db; color: white; padding: 2px 8px; border-radius: 3px; font-size: 12px;">Phần trăm</span>
                            <?php else: ?>
                                <span style="background: #e67e22; color: white; padding: 2px 8px; border-radius: 3px; font-size: 12px;">Tiền mặt</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px;">
                            <?php if($voucher['LoaiGiamGia'] == 'phantram'): ?>
                                <?= isset($voucher['GiaTriGiamGia']) ? $voucher['GiaTriGiamGia'] : 0 ?>%
                            <?php else: ?>
                                <?= isset($voucher['GiaTriGiamGia']) ? number_format($voucher['GiaTriGiamGia']) : '0' ?> VNĐ
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px;"><?= $voucher['SoLuong'] ?></td>
                        <td style="padding: 12px;"><?= date('d/m/Y H:i', strtotime($voucher['NgayBatDau'])) ?></td>
                        <td style="padding: 12px;"><?= date('d/m/Y H:i', strtotime($voucher['NgayKetThuc'])) ?></td>
                        <td style="padding: 12px;">
                            <?php if($voucher['TrangThai'] == 1): ?>
                                <span style="background: #27ae60; color: white; padding: 2px 8px; border-radius: 3px; font-size: 12px;">Hoạt động</span>
                            <?php else: ?>
                                <span style="background: #e74c3c; color: white; padding: 2px 8px; border-radius: 3px; font-size: 12px;">Không hoạt động</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px;">
                            <a href="?controller=voucher&action=edit&id=<?= $voucher['ID'] ?>" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px; font-size: 12px;">Sửa</a>
                            <a href="?controller=voucher&action=show&id=<?= $voucher['ID'] ?>" style="background: #3498db; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px; font-size: 12px;">Xem</a>
                            <a href="?controller=voucher&action=delete&id=<?= $voucher['ID'] ?>" onclick="return confirm('Bạn có chắc muốn xóa voucher này?')" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có voucher nào được tạo.</p>
            <a href="?controller=voucher&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Tạo Voucher Đầu Tiên</a>
        </div>
    <?php endif; ?>
</div>

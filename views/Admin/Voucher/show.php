<?php
// Trang hiển thị chi tiết voucher
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chi Tiết Mã Giảm Giá</h2>
        <a href="?controller=voucher&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
    </div>

    <?php if(isset($voucher)): ?>
        <div style="background: white; border-radius: 8px; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <h3 style="color: #2c3e50; margin-bottom: 16px;">Thông Tin Cơ Bản</h3>
                    
                    <div style="margin-bottom: 12px;">
                        <strong>ID:</strong> <?= $voucher['ID'] ?>
                    </div>
                    
                    <div style="margin-bottom: 12px;">
                        <strong>Mã Voucher:</strong> 
                        <span style="background: #e74c3c; color: white; padding: 4px 8px; border-radius: 4px; font-weight: bold;">
                            <?= $voucher['MaVoucher'] ?>
                        </span>
                    </div>
                    
                    <div style="margin-bottom: 12px;">
                        <strong>Tên Voucher:</strong> <?= $voucher['TenVoucher'] ?>
                    </div>
                    
                    <div style="margin-bottom: 12px;">
                        <strong>Mô tả:</strong> <?= $voucher['MoTa'] ?: 'Không có mô tả' ?>
                    </div>
                    
                    <div style="margin-bottom: 12px;">
                        <strong>Loại giảm giá:</strong>
                        <?php if($voucher['LoaiGiamGia'] == 'phantram'): ?>
                            <span style="background: #3498db; color: white; padding: 4px 8px; border-radius: 4px;">Giảm theo phần trăm</span>
                        <?php else: ?>
                            <span style="background: #e67e22; color: white; padding: 4px 8px; border-radius: 4px;">Giảm theo tiền mặt</span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div>
                    <h3 style="color: #2c3e50; margin-bottom: 16px;">Thông Tin Giảm Giá</h3>
                    
                                         <div style="margin-bottom: 12px;">
                         <strong>Giá trị giảm giá:</strong>
                         <?php if($voucher['LoaiGiamGia'] == 'phantram'): ?>
                             <span style="color: #e74c3c; font-weight: bold;"><?= isset($voucher['GiaTriGiamGia']) ? $voucher['GiaTriGiamGia'] : 0 ?>%</span>
                         <?php else: ?>
                             <span style="color: #e74c3c; font-weight: bold;"><?= isset($voucher['GiaTriGiamGia']) ? number_format($voucher['GiaTriGiamGia']) : '0' ?> VNĐ</span>
                         <?php endif; ?>
                     </div>
                    
                    
                    
                    <div style="margin-bottom: 12px;">
                        <strong>Số lượng:</strong> <?= $voucher['SoLuong'] ?>
                    </div>
                    
                    <div style="margin-bottom: 12px;">
                        <strong>Trạng thái:</strong>
                        <?php if($voucher['TrangThai'] == 1): ?>
                            <span style="background: #27ae60; color: white; padding: 4px 8px; border-radius: 4px;">Hoạt động</span>
                        <?php else: ?>
                            <span style="background: #e74c3c; color: white; padding: 4px 8px; border-radius: 4px;">Không hoạt động</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #ecf0f1;">
                <h3 style="color: #2c3e50; margin-bottom: 16px;">Thời Gian Hiệu Lực</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <strong>Ngày bắt đầu:</strong><br>
                        <?= date('d/m/Y H:i', strtotime($voucher['NgayBatDau'])) ?>
                    </div>
                    <div>
                        <strong>Ngày kết thúc:</strong><br>
                        <?= date('d/m/Y H:i', strtotime($voucher['NgayKetThuc'])) ?>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 24px; text-align: center;">
                <a href="?controller=voucher&action=edit&id=<?= $voucher['ID'] ?>" style="background: #f39c12; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Chỉnh Sửa</a>
                <a href="?controller=voucher&action=delete&id=<?= $voucher['ID'] ?>" onclick="return confirm('Bạn có chắc muốn xóa voucher này?')" style="background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Xóa</a>
            </div>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Không tìm thấy voucher.</p>
        </div>
    <?php endif; ?>
</div>

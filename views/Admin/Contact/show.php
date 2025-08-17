<?php
// Trang hiển thị chi tiết liên hệ
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chi Tiết Liên Hệ #<?= $contact['MaLienHe'] ?? '' ?></h2>
        <div>
            <a href="?controller=contact&action=edit&id=<?= $contact['MaLienHe'] ?>" style="background: #f39c12; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Chỉnh Sửa</a>
            <a href="?controller=contact&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
        </div>
    </div>

    <?php if (isset($contact) && $contact): ?>
        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div>
                    <h3 style="color: #34495e; margin-bottom: 20px; border-bottom: 2px solid #ecf0f1; padding-bottom: 10px;">Thông Tin Cơ Bản</h3>
                    
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 5px;">Mã Liên Hệ:</label>
                        <p style="margin: 0; padding: 8px; background: #f8f9fa; border-radius: 4px;"><?= htmlspecialchars($contact['MaLienHe'] ?? '') ?></p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 5px;">Họ Tên:</label>
                        <p style="margin: 0; padding: 8px; background: #f8f9fa; border-radius: 4px;"><?= htmlspecialchars($contact['HoTen'] ?? '') ?></p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 5px;">Số Điện Thoại:</label>
                        <p style="margin: 0; padding: 8px; background: #f8f9fa; border-radius: 4px;">
                            <a href="tel:<?= htmlspecialchars($contact['SoDienThoai'] ?? '') ?>" style="color: #3498db; text-decoration: none;">
                                <?= htmlspecialchars($contact['SoDienThoai'] ?? '') ?>
                            </a>
                        </p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 5px;">Ngày Tạo:</label>
                        <p style="margin: 0; padding: 8px; background: #f8f9fa; border-radius: 4px;"><?= date('d/m/Y H:i', strtotime($contact['NgayTao'] ?? '')) ?></p>
                    </div>
                </div>

                <div>
                    <h3 style="color: #34495e; margin-bottom: 20px; border-bottom: 2px solid #ecf0f1; padding-bottom: 10px;">Trạng Thái & Nội Dung</h3>
                    
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 5px;">Trạng Thái:</label>
                        <p style="margin: 0; padding: 8px;">
                            <?php if ($contact['TrangThai'] == 1): ?>
                                <span style="background: #e74c3c; color: white; padding: 8px 15px; border-radius: 20px; font-size: 14px;">🔴 Chưa xử lý</span>
                            <?php else: ?>
                                <span style="background: #27ae60; color: white; padding: 8px 15px; border-radius: 20px; font-size: 14px;">✅ Đã xử lý</span>
                            <?php endif; ?>
                        </p>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; color: #34495e; margin-bottom: 5px;">Ghi Chú:</label>
                        <div style="margin: 0; padding: 15px; background: #f8f9fa; border-radius: 4px; border-left: 4px solid #3498db; min-height: 100px;">
                            <?= nl2br(htmlspecialchars($contact['GhiChu'] ?? 'Không có ghi chú')) ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hành động nhanh -->
            <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ecf0f1;">
                <h4 style="color: #34495e; margin-bottom: 15px;">Hành Động Nhanh:</h4>
                <div style="display: flex; gap: 10px;">
                    <?php if ($contact['TrangThai'] == 1): ?>
                        <a href="?controller=contact&action=markAsProcessed&id=<?= $contact['MaLienHe'] ?>" 
                           style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                           ✅ Đánh dấu đã xử lý
                        </a>
                    <?php else: ?>
                        <a href="?controller=contact&action=updateStatus&id=<?= $contact['MaLienHe'] ?>&status=1" 
                           style="background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                           🔄 Đánh dấu chưa xử lý
                        </a>
                    <?php endif; ?>
                    
                    <a href="?controller=contact&action=delete&id=<?= $contact['MaLienHe'] ?>" 
                       onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')"
                       style="background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                       🗑️ Xóa liên hệ
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #e74c3c; font-size: 16px;">❌ Không tìm thấy thông tin liên hệ này.</p>
            <a href="?controller=contact&action=index" style="background: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Quay lại danh sách</a>
        </div>
    <?php endif; ?>
</div>
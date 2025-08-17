<?php
// Trang hiển thị danh sách tin tức
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Quản Lý Tin Tức</h2>
        <a href="?controller=news&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Thêm Tin Mới</a>
    </div>

    <?php 
    if (isset($newsList) && !empty($newsList)): 
    ?>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #34495e; color: white;">
                    <th style="padding: 12px;">ID</th>
                    <th style="padding: 12px;">Tiêu Đề</th>
                    <th style="padding: 12px;">Hình Đại Diện</th>
                    <th style="padding: 12px;">Chủ Đề</th>
                    <th style="padding: 12px;">Ngày Đăng</th>
                    <th style="padding: 12px;">Nội Dung</th>
                    <th style="padding: 12px;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsList as $news): ?>
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 12px;"><?= $news['MaTin'] ?></td>
                        <td style="padding: 12px; font-weight: bold;"><?= htmlspecialchars($news['TieuDe']) ?></td>
                        <td style="padding: 12px;">
                            <?php if (!empty($news['HinhDaiDien'])): ?>
                                <img src="public/img/<?= htmlspecialchars($news['HinhDaiDien']) ?>" alt="" width="80" style="border-radius: 4px;">
                            <?php else: ?>
                                <span style="color: #bdc3c7;">(Không có)</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px;"><?= htmlspecialchars($news['ChuDe']) ?></td>
                        <td style="padding: 12px;"><?= date('d/m/Y', strtotime($news['NgayDang'])) ?></td>
                        <td style="padding: 12px;"><?= mb_strimwidth(strip_tags($news['NoiDung']), 0, 80, '...') ?></td>
                        <td style="padding: 12px;">
                            <a href="?controller=news&action=edit&id=<?= $news['MaTin'] ?>" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Sửa</a>
                            <a href="?controller=news&action=delete&id=<?= $news['MaTin'] ?>" onclick="return confirm('Bạn có chắc muốn xóa tin này?')" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="color: #7f8c8d; font-size: 16px;">Chưa có tin tức nào được đăng.</p>
            <a href="?controller=news&action=add" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;">Thêm Tin Tức</a>
        </div>
    <?php endif; ?>
</div>

<?php 
// Form chỉnh sửa tin tức
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Tin Tức</h2>
        <a href="?controller=news&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
    </div>

    <?php if (!empty($errors)): ?>
        <div style="background: #e74c3c; color: white; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
            <strong>Lỗi:</strong>
            <ul style="margin: 8px 0 0 20px;">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="index.php?controller=news&action=update" method="post" enctype="multipart/form-data" style="max-width:700px;margin:24px auto 0;background:#fff;padding:24px 32px;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
        <input type="hidden" name="MaTin" value="<?= $news['MaTin'] ?>">

        <input type="hidden" name="old_image" value="<?= htmlspecialchars($news['HinhDaiDien']) ?>"> 
        <!-- fix -->

        <div style="margin-bottom:16px;">
            <label for="TieuDe">Tiêu đề:</label><br>
            <input type="text" id="TieuDe" name="TieuDe" value="<?= htmlspecialchars($news['TieuDe']) ?>" required style="width:100%;padding:8px;" placeholder="VD: Khuyến mãi hè cực hot">
        </div>

        <div style="margin-bottom:16px;">
            <label for="ChuDe">Chủ đề:</label><br>
            <input type="text" id="ChuDe" name="ChuDe" value="<?= htmlspecialchars($news['ChuDe']) ?>" required style="width:100%;padding:8px;" placeholder="VD: Du lịch, Ưu đãi, Hướng dẫn...">
        </div>

        <div style="margin-bottom:16px;">
            <label for="NoiDung">Nội dung:</label><br>
            <textarea id="NoiDung" name="NoiDung" rows="6" style="width:100%;padding:8px;" placeholder="Nội dung chi tiết..."><?= htmlspecialchars($news['NoiDung']) ?></textarea>
        </div>

        <div style="margin-bottom:16px;">
            <label for="HinhDaiDien">Hình đại diện:</label><br>
            <?php if (!empty($news['HinhDaiDien'])): ?>
                <img src="public/img/<?= htmlspecialchars($news['HinhDaiDien']) ?>" alt="" width="150" style="border-radius: 4px; display:block; margin-bottom:10px;">
            <?php endif; ?>
            <input type="file" id="HinhDaiDien" name="HinhDaiDien" accept="image/*" style="width:100%;padding:8px;">
        </div>

        <div style="margin-bottom:16px;">
            <label for="NgayDang">Ngày đăng:</label><br>
            <input type="datetime-local" id="NgayDang" name="NgayDang" value="<?= date('Y-m-d\TH:i', strtotime($news['NgayDang'])) ?>" required style="width:100%;padding:8px;">
        </div>

        <div style="text-align:center;">
            <button type="submit" name="updateNews" style="background:#2c3e50;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;">Cập nhật Tin</button>
            <a href="?controller=news&action=index" style="background:#95a5a6;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;text-decoration:none;margin-left:10px;">Hủy</a>
        </div>
    </form>
</div>

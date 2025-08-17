<?php
// Form chỉnh sửa voucher
?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Chỉnh Sửa Mã Giảm Giá</h2>
        <a href="?controller=voucher&action=index" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Quay Lại</a>
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
<form action="" method="post" enctype="multipart/form-data" style="max-width:600px;margin:24px auto 0 auto;background:#fff;padding:24px 32px;border-radius:10px;box-shadow:0 2px 12px rgba(0,0,0,0.08);">
  <input type="hidden" name="ID" value="<?= $voucher['ID'] ?>">
  <div style="margin-bottom:16px;">
    <label for="MaVoucher">Mã voucher:</label><br>
    <input type="text" id="MaVoucher" name="MaVoucher" value="<?= $voucher['MaVoucher'] ?>" required style="width:100%;padding:8px;" placeholder="VD: GIAM50K">
  </div>
  <div style="margin-bottom:16px;">
    <label for="TenVoucher">Tên voucher:</label><br>
    <input type="text" id="TenVoucher" name="TenVoucher" value="<?= $voucher['TenVoucher'] ?>" required style="width:100%;padding:8px;" placeholder="VD: Giảm 50k cho tour mới">
  </div>
  <div style="margin-bottom:16px;">
    <label for="MoTa">Mô tả:</label><br>
    <textarea id="MoTa" name="MoTa" rows="3" style="width:100%;padding:8px;" placeholder="Mô tả chi tiết về voucher"><?= $voucher['MoTa'] ?></textarea>
  </div>
  <div style="margin-bottom:16px;">
    <label for="LoaiGiamGia">Loại giảm giá:</label><br>
    <select name="LoaiGiamGia" required style="width:100%;padding:8px;">
        <option value="">--Chọn loại giảm giá--</option>
        <option value="phantram" <?= ($voucher['LoaiGiamGia'] == 'phantram') ? 'selected' : '' ?>>Giảm theo phần trăm (%)</option>
        <option value="tienmat" <?= ($voucher['LoaiGiamGia'] == 'tienmat') ? 'selected' : '' ?>>Giảm theo tiền mặt (VNĐ)</option>
    </select>
  </div>
  <div style="margin-bottom:16px;">
    <label for="GiaTriGiamGia">Giá trị giảm giá:</label><br>
    <input type="number" id="GiaTriGiamGia" name="GiaTriGiamGia" value="<?= $voucher['GiaTriGiamGia'] ?>" min="0" required style="width:100%;padding:8px;" placeholder="VD: 50 (nếu là %) hoặc 50000 (nếu là VNĐ)">
  </div>
  <div style="margin-bottom:16px;">
    <label for="SoLuong">Số lượng voucher:</label><br>
    <input type="number" id="SoLuong" name="SoLuong" value="<?= $voucher['SoLuong'] ?>" min="1" required style="width:100%;padding:8px;" placeholder="VD: 100">
  </div>
  <div style="margin-bottom:16px;">
    <label for="NgayBatDau">Ngày bắt đầu:</label><br>
    <input type="datetime-local" id="NgayBatDau" name="NgayBatDau" value="<?= isset($voucher['NgayBatDau']) && $voucher['NgayBatDau'] ? date('Y-m-d\TH:i', strtotime($voucher['NgayBatDau'])) : '' ?>" required style="width:100%;padding:8px;">
  </div>
  <div style="margin-bottom:16px;">
    <label for="NgayKetThuc">Ngày kết thúc:</label><br>
    <input type="datetime-local" id="NgayKetThuc" name="NgayKetThuc" value="<?= isset($voucher['NgayKetThuc']) && $voucher['NgayKetThuc'] ? date('Y-m-d\TH:i', strtotime($voucher['NgayKetThuc'])) : '' ?>" required style="width:100%;padding:8px;">
  </div>
  <div style="margin-bottom:16px;">
    <label for="TrangThai">Trạng thái:</label><br>
    <select name="TrangThai" required style="width:100%;padding:8px;">
        <option value="1" <?= ($voucher['TrangThai'] == 1) ? 'selected' : '' ?>>Hoạt động</option>
        <option value="0" <?= ($voucher['TrangThai'] == 0) ? 'selected' : '' ?>>Không hoạt động</option>
    </select>
  </div>
  <div style="text-align:center;">
    <button type="submit" name="updateVoucher" style="background:#2c3e50;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;">Cập nhật voucher</button>
    <a href="?controller=voucher&action=index" style="background:#95a5a6;color:#fff;padding:10px 32px;border:none;border-radius:6px;font-size:16px;cursor:pointer;text-decoration:none;margin-left:10px;">Hủy</a>
  </div>
</form>
</div>

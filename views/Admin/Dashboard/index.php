<?php
// Dashboard Admin - Trang tổng quan
?>
<style>
    .dashboard-container {
        padding: 20px;
        background: #f8f9fa;
        min-height: 100vh;
    }
    
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
    }
    
    .stat-card.tours::before { background: #3498db; }
    .stat-card.bookings::before { background: #e74c3c; }
    .stat-card.revenue::before { background: #27ae60; }
    .stat-card.customers::before { background: #f39c12; }
    .stat-card.contacts::before { background: #9b59b6; }
    
    .stat-number {
        font-size: 2.5em;
        font-weight: bold;
        margin: 10px 0;
    }
    
    .stat-label {
        color: #7f8c8d;
        font-size: 16px;
    }
    
    .dashboard-row {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .chart-container, .notification-container {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .section-title {
        font-size: 1.4em;
        font-weight: bold;
        margin-bottom: 20px;
        color: #2c3e50;
        border-bottom: 2px solid #ecf0f1;
        padding-bottom: 10px;
    }
    
    .notification-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        margin-bottom: 10px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #3498db;
    }
    
    .notification-item.urgent {
        border-left-color: #e74c3c;
        background: #fff5f5;
    }
    
    .notification-item.warning {
        border-left-color: #f39c12;
        background: #fff9e6;
    }
    
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }
    
    .quick-action-btn {
        display: block;
        padding: 15px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        text-align: center;
        font-weight: bold;
        transition: all 0.3s;
    }
    
    .quick-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    }
    
    .chart-placeholder {
        height: 300px;
        background: #f8f9fa;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #7f8c8d;
        font-size: 16px;
    }
    
    .popular-list {
        list-style: none;
        padding: 0;
    }
    
    .popular-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #ecf0f1;
    }
    
    .popular-item:last-child {
        border-bottom: none;
    }
    
    .badge {
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: bold;
    }
    
    .badge.success { background: #d5f4e6; color: #27ae60; }
    .badge.warning { background: #ffeaa7; color: #f39c12; }
    .badge.danger { background: #fab1a0; color: #e74c3c; }
    .badge.info { background: #a8e6cf; color: #3498db; }
</style>

<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
        <div>
            <h1>📊 Dashboard Go & Chill</h1>
            <p style="color: #7f8c8d; margin: 0;">Tổng quan hoạt động kinh doanh tour du lịch</p>
        </div>
        <div style="text-align: right; color: #7f8c8d;">
            <p style="margin: 0;">Cập nhật lần cuối</p>
            <strong><?= date('d/m/Y H:i') ?></strong>
            <br><br>
            <a href="http://localhost/Go-Chillfinalquy/Go-Chill/Go-Chill/index1.php?controller=home&category=Du%20L%E1%BB%8Bch%20Trong%20N%C6%B0%E1%BB%9Bc" target="_blank" style="background: #4CAF50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; font-size: 14px;">
                🌐 Xem Trang Chủ
            </a>
        </div>
    </div>

    <!-- Thống kê tổng quan -->
    <div class="stats-grid">
        <div class="stat-card tours">
            <div class="stat-number" style="color: #3498db;"><?= number_format($stats['total_tours'] ?? 0) ?></div>
            <div class="stat-label">🏖️ Tổng số tour</div>
        </div>
        
        <div class="stat-card bookings">
            <div class="stat-number" style="color: #e74c3c;"><?= number_format($stats['monthly_bookings'] ?? 0) ?></div>
            <div class="stat-label">📅 Đặt tour tháng này</div>
        </div>
        
        <div class="stat-card revenue">
            <div class="stat-number" style="color: #27ae60;"><?= number_format($stats['monthly_revenue'] ?? 0) ?>đ</div>
            <div class="stat-label">💰 Doanh thu tháng này</div>
        </div>
        
        <div class="stat-card customers">
            <div class="stat-number" style="color: #f39c12;"><?= number_format($stats['new_customers'] ?? 0) ?></div>
            <div class="stat-label">👥 Khách hàng mới</div>
        </div>
        
        <div class="stat-card contacts">
            <div class="stat-number" style="color: #9b59b6;"><?= number_format($stats['unprocessed_contacts'] ?? 0) ?></div>
            <div class="stat-label">📞 Liên hệ chưa xử lý</div>
        </div>
    </div>

    <!-- Biểu đồ và thông báo -->
    <div class="dashboard-row">
        <!-- Biểu đồ doanh thu -->
        <div class="chart-container">
            <h3 class="section-title">📈 Doanh thu 12 tháng gần nhất</h3>
            <canvas id="revenueChart" style="max-height: 300px;"></canvas>
        </div>
        
        <!-- Thông báo quan trọng -->
        <div class="notification-container">
            <h3 class="section-title">🔔 Thông báo quan trọng</h3>
            
            <?php if (!empty($notifications['new_orders'])): ?>
                <div class="notification-item urgent">
                    <div>
                        <strong>Đơn đặt tour mới</strong><br>
                        <small><?= count($notifications['new_orders']) ?> đơn cần xử lý</small>
                    </div>
                    <a href="?controller=order&action=index" class="badge danger">Xem</a>
                </div>
            <?php endif; ?>

            <?php if (!empty($notifications['upcoming_tours'])): ?>
                <div class="notification-item warning">
                    <div>
                        <strong>Tour sắp khởi hành</strong><br>
                        <small><?= count($notifications['upcoming_tours']) ?> tour trong 7 ngày tới</small>
                    </div>
                    <a href="?controller=tour&action=index" class="badge warning">Xem</a>
                </div>
            <?php endif; ?>

            <?php if (!empty($notifications['contacts_need_response'])): ?>
                <div class="notification-item">
                    <div>
                        <strong>Liên hệ cần phản hồi</strong><br>
                        <small><?= count($notifications['contacts_need_response']) ?> liên hệ chưa xử lý</small>
                    </div>
                    <a href="?controller=contact&action=index" class="badge info">Xem</a>
                </div>
            <?php endif; ?>

            <?php if (!empty($notifications['tours_need_update'])): ?>
                <div class="notification-item warning">
                    <div>
                        <strong>Tour cần cập nhật</strong><br>
                        <small><?= count($notifications['tours_need_update']) ?> tour đã qua ngày khởi hành</small>
                    </div>
                    <a href="?controller=tour&action=index" class="badge warning">Xem</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tour phổ biến và Lịch trình -->
    <div class="dashboard-row">
        <!-- Tour được đặt nhiều nhất -->
        <div class="chart-container">
            <h3 class="section-title">🏆 Tour được đặt nhiều nhất</h3>
            <?php if (!empty($charts['popular_tours'])): ?>
                <ul class="popular-list">
                    <?php foreach ($charts['popular_tours'] as $index => $tour): ?>
                        <li class="popular-item">
                            <div>
                                <strong>#<?= $index + 1 ?> <?= htmlspecialchars($tour['TieuDe'] ?? '') ?></strong><br>
                                <small style="color: #7f8c8d;">📍 <?= htmlspecialchars($tour['DiemDen'] ?? '') ?></small>
                            </div>
                            <div style="text-align: right;">
                                <div class="badge success"><?= $tour['total_bookings'] ?? 0 ?> lượt đặt</div>
                                <small style="color: #27ae60;"><?= number_format($tour['total_revenue'] ?? 0) ?>đ</small>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="text-align: center; color: #7f8c8d; padding: 40px;">Chưa có dữ liệu booking</p>
            <?php endif; ?>
        </div>

        <!-- Lịch trình sắp tới -->
        <div class="notification-container">
            <h3 class="section-title">📅 Lịch trình tuần này</h3>
            
            <?php if (!empty($schedule['tours_this_week'])): ?>
                <h4 style="color: #3498db; margin-bottom: 15px;">🚌 Tour khởi hành</h4>
                <?php foreach (array_slice($schedule['tours_this_week'], 0, 3) as $tour): ?>
                    <div class="notification-item">
                        <div>
                            <strong><?= htmlspecialchars($tour['TieuDe'] ?? '') ?></strong><br>
                            <small>📅 <?= date('d/m/Y', strtotime($tour['NgayKhoiHanh'] ?? '')) ?></small>
                        </div>
                        <span class="badge info">
                            <?= $tour['DiemDen'] ?? '' ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($schedule['payments_due'])): ?>
                <h4 style="color: #e74c3c; margin: 20px 0 15px 0;">💳 Thanh toán đến hạn</h4>
                <?php foreach (array_slice($schedule['payments_due'], 0, 2) as $payment): ?>
                    <div class="notification-item urgent">
                        <div>
                            <strong><?= htmlspecialchars($payment['TenKhachHang'] ?? '') ?></strong><br>
                            <small>💰 <?= number_format($payment['SoTienThanhToan'] ?? 0) ?>đ</small>
                        </div>
                        <span class="badge danger">
                            <?= date('d/m', strtotime($payment['NgayThanhToan'] ?? '')) ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Biểu đồ booking theo danh mục -->
    <div class="dashboard-row">
        <div class="chart-container">
            <h3 class="section-title">🌍 Tỷ lệ booking theo danh mục</h3>
            <canvas id="categoryChart" style="max-height: 250px;"></canvas>
        </div>
        
        <div class="chart-container">
            <h3 class="section-title">📍 Điểm đến phổ biến</h3>
            <?php if (!empty($charts['popular_destinations'])): ?>
                <ul class="popular-list">
                    <?php foreach ($charts['popular_destinations'] as $index => $destination): ?>
                        <li class="popular-item">
                            <div>
                                <strong>📍 <?= htmlspecialchars($destination['DiemDen'] ?? '') ?></strong>
                            </div>
                            <div style="text-align: right;">
                                <div class="badge info"><?= $destination['total_bookings'] ?? 0 ?> booking</div>
                                <small style="color: #3498db;"><?= $destination['total_tours'] ?? 0 ?> tour</small>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="text-align: center; color: #7f8c8d; padding: 40px;">Chưa có dữ liệu điểm đến</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Truy cập nhanh -->
    <div class="chart-container">
        <h3 class="section-title">⚡ Truy cập nhanh</h3>
        <div class="quick-actions">
            <a href="?controller=tour&action=add" class="quick-action-btn" style="background: #3498db;">
                ➕ Thêm tour mới
            </a>
            <a href="?controller=order&action=index" class="quick-action-btn" style="background: #e74c3c;">
                📋 Quản lý đơn hàng
            </a>
            <a href="?controller=customer&action=index" class="quick-action-btn" style="background: #f39c12;">
                👥 Quản lý khách hàng
            </a>
            <a href="?controller=contact&action=index" class="quick-action-btn" style="background: #9b59b6;">
                📞 Xử lý liên hệ
            </a>
            <a href="?controller=payment&action=index" class="quick-action-btn" style="background: #27ae60;">
                💳 Quản lý thanh toán
            </a>
            <a href="?controller=news&action=add" class="quick-action-btn" style="background: #2ecc71;">
                📰 Thêm tin tức
            </a>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Biểu đồ doanh thu
const revenueCtx = document.getElementById('revenueChart').getContext('2d');
const revenueData = <?= json_encode($charts['monthly_revenue_chart'] ?? []) ?>;

new Chart(revenueCtx, {
    type: 'line',
    data: {
        labels: revenueData.map(item => item.month_label || ''),
        datasets: [{
            label: 'Doanh thu (VNĐ)',
            data: revenueData.map(item => item.revenue || 0),
            borderColor: '#27ae60',
            backgroundColor: 'rgba(39, 174, 96, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return new Intl.NumberFormat('vi-VN').format(value) + 'đ';
                    }
                }
            }
        }
    }
});

// Biểu đồ tỷ lệ booking theo danh mục
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
const categoryData = <?= json_encode($charts['booking_by_category'] ?? []) ?>;

new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: categoryData.map(item => item.category || ''),
        datasets: [{
            data: categoryData.map(item => item.total_bookings || 0),
            backgroundColor: ['#3498db', '#e74c3c', '#f39c12', '#27ae60'],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>


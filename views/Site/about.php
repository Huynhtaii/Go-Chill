<style>
.about-section {
    padding: 60px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
}

.about-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.about-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.about-subtitle {
    font-size: 1.2rem;
    margin-bottom: 40px;
    opacity: 0.9;
}

.about-content {
    background: white;
    color: #333;
    padding: 60px 0;
}

.content-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-bottom: 60px;
}

.about-text h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 20px;
}

.about-text p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
    margin-bottom: 20px;
}

.about-image {
    text-align: center;
}

.about-image img {
    max-width: 100%;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.features-section {
    background: #f8f9fa;
    padding: 60px 0;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    margin-top: 40px;
}

.feature-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    font-size: 3rem;
    color: #3498db;
    margin-bottom: 20px;
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 15px;
}

.feature-description {
    color: #666;
    line-height: 1.6;
}

.stats-section {
    background: #2c3e50;
    color: white;
    padding: 60px 0;
    text-align: center;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
    margin-top: 40px;
}

.stat-item {
    padding: 20px;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: #3498db;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 1.1rem;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .about-title {
        font-size: 2rem;
    }
    
    .about-text h2 {
        font-size: 2rem;
    }
}
</style>

<!-- Hero Section -->
<section class="about-section">
    <div class="about-container">
        <h1 class="about-title">Về GO & CHILL</h1>
        <p class="about-subtitle">Khám phá thế giới cùng chúng tôi - Nơi mọi chuyến đi đều trở thành kỷ niệm đáng nhớ</p>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="content-container">
        <div class="about-grid">
            <div class="about-text">
                <h2>Chúng tôi là ai?</h2>
                <p>GO & CHILL là công ty du lịch hàng đầu Việt Nam, chuyên cung cấp các dịch vụ du lịch chất lượng cao với hơn 10 năm kinh nghiệm trong ngành.</p>
                <p>Chúng tôi tự hào mang đến cho khách hàng những trải nghiệm du lịch tuyệt vời, từ những chuyến đi trong nước đến các hành trình khám phá thế giới.</p>
                <p>Với đội ngũ nhân viên chuyên nghiệp và tận tâm, chúng tôi cam kết mang đến dịch vụ tốt nhất và giá cả hợp lý nhất cho mọi khách hàng.</p>
            </div>
            <div class="about-image">
                <img src="public/img/logo.png" alt="GO & CHILL Travel Agency">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="content-container">
        <h2 style="text-align: center; font-size: 2.5rem; color: #2c3e50; margin-bottom: 20px;">Tại sao chọn chúng tôi?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🌟</div>
                <h3 class="feature-title">Chất lượng hàng đầu</h3>
                <p class="feature-description">Cam kết mang đến những dịch vụ du lịch chất lượng cao với giá cả hợp lý nhất.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3 class="feature-title">Đội ngũ chuyên nghiệp</h3>
                <p class="feature-description">Đội ngũ nhân viên giàu kinh nghiệm, tận tâm và luôn sẵn sàng hỗ trợ 24/7.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3 class="feature-title">Đa dạng điểm đến</h3>
                <p class="feature-description">Hơn 100+ điểm đến trong và ngoài nước, từ những thành phố sôi động đến những vùng đất hoang dã.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💎</div>
                <h3 class="feature-title">Giá cả cạnh tranh</h3>
                <p class="feature-description">Cam kết mang đến những tour du lịch chất lượng với giá cả cạnh tranh nhất thị trường.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="content-container">
        <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Thành tựu của chúng tôi</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">10+</div>
                <div class="stat-label">Năm kinh nghiệm</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50,000+</div>
                <div class="stat-label">Khách hàng hài lòng</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100+</div>
                <div class="stat-label">Điểm đến</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Hỗ trợ khách hàng</div>
            </div>
        </div>
    </div>
</section>

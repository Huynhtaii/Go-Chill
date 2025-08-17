<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - GO & CHILL TRAVEL AGENCY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/styleWeb.css">
</head>
<body>

<style>
/* =======================
   BỐ CỤC CHUNG
======================= */
.main-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    align-items: start;
}

.page-title {
    font-size: 36px;
    font-weight: bold;
    color: #0077aa;
    margin-bottom: 20px;
}

/* =======================
   LƯỚI TIN TỨC
======================= */
.articles-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.news-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    display: flex;
    flex-direction: column;
}

.news-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.news-content {
    padding: 15px;
}

.news-meta {
    display: flex;
    gap: 15px;
    font-size: 13px;
    color: #666;
    margin-bottom: 10px;
}

.news-meta i {
    color: #00a0a0;
}

.news-title {
    font-size: 18px;
    font-weight: bold;
    color: #0077aa;
    margin-bottom: 8px;
}

.news-excerpt {
    font-size: 14px;
    color: #444;
    margin-bottom: 15px;
}

.news-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.news-btn {
    padding: 6px 12px;
    background: #00a0a0;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.news-btn:hover {
    background: #008080;
}

/* =======================
   SIDEBAR
======================= */
.sidebar {
    background: #fff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border: 1px solid #e5e7eb;
    position: sticky;
    top: 20px;
}

.sidebar-title {
    font-size: 24px;
    font-weight: bold;
    color: #0077aa;
    margin-bottom: 15px;
    position: relative;
    padding-bottom: 10px;
}

.sidebar-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #0077aa, #00a0a0);
    border-radius: 2px;
}

.sidebar-divider {
    height: 1px;
    background: #ddd;
    margin-bottom: 15px;
}

.topic-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.topic-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.topic-link {
    text-decoration: none;
    color: #333 !important;
    font-weight: 500;
    font-size: 14px;
    transition: color 0.3s ease;
}

.topic-link:hover {
    color: #0077aa !important;
}

.topic-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
    transition: background-color 0.3s ease;
}

.topic-item:hover {
    background-color: #f8f9fa;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 6px;
}

.topic-item img {
    width: 16px;
    height: 16px;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.topic-item:hover img {
    opacity: 1;
}
</style>

<div class="container">

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <span class="current">Trang chủ</span>
        <span class="separator"></span>
        <span class="path">/ Tin tức</span>
    </div>
    
    <div class="main-content">
        
        <!-- Nội dung chính -->
        <div class="content-area">
            <h1 class="page-title">Tin tức</h1>
            <div class="articles-grid">
                <?php
                $db = Database::getInstance();
                $newsList = $db->getAll("SELECT * FROM tintuc ORDER BY NgayDang DESC LIMIT 8");

                if (!empty($newsList)) :
                    foreach ($newsList as $news) : ?>
                        <div class="news-card">
                            <div class="news-image">
                                <img src="public/img/<?= !empty($news['HinhDaiDien']) ? $news['HinhDaiDien'] : 'default-news.jpg' ?>" 
                                     alt="<?= htmlspecialchars($news['TieuDe']) ?>">
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-date">
                                        <i class="fa-solid fa-calendar"></i>
                                        <?= !empty($news['NgayDang']) ? date('d/m/Y', strtotime($news['NgayDang'])) : '' ?>
                                    </span>
                                    <span class="news-time">
                                        <i class="fa-solid fa-clock"></i>
                                    </span>
                                    <span class="news-comments">
                                        <i class="fa-solid fa-comment"></i>
                                        0 comments
                                    </span>
                                </div>
                                <h3 class="news-title"><?= htmlspecialchars($news['TieuDe']) ?></h3>
                                <p class="news-excerpt">
                                    <?= mb_substr(strip_tags($news['NoiDung']), 0, 100) . '...'; ?>
                                </p>
                                <div class="news-footer">
                                    <div class="news-author">
                                        <i class="fa-solid fa-user"></i>
                                        <span>admin</span>
                                    </div>
                                    <button class="news-btn">Chi Tiết</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else: ?>
                    <!-- Tin tức mặc định -->
                    <div class="news-card">
                        <div class="news-image">
                            <img src="https://images.unsplash.com/photo-1485738422979-f5c462d49f74?w=400&h=250&fit=crop" alt="New York">
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-date">
                                    <i class="fa-solid fa-calendar"></i>
                                    20/01/2025
                                </span>
                                <span class="news-time">
                                    <i class="fa-solid fa-clock"></i>
                                    10:02 AM
                                </span>
                                <span class="news-comments">
                                    <i class="fa-solid fa-comment"></i>
                                    38 comments
                                </span>
                            </div>
                            <h3 class="news-title">Top 10 địa điểm nên khám phá khi tới Mỹ</h3>
                            <p class="news-excerpt">
                                Đây là nội dung demo khi không có dữ liệu trong bảng tintuc...
                            </p>
                            <div class="news-footer">
                                <div class="news-author">
                                    <i class="fa-solid fa-user"></i>
                                    <span>admin</span>
                                </div>
                                <button class="news-btn">Chi Tiết</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="sidebar-title">Chủ đề</h2>
            <div class="sidebar-divider"></div>
            <ul class="topic-list">
                <li class="topic-item"><a href="#" class="topic-link">Kiến thức du lịch</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Khám phá vẻ đẹp Việt Nam</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Khám phá vẻ đẹp Châu Á</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Khám phá vẻ đẹp Châu Âu</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Khám phá vẻ đẹp Châu Mỹ</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Khám phá vẻ đẹp Châu Phi</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Khám phá vẻ đẹp Châu Úc</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Visa</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Cẩm nang du lịch</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
                <li class="topic-item"><a href="#" class="topic-link">Tin tức Go&Chill Travel</a><img src="public/img/img_arrow_right.svg" alt="Arrow"></li>
            </ul>
        </aside>
    </div>
</div>
</body>
</html>

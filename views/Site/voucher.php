<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher - GO & CHILL TRAVEL AGENCY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/styleWeb.css">
</head>
<body>

<style>
        /* Promotion Slider Styles */
.promotion-slider {
    position: relative;
    width: 100%;
    padding: 50px 20px;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
}
body.dark-mode .promotion-slider {
    background-color: #1f1f1f;
}
.promotion-wrapper {
    background: white;
    border-radius: 30px;
    padding: 40px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    width: 100%;
}
body.dark-mode .promotion-wrapper {
    background: #2d2d2d;
    box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1);
}
.promotion-container {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    padding: 10px 0;
    justify-content: center;
}
.promotion-slide {
    flex: 0 0 auto;
    width: 350px;
}
.promo-card {
    border-radius: 20px;
    overflow: hidden;
    height: 200px;
    position: relative;
    display: block;
    color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.promo-card:hover {
    transform: translateY(-5px);
}
.promo-card.blue {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
.promo-card.purple {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.promo-card.green {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    color: #333;
}
.promo-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.promo-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.promo-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    z-index: 2;
    background: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.3) 100%);
}
.promo-card.blue .promo-content {
    background: linear-gradient(135deg, rgba(79,172,254,0.8) 0%, rgba(0,242,254,0.6) 100%);
}
.promo-card.purple .promo-content {
    background: linear-gradient(135deg, rgba(102,126,234,0.8) 0%, rgba(118,75,162,0.6) 100%);
}
.promo-card.green .promo-content {
    background: linear-gradient(135deg, rgba(168,237,234,0.8) 0%, rgba(254,214,227,0.6) 100%);
}
.promo-badge {
    background: rgba(255, 255, 255, 0.3);
    padding: 4px 8px;
    border-radius: 10px;
    font-size: 12px;
    width: fit-content;
    margin-bottom: 10px;
    backdrop-filter: blur(10px);
}
.promo-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 8px;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.promo-description {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 10px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}
.promo-date {
    font-size: 0.8rem;
    opacity: 0.8;
    margin-bottom: 10px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}
.promo-qr {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 8px;
    padding: 5px;
    align-self: flex-start;
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}
.promo-qr img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Discount Section Styles */
.discount-section {
    padding: 50px 20px;
    background-color: #fff;
    transition: background-color 0.3s ease;
}
body.dark-mode .discount-section {
    background-color: #1a1a1a;
}
.discount-container {
    max-width: 1200px;
    margin: 0 auto;
}
.discount-main-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}
body.dark-mode .discount-main-title {
    color: white;
}
.discount-subtitle {
    color: #666;
    margin-bottom: 30px;
}
body.dark-mode .discount-subtitle {
    color: #ccc;
}
.payment-methods {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
    justify-content: center;
}
.payment-btn {
    padding: 12px 20px;
    border-radius: 25px;
    background-color: #e5e7eb;
    color: #374151;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}
.payment-btn.active {
    background-color: #3b82f6;
    color: white;
}
.payment-btn.zalopay {
    background-color: #0891b2;
    color: white;
}
.payment-btn.vnpay {
    background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
    color: white;
}
body.dark-mode .payment-btn {
    background-color: #4a4a4a;
    color: white;
}
.discount-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}
.discount-card {
    background: #f8fafc;
    border-radius: 15px;
    padding: 20px;
    position: relative;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.discount-card:hover {
    transform: translateY(-5px);
}
.discount-card.expired {
    opacity: 0.6;
    filter: grayscale(30%);
}
.discount-card.expired:hover {
    transform: none;
}
body.dark-mode .discount-card {
    background: #2d2d2d;
}
.discount-icon {
    width: 50px;
    height: 50px;
    background-color: #3b82f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-bottom: 15px;
}
.discount-content h3 {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}
body.dark-mode .discount-content h3 {
    color: white;
}
.discount-content p {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 15px;
    line-height: 1.5;
}
body.dark-mode .discount-content p {
    color: #ccc;
}
.discount-code {
    display: flex;
    align-items: center;
    gap: 10px;
    background: white;
    padding: 10px;
    border-radius: 8px;
    border: 1px dashed #3b82f6;
}
body.dark-mode .discount-code {
    background: #3d3d3d;
    border-color: #22d3ee;
}
.discount-code span {
    font-family: monospace;
    font-weight: bold;
    color: #3b82f6;
}
body.dark-mode .discount-code span {
    color: #22d3ee;
}
.copy-btn {
    background: #3b82f6;
    color: white;
    border: none;
    padding: 5px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.8rem;
    transition: background-color 0.3s;
}
.copy-btn:hover {
    background: #2563eb;
}
body.dark-mode .copy-btn {
    background: #22d3ee;
    color: #1a1a1a;
}
.sale-tag {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #ef4444;
    color: white;
    padding: 4px 8px;
    border-radius: 5px;
    font-size: 0.7rem;
    font-weight: bold;
}
.sale-tag.expired {
    background: #6b7280;
}
.hunt-more-btn {
    width: auto;
    background: #3b82f6;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
    cursor: pointer;
    margin-bottom: 40px;
    transition: background-color 0.3s;
    display: inline-block;
}
.hunt-more-btn:hover {
    background: #2563eb;
}
body.dark-mode .hunt-more-btn {
    background: #22d3ee;
    color: #1a1a1a;
}
.special-offers {
    background: #f8fafc;
    border-radius: 15px;
    padding: 30px;
}
body.dark-mode .special-offers {
    background: #2d2d2d;
}
.special-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}
body.dark-mode .special-title {
    color: white;
}
.special-cards {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 15px;
    max-width: 1400px;
    margin: 0 auto;
}

@media (max-width: 1200px) {
    .special-cards {
        grid-template-columns: repeat(5, 1fr);
    }
}

@media (max-width: 1024px) {
    .special-cards {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .special-cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .special-cards {
        grid-template-columns: 1fr;
    }
}
.special-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
body.dark-mode .special-card {
    background: #3d3d3d;
}
.special-icon {
    width: 40px;
    height: 40px;
    background-color: #10b981;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-bottom: 15px;
}
.special-content h4 {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}
body.dark-mode .special-content h4 {
    color: white;
}
.special-content p {
    color: #666;
    font-size: 0.85rem;
    margin-bottom: 15px;
    line-height: 1.4;
}
body.dark-mode .special-content p {
    color: #ccc;
}

/* Web Deal Banner Styles */
.web-deal-banner {
    padding: 30px 20px;
    background-color: #f8f9fa;
}
body.dark-mode .web-deal-banner {
    background-color: #1f1f1f;
}
.web-deal-container {
    max-width: 1200px;
    margin: 0 auto;
    background: linear-gradient(135deg, #16a085 0%, #1abc9c 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px 40px;
    color: white;
    position: relative;
    overflow: hidden;
}
.web-deal-content {
    flex: 1;
}
.web-deal-title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
}
.web-deal-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
}
.web-deal-pattern {
    position: absolute;
    right: 200px;
    top: 0;
    width: 200px;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
    opacity: 0.3;
}
.web-deal-qr {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}
.web-deal-qr img {
    width: 80px;
    height: 80px;
    background: white;
    padding: 8px;
    border-radius: 10px;
}
.app-download-btn {
    background: #e74c3c;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 25px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}
.app-download-btn:hover {
    background: #c0392b;
}

/* Disney Cruise Section Styles */
.disney-cruise-section {
    padding: 50px 20px;
    background-color: #fff;
}
body.dark-mode .disney-cruise-section {
    background-color: #1a1a1a;
}
.disney-container {
    max-width: 1200px;
    margin: 0 auto;
}
.disney-main-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
}
body.dark-mode .disney-main-title {
    color: white;
}
.cruise-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.cruise-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.cruise-card:hover {
    transform: translateY(-5px);
}
body.dark-mode .cruise-card {
    background: #2d2d2d;
}
.cruise-image {
    position: relative;
    height: 180px;
    overflow: hidden;
}
.cruise-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.cruise-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #f39c12;
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: bold;
}
.cruise-content {
    padding: 15px;
}
.cruise-content h3 {
    font-size: 0.9rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
    line-height: 1.3;
}
body.dark-mode .cruise-content h3 {
    color: white;
}
.cruise-prices {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.current-price {
    font-size: 1rem;
    font-weight: bold;
    color: #e74c3c;
}
.original-price {
    font-size: 0.85rem;
    color: #999;
    text-decoration: line-through;
}
body.dark-mode .original-price {
    color: #666;
}

/* Travel Categories Section Styles */
.travel-categories-section {
    padding: 50px 20px;
    background-color: #fff;
}
body.dark-mode .travel-categories-section {
    background-color: #1a1a1a;
}
.categories-container {
    max-width: 1200px;
    margin: 0 auto;
}
.categories-main-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 40px;
    color: #333;
    text-align: left;
}
body.dark-mode .categories-main-title {
    color: white;
}
.main-categories {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}
.category-card {
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    height: 200px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    cursor: pointer;
}
.category-card:hover {
    transform: translateY(-5px);
}
.category-card.large {
    height: 200px;
}
.category-image {
    width: 100%;
    height: 100%;
    position: relative;
}
.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.category-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    padding: 30px 20px 20px;
    color: white;
}
.category-content h3 {
    font-size: 1.2rem;
    font-weight: bold;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.service-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: flex-start;
}
.service-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}
.service-btn.light-blue {
    background-color: #e1f5fe;
    color: #0277bd;
}
.service-btn.blue {
    background-color: #2196f3;
    color: white;
}
.service-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
body.dark-mode .service-btn.light-blue {
    background-color: #1e3a8a;
    color: #93c5fd;
}
body.dark-mode .service-btn.blue {
    background-color: #3b82f6;
    color: white;
}

/* See All Deals Section Styles */
.see-all-deals-section {
    padding: 40px 20px;
    background-color: #f8f9fa;
}
body.dark-mode .see-all-deals-section {
    background-color: #1f1f1f;
}
.deals-container {
    max-width: 1200px;
    margin: 0 auto;
}
.deals-cards-row {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    justify-content: center;
}
.deal-card {
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    height: 180px;
    width: 350px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    cursor: pointer;
}
.deal-card:hover {
    transform: translateY(-5px);
}
.deal-card.mega-sale {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}
.deal-card.mystery-bag {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}
.deal-card.korea-deal {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    color: #333;
}
.deal-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 20px;
    z-index: 3;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.6) 100%);
}
.deal-card.mega-sale .deal-content {
    background: linear-gradient(135deg, rgba(79,172,254,0.7) 0%, rgba(0,242,254,0.8) 100%);
}
.deal-card.mystery-bag .deal-content {
    background: linear-gradient(135deg, rgba(102,126,234,0.7) 0%, rgba(118,75,162,0.8) 100%);
}
.deal-card.korea-deal .deal-content {
    background: linear-gradient(135deg, rgba(168,237,234,0.6) 0%, rgba(254,214,227,0.7) 100%);
}
.deal-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.deal-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.deal-badge {
    background: rgba(255, 255, 255, 0.3);
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 11px;
    width: fit-content;
    margin-bottom: 10px;
    backdrop-filter: blur(10px);
}
.deal-badge.purple {
    background: rgba(255, 255, 255, 0.2);
}
.deal-badge.green {
    background: rgba(51, 51, 51, 0.2);
    color: #333;
}
.deal-logo {
    margin-bottom: 10px;
}
.mega-text, .sale-text {
    font-size: 1.8rem;
    font-weight: bold;
    display: block;
    line-height: 0.8;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #ffd700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.deal-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin: 0 0 10px 0;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.deal-description {
    font-size: 0.9rem;
    margin: 0 0 10px 0;
    line-height: 1.3;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}
.deal-period {
    font-size: 0.85rem;
    margin-bottom: 10px;
    opacity: 0.9;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}
.deal-terms {
    font-size: 0.75rem;
    opacity: 0.8;
    text-decoration: underline;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}
.see-all-deals-button-container {
    display: flex;
    justify-content: center;
}
.see-all-deals-btn {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
    padding: 15px 40px;
    border: none;
    border-radius: 30px;
    font-size: 1.1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
}
.see-all-deals-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
}
body.dark-mode .see-all-deals-btn {
    background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
}

/* Mobile App Showcase Section */
.mobile-app-showcase {
    padding: 80px 20px;
    background: url('public/img/bg.png') center/cover no-repeat;
    position: relative;
    overflow: hidden;
}
.mobile-app-showcase::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
    pointer-events: none;
}
.showcase-container {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}
.showcase-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}
.app-preview {
    display: flex;
    justify-content: center;
}
.phone-mockup {
    width: 280px;
    height: 560px;
    background: #1a1a1a;
    border-radius: 35px;
    padding: 8px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    position: relative;
}
.phone-screen {
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 28px;
    overflow: hidden;
    position: relative;
}
.app-header {
    padding: 15px;
    background: #f8f9fa;
}
.status-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    font-size: 12px;
    font-weight: bold;
}
.time {
    color: #000;
}
.signal-wifi {
    display: flex;
    gap: 5px;
    align-items: center;
}
.location-bar {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 15px;
    color: #22d3ee;
    font-size: 12px;
    font-weight: 500;
}
.search-bar input {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #e1e5e9;
    border-radius: 20px;
    font-size: 14px;
    background: #f1f3f4;
}
.app-content {
    padding: 20px 15px;
    height: calc(100% - 100px);
    overflow-y: auto;
}
.section-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}
.trip-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.trip-item {
    display: flex;
    gap: 12px;
    padding: 15px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}
.trip-item:hover {
    transform: translateY(-2px);
}
.trip-item.featured {
    background: linear-gradient(135deg, #e3f2fd, #f1f8e9);
    border: 2px solid #22d3ee;
}
.trip-image {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}
.trip-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.trip-info {
    flex: 1;
    min-width: 0;
}
.trip-info h4 {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 4px;
    color: #333;
}
.trip-date, .trip-rating {
    font-size: 11px;
    color: #666;
    margin-bottom: 3px;
}
.trip-members {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 10px;
    color: #888;
}
.member-avatars {
    display: flex;
    gap: 2px;
}
.avatar {
    font-size: 12px;
}
.trip-price {
    display: flex;
    align-items: flex-start;
    padding-top: 5px;
}
.price-badge {
    background: #22d3ee;
    color: white;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: bold;
}
.price-badge.free {
    background: #10b981;
}
.showcase-text {
    color: white;
}
.showcase-title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    line-height: 1.2;
}
.showcase-description {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 30px;
    opacity: 0.9;
}
.feature-list {
    list-style: none;
    margin-bottom: 40px;
}
.feature-list li {
    padding: 8px 0;
    font-size: 1rem;
    opacity: 0.9;
}
.download-buttons {
    display: flex;
    gap: 15px;
}
.download-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}
.download-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
}
.btn-icon {
    font-size: 24px;
}
.btn-text {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.btn-text small {
    font-size: 11px;
    opacity: 0.8;
}
.btn-text strong {
    font-size: 14px;
    font-weight: bold;
}

/* Footer Styles */
.footer {
    background-color: #f8fafc;
    padding: 50px 0 30px;
    margin-top: 50px;
    border-top: 1px solid #e5e7eb;
    transition: background-color 0.3s ease;
}
body.dark-mode .footer {
    background-color: #1a1a1a;
    border-top-color: #4a5568;
}
.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}
.footer-content {
    display: grid;
    grid-template-columns: 300px repeat(4, 1fr);
    gap: 40px;
}
.footer-section h3 {
    color: #0891b2;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
}
body.dark-mode .footer-section h3 {
    color: #22d3ee;
}
.footer-logo img {
    width: 150px;
    height: auto;
    margin-bottom: 20px;
}
.footer-contact {
    margin-bottom: 30px;
}
.contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
    color: #6b7280;
    font-size: 14px;
}
body.dark-mode .contact-item {
    color: #9ca3af;
}
.contact-item i {
    color: #0891b2;
    width: 16px;
}
body.dark-mode .contact-item i {
    color: #22d3ee;
}
.footer-social h4 {
    color: #374151;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
}
body.dark-mode .footer-social h4 {
    color: #d1d5db;
}
.social-links {
    display: flex;
    gap: 10px;
}
.social-link {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: transform 0.3s ease;
    font-size: 16px;
}
.social-link:hover {
    transform: translateY(-2px);
}
.social-link:nth-child(1) {
    background-color: #0088cc;
}
.social-link:nth-child(2) {
    background-color: #1877f2;
}
.social-link:nth-child(3) {
    background-color: #1da1f2;
}
.social-link:nth-child(4) {
    background-color: #ff0000;
}
.footer-links {
    list-style: none;
    padding: 0;
}
.footer-links li {
    margin-bottom: 12px;
}
.footer-links a {
    color: #6b7280;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}
.footer-links a:hover {
    color: #0891b2;
}
body.dark-mode .footer-links a {
    color: #9ca3af;
}
body.dark-mode .footer-links a:hover {
    color: #22d3ee;
}
.footer-contact-number {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}
body.dark-mode .footer-contact-number {
    border-top-color: #4a5568;
}
.footer-contact-number .contact-item {
    font-size: 16px;
}
.footer-contact-number strong {
    color: #0891b2;
    font-weight: 700;
}
body.dark-mode .footer-contact-number strong {
    color: #22d3ee;
}
.footer-map {
    margin: 20px 0;
}
.footer-map h4 {
    color: #374151;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
}
body.dark-mode .footer-map h4 {
    color: #d1d5db;
}
.map-container {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
.map-container:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}
body.dark-mode .map-container {
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
}
body.dark-mode .map-container:hover {
    box-shadow: 0 6px 20px rgba(255, 255, 255, 0.15);
}
.map-container iframe {
    filter: grayscale(0.2);
    transition: filter 0.3s ease;
    height: 200px;
}
.map-container:hover iframe {
    filter: grayscale(0);
}
body.dark-mode .map-container iframe {
    filter: grayscale(0.3) invert(0.05);
}
body.dark-mode .map-container:hover iframe {
    filter: grayscale(0.1) invert(0.05);
}

/* Responsive cho các section riêng */
@media (max-width: 1200px) {
    .cruise-cards {
        grid-template-columns: repeat(3, 1fr);
    }
    .deals-cards-row {
        flex-wrap: wrap;
        justify-content: center;
    }
    .deal-card {
        width: 320px;
    }
}
@media (max-width: 1024px) {
    .main-categories {
        grid-template-columns: repeat(2, 1fr);
    }
    .footer-content {
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .footer-section:first-child {
        grid-column: 1 / -1;
    }
}
@media (max-width: 900px) {
    .cruise-cards {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 768px) {
    .banner {
        height: 300px;
    }
    .banner-title {
        font-size: 2rem;
    }
    .banner-subtitle {
        font-size: 1rem;
    }
    .banner-btn {
        padding: 12px 25px;
        font-size: 14px;
    }
    .promotion-wrapper {
        padding: 20px;
        border-radius: 20px;
    }
    .promotion-container {
        gap: 15px;
        padding: 0 10px;
    }
    .promotion-slide {
        width: 300px;
    }
    .promo-card {
        height: 180px;
    }
    .promo-content {
        padding: 15px;
    }
    .promo-title {
        font-size: 1.1rem;
    }
    .promo-image {
        flex: 0 0 100px;
    }
    .discount-main-title {
        font-size: 1.5rem;
    }
    .payment-methods {
        gap: 10px;
    }
    .payment-btn {
        padding: 10px 15px;
        font-size: 0.9rem;
    }
    .discount-cards {
        grid-template-columns: 1fr;
    }
    .special-cards {
        grid-template-columns: 1fr;
    }
    .web-deal-container {
        flex-direction: column;
        text-align: center;
        padding: 25px;
        gap: 20px;
    }
    .web-deal-title {
        font-size: 2rem;
    }
    .web-deal-pattern {
        display: none;
    }
    .disney-main-title {
        font-size: 1.5rem;
    }
    .cruise-cards {
        grid-template-columns: 1fr;
    }
    .cruise-image {
        height: 180px;
    }
    .categories-main-title {
        font-size: 1.5rem;
        margin-bottom: 30px;
    }
    .main-categories {
        grid-template-columns: 1fr;
        gap: 15px;
        margin-bottom: 25px;
    }
    .category-card {
        height: 150px;
    }
    .category-content h3 {
        font-size: 1rem;
    }
    .service-buttons {
        gap: 10px;
    }
    .service-btn {
        padding: 10px 16px;
        font-size: 0.8rem;
    }
    .deals-cards-row {
        flex-direction: column;
        align-items: center;
    }
    .deal-card {
        width: 100%;
        max-width: 350px;
        height: 160px;
    }
    .deal-content {
        padding: 15px;
    }
    .mega-text, .sale-text {
        font-size: 1.5rem;
    }
    .number {
        font-size: 2rem;
    }
    .deal-title {
        font-size: 1.1rem;
    }
    .see-all-deals-btn {
        padding: 12px 30px;
        font-size: 1rem;
    }
    .footer-content {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    .footer {
        padding: 30px 0 20px;
    }
    .footer-section h3 {
        font-size: 16px;
        margin-bottom: 15px;
    }
    .social-links {
        justify-content: flex-start;
    }
    .map-container iframe {
        height: 180px;
    }
    .footer-map {
        margin: 15px 0;
    }
    .mobile-app-showcase {
        padding: 50px 20px;
    }
    .showcase-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    .showcase-title {
        font-size: 2rem;
    }
    .showcase-description {
        font-size: 1rem;
    }
    .phone-mockup {
        width: 250px;
        height: 500px;
    }
    .download-buttons {
        justify-content: center;
        flex-wrap: wrap;
    }
    .download-btn {
        padding: 10px 16px;
    }
    .btn-text small {
        font-size: 10px;
    }
    .btn-text strong {
        font-size: 12px;
    }
}
@media (max-width: 480px) {
    .main-categories {
        grid-template-columns: 1fr;
    }
    .service-buttons {
        justify-content: center;
    }
    .phone-mockup {
        width: 220px;
        height: 440px;
    }
    .showcase-title {
        font-size: 1.5rem;
    }
    .feature-list li {
        font-size: 0.9rem;
    }
    .map-container iframe {
        height: 150px;
    }
}
    </style>
    <!-- Promotion Slider Section -->
    <section class="promotion-slider">
        <div class="promotion-wrapper">
            <div class="promotion-container">
                <div class="promotion-slide">
                    <div class="promo-card blue">
                        <div class="promo-content">
                            <div class="promo-badge">27.5 - 9.6</div>
                            <h2 class="promo-title">Mega Sale 6.6</h2>
                            <p class="promo-description">Mã công đoàn lên đến 6 triệu VND</p>
                            <div class="promo-qr">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" alt="QR Code">
                            </div>
                        </div>
                        <div class="promo-image">
                            <img src="https://cdn2.unrealengine.com/en-mega-sale-launch-blog-16x9-1920x1080-52a48606eb5a.jpg" alt="Beach Promotion">
                        </div>
                    </div>
                </div>

                <div class="promotion-slide">
                    <div class="promo-card purple">
                        <div class="promo-content">
                            <h2 class="promo-title">Quét QR Xế túi mù</h2>
                            <p class="promo-description">Săn mã công đoàn giảm đến 6 triệu VND</p>
                            <div class="promo-date">16.05-09.06</div>
                            <div class="promo-qr">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" alt="QR Code">
                            </div>
                        </div>
                        <div class="promo-image">
                            <img src="https://phuongnamvina.com/img_data/images/flash-sale-la-gi-bi-quyet-bung-no-doanh-so-voi-flash-sale.jpg" alt="Mystery Bag">
                        </div>
                    </div>
                </div>

                <div class="promotion-slide">
                    <div class="promo-card green">
                        <div class="promo-content">
                            <h2 class="promo-title">Bay Hàn mê ly Deal hè hết ý</h2>
                            <p class="promo-description">Ưu đãi đến 2.7 Triệu</p>
                            <div class="promo-qr">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" alt="QR Code">
                            </div>
                        </div>
                        <div class="promo-image">
                            <img src="https://images2.thanhnien.vn/528068263637045248/2023/3/29/traveloka-1-1680069800764363421438.jpg" alt="Korea Travel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Codes Section -->
    <section class="discount-section">
        <div class="discount-container">
            <h2 class="discount-main-title">Mã giảm 6.6 công đoàn đến 6 triệu</h2>
            <p class="discount-subtitle">Chỉ áp dụng trên App!</p>
            
            <!-- Payment Methods -->
            <div class="payment-methods">
                <div class="payment-btn active">Khách Sạn</div>
                <div class="payment-btn">Vé máy bay</div>
                <div class="payment-btn">Vé vui chơi</div>
                <div class="payment-btn">Điểm đến hot</div>
                <div class="payment-btn zalopay">ZaloPay</div>
                <div class="payment-btn vnpay">VNPAY</div>
            </div>

            <!-- Discount Cards -->
                <div class="discount-cards">
                <?php
                // Lấy danh sách voucher từ database
                include_once __DIR__ . '/../../database.php';
                $db = Database::getInstance();
                
                // Lấy danh sách voucher từ database
                try {
                    $voucherList = $db->getAll("SELECT * FROM voucher WHERE TrangThai = 1 ORDER BY NgayBatDau DESC LIMIT 5");
                } catch (Exception $e) {
                    $voucherList = [];
                }
                
                if (!empty($voucherList)) :
                    foreach ($voucherList as $voucher) : 
                        // Calculate expiry status first
                        $now = strtotime(date('Y-m-d H:i:s'));
                        $end = strtotime($voucher['NgayKetThuc']);
                        $diff = $end - $now;
                        ?>
                        <div class="discount-card <?= ($diff < 0) ? 'expired' : '' ?>">
                            <div class="discount-icon">
                                <i class="fa-solid fa-gift"></i>
                            </div>
                            <div class="discount-content">
                                <h3><?= htmlspecialchars($voucher['TenVoucher']) ?></h3>
                                <p><?= nl2br(htmlspecialchars($voucher['MoTa'])) ?></p>
                                <div class="discount-code">
                                    <span><?= htmlspecialchars($voucher['MaVoucher']) ?></span>
                                    <button class="copy-btn" data-code="<?= htmlspecialchars($voucher['MaVoucher']) ?>">Copy</button>
                                </div>
                            </div>
                            <span class="sale-tag <?= ($diff < 0) ? 'expired' : '' ?>">
                                <?php
                                if ($diff < 0) echo 'Hết hạn';
                                elseif ($diff < 86400) echo 'Sắp hết mã';
                                else echo 'Còn hạn';
                                ?>
                            </span>
                        </div>
                <?php 
                endforeach;
                else: ?>
                    <!-- Nếu không có voucher, giữ nguyên HTML cũ -->
                    <div class="discount-card">
                        <div class="discount-icon">
                            <i class="fa-solid fa-plane"></i>
                        </div>
                        <div class="discount-content">
                            <h3>Giảm đến 600k cho nội địa</h3>
                            <p>Giảm đến 200k, đặt từ 2.2 triệu<br>Giảm đến 600k, đặt từ 3 triệu</p>
                            <div class="discount-code">
                                <span>KSMEGA66VN</span>
                                <button class="copy-btn" data-code="KSMEGA66VN">Copy</button>
                            </div>
                        </div>
                        <span class="sale-tag">Sắp hết mã</span>
                    </div>
                <?php endif; ?>

                

            <button class="hunt-more-btn">Săn thêm mã cộng dồn <i class="fa-solid fa-arrow-right"></i></button>

            <!-- Special Offers -->
            <div class="special-offers">
                <h3 class="special-title"><i class="fa-solid fa-gift"></i> Mã Ưu Đãi Tặng Bạn Mới</h3>
                
                <div class="special-cards">

                    <div class="special-card">
                        <div class="special-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="special-content">
                            <h4>8% giảm giá hoạt động Du lịch</h4>
                            <p>Áp dụng cho lần đặt đầu tiên trên web GO & CHILL</p>
                            <div class="discount-code">
                                <span>KSMEGAFS66VN</span>
                                <button class="copy-btn" data-code="KSMEGAFS66VN">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="special-card">
                        <div class="special-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="special-content">
                            <h4>8% giảm giá hoạt động Du lịch</h4>
                            <p>Áp dụng cho lần đặt đầu tiên trên web GO & CHILL</p>
                            <div class="discount-code">
                                <span>KSMEGAFS66VN</span>
                                <button class="copy-btn" data-code="KSMEGAFS66VN">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="special-card">
                        <div class="special-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="special-content">
                            <h4>8% giảm giá hoạt động Du lịch</h4>
                            <p>Áp dụng cho lần đặt đầu tiên trên web GO & CHILL</p>
                            <div class="discount-code">
                                <span>KSMEGAFS66VN</span>
                                <button class="copy-btn" data-code="KSMEGAFS66VN">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="special-card">
                        <div class="special-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="special-content">
                            <h4>8% giảm giá hoạt động Du lịch</h4>
                            <p>Áp dụng cho lần đặt đầu tiên trên web GO & CHILL</p>
                            <div class="discount-code">
                                <span>KSMEGAFS66VN</span>
                                <button class="copy-btn" data-code="KSMEGAFS66VN">Copy</button>
                            </div>
                        </div>
                    </div>
                    

                    <div class="special-card">
                        <div class="special-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="special-content">
                            <h4>8% giảm giá hoạt động Du lịch</h4>
                            <p>Áp dụng cho lần đặt đầu tiên trên web GO & CHILL</p>
                            <div class="discount-code">
                                <span>KSMEGAFS66VN</span>
                                <button class="copy-btn" data-code="KSMEGAFS66VN">Copy</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- Web Deal Banner -->
    <section class="web-deal-banner">
        <div class="web-deal-container">
            <div class="web-deal-content">
                <h2 class="web-deal-title">Deal xịn chỉ trên WEB</h2>
                <p class="web-deal-subtitle">Giảm đến 690k cho bạn mới</p>
                <div class="web-deal-pattern"></div>
            </div>
            <div class="web-deal-qr">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" alt="QR Code">
                <button class="app-download-btn">Quét Mã Tải APP</button>
            </div>
        </div>
    </section>

    <!-- Disney Cruise Section -->
    <section class="disney-cruise-section">
        <div class="disney-container">
            <h2 class="disney-main-title">Đặt vé Disney Adventure Cruise ngay</h2>
            
            <div class="cruise-cards">
                <div class="cruise-card">
                    <div class="cruise-image">
                        <img src="https://lh4.googleusercontent.com/proxy/_EMCOesIaaKaN43KOINsU1NLnGQpopnFhecuEfN8iLqlsFvuGItJxx7DmOwejbHlXdHflblR5p0U8F10Hgev4ekjsz4I0_n-6IcWHpZIJvGuDLrjHIKZ8Bcg3CJbHm_EeEUZk_kkgo0" alt="Singapore Marina Bay">
                        <div class="cruise-badge">Vịnh Mariana</div>
                    </div>
                    <div class="cruise-content">
                        <h3>4N3Đ Chuyến du ngoạn đầu tiên từ Singapore trên tàu Disney Adventure</h3>
                        <div class="cruise-prices">
                            <span class="current-price">15.990.990 VND</span>
                            <span class="original-price">20.120.990 VND</span>
                        </div>
                    </div>
                </div>

                <div class="cruise-card">
                    <div class="cruise-image">
                        <img src="https://vj-prod-website-cms.s3.ap-southeast-1.amazonaws.com/shutterstock1060601222huge-1676551521278.jpg" alt="Singapore Night">
                        <div class="cruise-badge">Vịnh Mariana</div>
                    </div>
                    <div class="cruise-content">
                        <h3>4N3Đ Chuyến du ngoạn đầu tiên từ Singapore trên tàu Disney Adventure</h3>
                        <div class="cruise-prices">
                            <span class="current-price">25.990.990 VND</span>
                            <span class="original-price">19.990.990 VND</span>
                        </div>
                    </div>
                </div>

                <div class="cruise-card">
                    <div class="cruise-image">
                        <img src="https://a.travel-assets.com/findyours-php/viewfinder/images/res70/542000/542607-singapore.jpg" alt="Singapore Merlion">
                        <div class="cruise-badge">Vịnh Mariana</div>
                    </div>
                    <div class="cruise-content">
                        <h3>5N4Đ Chuyến du ngoạn từ Singapore trên tàu Disney Adventure</h3>
                        <div class="cruise-prices">
                            <span class="current-price">11.990.990 VND</span>
                            <span class="original-price">15.990.990 VND</span>
                        </div>
                    </div>
                </div>

                <div class="cruise-card">
                    <div class="cruise-image">
                        <img src="https://thuanphongtravel.vn/wp-content/uploads/2024/04/SINGAPORE.jpeg" alt="Singapore Gardens">
                        <div class="cruise-badge">Vịnh Mariana</div>
                    </div>
                    <div class="cruise-content">
                        <h3>6N5Đ Chuyến du ngoạn từ Singapore trên tàu Disney Adventure</h3>
                        <div class="cruise-prices">
                            <span class="current-price">28.990.990 VND</span>
                            <span class="original-price">35.990.990 VND</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Travel Categories Section -->
    <section class="travel-categories-section">
        <div class="categories-container">
            <h2 class="categories-main-title">Nâng tầm chuyến đi theo cách bạn muốn</h2>
            
            <!-- Main Category Cards -->
            <div class="main-categories">
                <div class="category-card large">
                    <div class="category-image">
                        <img src="https://lh6.googleusercontent.com/proxy/i8z9g8RTfmUJBqaR7vfdUkA4j2s3rK6rfEst39xv9smziG1Lmg3A3tOjKnd2E65b2jr4bygSsXGfc89_IlrTOYeM-pZSXllAFje2btIu36SwoYJSwK76kQ" alt="Travel and Sightseeing">
                    </div>
                    <div class="category-content">
                        <h3>Chuyến đi và Danh Thắng</h3>
                    </div>
                </div>

                <div class="category-card large">
                    <div class="category-image">
                        <img src="https://avo-simfree.com/wp-content/uploads/2023/12/family-vacation-quotes-and-caption-ideas.png" alt="Fun Activities">
                    </div>
                    <div class="category-content">
                        <h3>FUN ACTIVITIES</h3>
                    </div>
                </div>

                <div class="category-card large">
                    <div class="category-image">
                        <img src="https://cdnmedia.baotintuc.vn/Upload/r2ZmuVn2vsFEWUzMUAXAg/files/2024/01/Visa%20Instalments%20-%20Education.jpg" alt="Book in Advance">
                    </div>
                    <div class="category-content">
                        <h3>Đặt trước trả sau</h3>
                    </div>
                </div>
            </div>

            <!-- Service Buttons -->
            <div class="service-buttons">
                <button class="service-btn light-blue">Vé máy bay</button>
                <button class="service-btn light-blue">Khách Sạn</button>
                <button class="service-btn blue">Bus&Shuttle</button>
                <button class="service-btn light-blue">Đưa đón sân bay</button>
                <button class="service-btn light-blue">Điểm tham quan</button>
            </div>
        </div>
    </section>
    <!-- See All Deals Section -->
    <section class="see-all-deals-section">
        <div class="deals-container">
            <!-- Promotion Cards Row -->
            <div class="deals-cards-row">
                <div class="deal-card mega-sale">
                    <div class="deal-content">
                        <div class="deal-badge">27.5 - 9.6</div>
                        <div class="deal-logo">
                            <span class="mega-text">Mega</span>
                            <span class="sale-text">Sale</span>
                            <span class="number">6.6</span>
                        </div>
                        <p class="deal-description">NGÀY ĐÔI SALE BỐI<br>Mã cộng dồn đến <strong>6 triệu</strong></p>
                        <div class="deal-terms">Điều khoản áp dụng</div>
                    </div>
                    <div class="deal-image">
                        <img src="https://cdn2.unrealengine.com/en-mega-sale-launch-blog-16x9-1920x1080-52a48606eb5a.jpg" alt="Mega Sale Beach">
                    </div>
                </div>

                <div class="deal-card mystery-bag">
                    <div class="deal-content">
                        <div class="deal-badge purple">Mega Sale 6.6</div>
                        <h3 class="deal-title">Xế túi mù mỗi ngày</h3>
                        <p class="deal-description">Săn mã cộng dồn<br>giảm đến <strong>6 triệu VND</strong></p>
                        <div class="deal-period">16.05 - 09.06</div>
                        <div class="deal-terms">Điều khoản áp dụng</div>
                    </div>
                    <div class="deal-image">
                        <img src="https://phuongnamvina.com/img_data/images/flash-sale-la-gi-bi-quyet-bung-no-doanh-so-voi-flash-sale.jpg" alt="Mystery Bag">
                    </div>
                </div>

                <div class="deal-card korea-deal">
                    <div class="deal-content">
                        <div class="deal-badge green">TỔNG CỤC DU LỊCH HÀN QUỐC</div>
                        <h3 class="deal-title">Bay Hàn mê ly<br>Deal hè hết ý</h3>
                        <p class="deal-description">Ưu đãi đến <strong>2.7 Triệu</strong></p>
                        <div class="deal-terms">Điều khoản áp dụng</div>
                    </div>
                    <div class="deal-image">
                        <img src="https://images2.thanhnien.vn/528068263637045248/2023/3/29/traveloka-1-1680069800764363421438.jpg" alt="Korea Travel">
                    </div>
                </div>
            </div>

            <!-- See All Deals Button -->
            <div class="see-all-deals-button-container">
                <button class="see-all-deals-btn">
                    See All Deals
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- Mobile App Showcase Section -->
    <section class="mobile-app-showcase">
        <div class="showcase-container">
            <div class="showcase-content">
                <div class="app-preview">
                    <div class="phone-mockup">
                        <div class="phone-screen">
                            <div class="app-header">
                                <div class="status-bar">
                                    <span class="time">9:41</span>
                                    <div class="signal-wifi">
                                        <span class="signal">•••</span>
                                        <span class="wifi">📶</span>
                                        <span class="battery">🔋</span>
                                    </div>
                                </div>
                                <div class="location-bar">
                                    <span class="location-icon">📍</span>
                                    <span class="location-text">HCM,VIETNAM</span>
                                </div>
                                <div class="search-bar">
                                    <input type="text" placeholder="GO&CHILL✈️" readonly>
                                </div>
                            </div>
                            
                            <div class="app-content">
                                <h3 class="section-title">All Popular Trip</h3>
                                
                                <div class="trip-list">
                                    <div class="trip-item featured">
                                        <div class="trip-image">
                                            <img src="public/img/LogoGoAndChill.png" alt="Go & Chill Logo">
                                        </div>
                                        <div class="trip-info">
                                            <h4>GO & CHILL</h4>
                                            <div class="trip-date">📅 18 Jul-25 Jul</div>
                                            <div class="trip-rating">⭐⭐⭐⭐⭐ 5</div>
                                            <div class="trip-members">
                                                <div class="member-avatars">
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                </div>
                                                <span class="member-count">25k Person Joined</span>
                                            </div>
                                        </div>
                                        <div class="trip-price">
                                            <span class="price-badge free">FREE</span>
                                        </div>
                                    </div>

                                    <div class="trip-item">
                                        <div class="trip-image">
                                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=150&h=100&fit=crop" alt="Bukita Rayandro">
                                        </div>
                                        <div class="trip-info">
                                            <h4>Bukita Rayandro</h4>
                                            <div class="trip-date">📅 20 Sep-29 Sep</div>
                                            <div class="trip-rating">⭐⭐⭐⭐ 4.3</div>
                                            <div class="trip-members">
                                                <div class="member-avatars">
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                </div>
                                                <span class="member-count">24 Person Joined</span>
                                            </div>
                                        </div>
                                        <div class="trip-price">
                                            <span class="price-badge">$720</span>
                                        </div>
                                    </div>

                                    <div class="trip-item">
                                        <div class="trip-image">
                                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=150&h=100&fit=crop" alt="Cluster Omega">
                                        </div>
                                        <div class="trip-info">
                                            <h4>Cluster Omega</h4>
                                            <div class="trip-date">📅 14 Nov-22Nov</div>
                                            <div class="trip-rating">⭐⭐⭐⭐ 4.9</div>
                                            <div class="trip-members">
                                                <div class="member-avatars">
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                </div>
                                                <span class="member-count">26 Person Joined</span>
                                            </div>
                                        </div>
                                        <div class="trip-price">
                                            <span class="price-badge">$942</span>
                                        </div>
                                    </div>

                                    <div class="trip-item">
                                        <div class="trip-image">
                                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=150&h=100&fit=crop" alt="Shajek Bandorban">
                                        </div>
                                        <div class="trip-info">
                                            <h4>Shajek Bandorban</h4>
                                            <div class="trip-date">📅 12 Dec-18 Dec</div>
                                            <div class="trip-rating">⭐⭐⭐⭐ 4.5</div>
                                            <div class="trip-members">
                                                <div class="member-avatars">
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                    <span class="avatar">👤</span>
                                                </div>
                                                <span class="member-count">27 Person Joined</span>
                                            </div>
                                        </div>
                                        <div class="trip-price">
                                            <span class="price-badge">$800</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="showcase-text">
                    <h2 class="showcase-title">Khám phá thế giới với GO & CHILL App</h2>
                    <p class="showcase-description">
                        Tải ứng dụng GO & CHILL ngay hôm nay để trải nghiệm những chuyến du lịch tuyệt vời. 
                        Tìm kiếm, đặt chỗ và quản lý chuyến đi của bạn một cách dễ dàng.
                    </p>
                    <ul class="feature-list">
                        <li>✈️ Đặt vé máy bay giá tốt nhất</li>
                        <li>🏨 Hàng ngàn khách sạn chất lượng</li>
                        <li>🎯 Gợi ý điểm đến phù hợp</li>
                        <li>💰 Ưu đãi độc quyền cho thành viên</li>
                    </ul>
                    <div class="download-buttons">
                        <button class="download-btn ios">
                            <span class="btn-icon">📱</span>
                            <div class="btn-text">
                                <small>Tải về từ</small>
                                <strong>App Store</strong>
                            </div>
                        </button>
                        <button class="download-btn android">
                            <span class="btn-icon">🤖</span>
                            <div class="btn-text">
                                <small>Tải về từ</small>
                                <strong>Google Play</strong>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Toast Notification -->
    <div id="toast" class="toast-notification">
        <div class="toast-content">
            <i class="toast-icon">✓</i>
            <span class="toast-message">Đã copy mã voucher!</span>
        </div>
    </div>

    <script>
    // Copy voucher code functionality
    document.addEventListener('DOMContentLoaded', function() {
        const copyButtons = document.querySelectorAll('.copy-btn');
        const toast = document.getElementById('toast');

        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const code = this.getAttribute('data-code');
                
                // Copy to clipboard
                navigator.clipboard.writeText(code).then(function() {
                    // Show success notification
                    showToast('Đã copy mã voucher: ' + code);
                }).catch(function(err) {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = code;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    showToast('Đã copy mã voucher: ' + code);
                });
            });
        });

        function showToast(message) {
            const toastMessage = toast.querySelector('.toast-message');
            toastMessage.textContent = message;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
    });
    </script>

    <style>
    /* Toast Notification Styles */
    .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: #10b981;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 9999;
        transform: translateX(400px);
        transition: transform 0.3s ease;
        max-width: 300px;
    }

    .toast-notification.show {
        transform: translateX(0);
    }

    .toast-content {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .toast-icon {
        font-size: 18px;
        font-weight: bold;
    }

    .toast-message {
        font-size: 14px;
        font-weight: 500;
    }

    /* Dark mode support */
    body.dark-mode .toast-notification {
        background: #22d3ee;
        color: #1a1a1a;
    }
    </style>
</body>
</html>
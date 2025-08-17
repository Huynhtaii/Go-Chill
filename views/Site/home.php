<?php
// Include header chung
include_once 'header.php';
?>

<!-- Anh Banner-->
<section class="figma-banner-section">
    <div class="figma-banner-container">
        <img src="public/img/img_white_and_blue_modern.png" alt="GO & CHILL Travel Banner" class="figma-banner-image">
        
        <!-- Overlay content nếu cần thêm text hoặc button -->
        <div class="figma-banner-overlay">
            <!-- Có thể thêm content overlay ở đây nếu cần -->
        </div>
    </div>
</section>

<style>
        /* Đảm bảo spacing phù hợp với header và footer */
        body {
            margin-top: 0;
            padding-top: 0;
        }
        
        /*  Banner Styles */
        .figma-banner-section {
            position: relative;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f8fafc;
        }

        .figma-banner-container {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .figma-banner-image {
            width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: cover;
            object-position: center;
            display: block;
            border: none;
            transition: transform 0.3s ease;
        }

        .figma-banner-image:hover {
            transform: scale(1.02);
        }

        .figma-banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .figma-banner-section:hover .figma-banner-overlay {
            opacity: 1;
        }

        /* Dark mode support */
        body.dark-mode .figma-banner-section {
            background-color: #1a1a1a;
        }

        body.dark-mode .figma-banner-image {
            filter: brightness(0.9);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .figma-banner-image {
                max-height: 500px;
            }
        }

        @media (max-width: 768px) {
            .figma-banner-image {
                max-height: 400px;
                object-fit: cover;
            }
            
            .figma-banner-container {
                padding: 0;
            }
        }

        @media (max-width: 480px) {
            .figma-banner-image {
                max-height: 300px;
            }
        }

        /* Ensure banner doesn't interfere with existing layout */
        .figma-banner-section + .tour-section {
            margin-top: 0;
        }

        /* Animation for smooth loading */
        .figma-banner-image {
            animation: fadeInBanner 1s ease-in-out;
        }

        @keyframes fadeInBanner {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Banner Styles */
        .banner {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
        }

        .banner-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            /* object-fit: cover; */
            object-position: center;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner-content {
            text-align: center;
            color: white;
            max-width: 600px;
            padding: 0 20px;
        }

        .banner-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .banner-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .banner-btn {
            background-color: #0891b2;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .banner-btn:hover {
            background-color: #0e7490;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(8, 145, 178, 0.4);
        }

        body.dark-mode .banner-btn {
            background-color: #22d3ee;
            color: #1a1a1a;
        }

        body.dark-mode .banner-btn:hover {
            background-color: #06b6d4;
        }

        /* Tour Section Styles */
        .tour-section {
            padding: 60px 0;
            background-color: #f9fafb;
            transition: background-color 0.3s ease;
        }

        body.dark-mode .tour-section {
            background-color: #111827;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .tour-section .container {
            padding: 0;
            max-width: 100%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #1f2937;
            margin: 0;
        }

        body.dark-mode .section-title h2 {
            color: white;
        }

        .view-all {
            color: #0891b2;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s;
        }

        .view-all:hover {
            color: #0e7490;
        }

        body.dark-mode .view-all {
            color: #22d3ee;
        }

        .tour-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 0;
            margin: 0;
        }

        @media (max-width: 1200px) {
            .tour-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 900px) {
            .tour-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 600px) {
            .tour-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        .tour-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            min-height: 450px;
            min-width: 320px;
        }

        .tour-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        body.dark-mode .tour-card {
            background: #1f2937;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .tour-card:hover {
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.15);
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
            cursor: pointer;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .tour-card:hover .product-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(52, 152, 219, 0.1) 0%, transparent 100%);
        }



        .product-content {
            padding: 20px;
            position: relative;
            min-height: 250px;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 3.2em;
            flex: 1;
        }

        body.dark-mode .product-title {
            color: white;
        }

        .location-duration {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #666;
            gap: 15px;
        }

        body.dark-mode .location-duration {
            color: #9ca3af;
        }

        .location, .duration {
            display: flex;
            align-items: center;
            min-width: 0;
            flex: 1;
        }

        .location i, .duration i {
            color: #3498db;
            margin-right: 6px;
            font-size: 12px;
            flex-shrink: 0;
        }

        .location span, .duration span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            min-width: 0;
            flex: 1;
        }

        body.dark-mode .location i, body.dark-mode .duration i {
            color: #22d3ee;
        }

        /* Rating box */
        .rating-box {
            background: white;
            border-radius: 20px;
            padding: 8px 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            width: fit-content;
            border: 2px solid #E4E6E8;
            align-self: flex-start;
        }

        body.dark-mode .rating-box {
            background: #2a2a2a;
            border-color: #555;
        }

        .rating {
            display: flex;
            align-items: center;
        }

        .rating i {
            color: #f39c12;
            margin-right: 6px;
            font-size: 14px;
        }

        .rating span {
            color: #333;
            font-weight: 500;
            font-size: 0.85rem;
        }

        body.dark-mode .rating span {
            color: #d1d5db;
        }

        /* Bottom section - Pricing and Button */
        .bottom-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            gap: 15px;
        }

        .price-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .original-price {
            color: #999;
            text-decoration: line-through;
            font-size: 0.9rem;
        }

        body.dark-mode .original-price {
            color: #6b7280;
        }

        .current-price {
            color: #e74c3c;
            font-size: 1.3rem;
            font-weight: bold;
        }

        body.dark-mode .current-price {
            color: #ef4444;
        }

        .book-button {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .book-button:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        body.dark-mode .book-button {
            background: #22d3ee;
            color: #1a1a1a;
        }

        body.dark-mode .book-button:hover {
            background: #06b6d4;
        }

        /* News Section Styles */
        .news-section {
            padding: 60px 0;
            background-color: #ffffff;
            transition: background-color 0.3s ease;
        }

        body.dark-mode .news-section {
            background-color: #1a1a1a;
        }

        .news-section .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .news-section .section-title {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-start;
        }

        .news-section .section-title .title-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .news-section .section-title h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #1f2937;
            margin: 0;
        }

        body.dark-mode .news-section .section-title h2 {
            color: white;
        }

        .news-subtitle {
            color: #6b7280;
            font-size: 14px;
            font-style: italic;
            margin: 0;
        }

        .news-subtitle p {
            margin: 0;
        }

        body.dark-mode .news-subtitle {
            color: #9ca3af;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        @media (max-width: 1024px) {
            .news-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .news-grid {
                grid-template-columns: 1fr;
            }
        }

        .news-card {
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        body.dark-mode .news-card {
            background-color: #1f2937;
            border-color: #374151;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.08);
        }

        body.dark-mode .news-card:hover {
            box-shadow: 0 12px 30px rgba(255, 255, 255, 0.15);
        }

        .news-image {
            width: 100%;
            height: 180px;
            overflow: hidden;
            position: relative;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-content {
            padding: 20px;
        }

        .news-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 12px;
            color: #6b7280;
        }

        body.dark-mode .news-meta {
            color: #9ca3af;
        }

        .news-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .news-meta i {
            color: #0891b2;
            font-size: 10px;
        }

        body.dark-mode .news-meta i {
            color: #22d3ee;
        }

        .news-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 40px;
        }

        body.dark-mode .news-title {
            color: white;
        }

        .news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .news-author {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #6b7280;
        }

        body.dark-mode .news-author {
            color: #9ca3af;
        }

        .news-author i {
            color: #0891b2;
            font-size: 10px;
        }

        body.dark-mode .news-author i {
            color: #22d3ee;
        }

        .news-btn {
            background-color: #0891b2;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .news-btn:hover {
            background-color: #0e7490;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(8, 145, 178, 0.3);
        }

        body.dark-mode .news-btn {
            background-color: #22d3ee;
            color: #1a1a1a;
        }

        body.dark-mode .news-btn:hover {
            background-color: #06b6d4;
        }

        /* Responsive adjustments for news section */
        @media (max-width: 640px) {
            .news-section .section-header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .news-meta {
                flex-direction: column;
                gap: 8px;
            }

            .news-content {
                padding: 15px;
            }

            .news-title {
                font-size: 13px;
                margin-bottom: 15px;
            }
        }

        /* Newsletter Section Styles */
        .newsletter-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            transition: all 0.3s ease;
        }

        body.dark-mode .newsletter-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        .newsletter-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .newsletter-container {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }
        }

        .newsletter-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .newsletter-badge {
            display: inline-block;
            background: linear-gradient(135deg, #0891b2 0%, #22d3ee 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            max-width: fit-content;
            box-shadow: 0 4px 15px rgba(8, 145, 178, 0.3);
            animation: pulse 2s infinite;
        }

        .newsletter-text {
            text-align: center;
            /* Căn giữa toàn bộ content */
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        body.dark-mode .newsletter-badge {
            background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
            color: #1a1a1a;
        }

        .newsletter-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1f2937;
            margin: 20px 0;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        body.dark-mode .newsletter-title {
            color: white;
        }

        .newsletter-subtitle {
            font-size: 16px;
            color: #6b7280;
            line-height: 1.6;
            margin: 0;
        }

        body.dark-mode .newsletter-subtitle {
            color: #9ca3af;
        }

        .newsletter-form {
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            gap: 0;
            background: white;
            border-radius: 50px;
            padding: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            max-width: 500px;
        }

        .form-group:focus-within {
            box-shadow: 0 15px 40px rgba(8, 145, 178, 0.2);
            transform: translateY(-2px);
        }

        body.dark-mode .form-group {
            background: #2a2a2a;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .form-group:focus-within {
            box-shadow: 0 15px 40px rgba(34, 211, 238, 0.2);
        }

        .newsletter-input {
            flex: 1;
            padding: 16px 24px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            outline: none;
            background: transparent;
            color: #1f2937;
        }

        .newsletter-input::placeholder {
            color: #9ca3af;
        }

        body.dark-mode .newsletter-input {
            color: white;
        }

        body.dark-mode .newsletter-input::placeholder {
            color: #6b7280;
        }

        .newsletter-btn {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            box-shadow: 0 4px 15px rgba(31, 41, 55, 0.3);
        }

        .newsletter-btn:hover {
            background: linear-gradient(135deg, #374151 0%, #4b5563 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(31, 41, 55, 0.4);
        }

        body.dark-mode .newsletter-btn {
            background: linear-gradient(135deg, #0891b2 0%, #22d3ee 100%);
            color: #1a1a1a;
            box-shadow: 0 4px 15px rgba(8, 145, 178, 0.3);
        }

        body.dark-mode .newsletter-btn:hover {
            background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
            box-shadow: 0 8px 25px rgba(34, 211, 238, 0.4);
        }

        .newsletter-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .newsletter-image:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        body.dark-mode .newsletter-image {
            box-shadow: 0 20px 50px rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .newsletter-image:hover {
            box-shadow: 0 30px 60px rgba(255, 255, 255, 0.15);
        }

        .newsletter-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .newsletter-image:hover img {
            transform: scale(1.05);
        }

        .newsletter-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(8, 145, 178, 0.1) 0%, rgba(34, 211, 238, 0.1) 100%);
            z-index: 1;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .newsletter-section {
                padding: 60px 0;
            }

            .newsletter-title {
                font-size: 2rem;
            }

            .newsletter-subtitle {
                font-size: 14px;
            }

            .form-group {
                flex-direction: column;
                gap: 12px;
                padding: 12px;
                border-radius: 16px;
            }

            .newsletter-input,
            .newsletter-btn {
                border-radius: 12px;
                padding: 14px 20px;
            }

            .newsletter-image img {
                height: 250px;
            }
        }

        /* Animation for form success */
        .form-group.success {
            animation: successPulse 0.6s ease-in-out;
        }

        @keyframes successPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }

            100% {
                transform: scale(1);
            }
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

        /* Telegram */
        .social-link:nth-child(2) {
            background-color: #1877f2;
        }

        /* Facebook */
        .social-link:nth-child(3) {
            background-color: #1da1f2;
        }

        /* Twitter */
        .social-link:nth-child(4) {
            background-color: #ff0000;
        }

        /* YouTube */

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

        /* Responsive Footer */
        @media (max-width: 1024px) {
            .footer-content {
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
            }

            .footer-section:first-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 768px) {
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
            /* Điều chỉnh chiều cao cho phù hợp với cột */
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

        /* Responsive Map */
        @media (max-width: 768px) {
            .map-container iframe {
                height: 180px;
                /* Giảm chiều cao cho mobile */
            }

            .footer-map {
                margin: 15px 0;
            }
        }

        @media (max-width: 480px) {
            .map-container iframe {
                height: 150px;
                /* Giảm thêm cho màn hình nhỏ */
            }
        }
    </style>
 <!-- Tour Section -->
    <section class="tour-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <img src="public/img/Travel and Tourism Icon.png" alt="Travel Icon" class="section-icon">
                    <h2>DU LỊCH NƯỚC NGOÀI</h2>
                </div>
                <a href="#" class="view-all">Xem tất cả →</a>
            </div>

            <div class="tour-grid">
<?php foreach ($tourList as $tour): ?>
            <?php if (isset($tour['TenDanhMuc']) && $tour['TenDanhMuc'] === 'Tour Nước Ngoài'): ?>
            <div class="tour-card">
                <a href="index1.php?controller=tourdetail&action=index" style="text-decoration: none; color: inherit;">
                    <div class="image-container">
                        <img src="public/img/<?= isset($tour['HinhAnh']) ? $tour['HinhAnh'] : '' ?>" 
                            alt="<?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?>" class="product-image">
                        <div class="image-overlay"></div>
                    </div>
                </a>
                <div class="product-content">
                    <h3 class="product-title"><?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?></h3>
                    <div class="location-duration">
                        <div class="location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?= isset($tour['DiemDen']) ? $tour['DiemDen'] : '' ?></span>
                        </div>
                        <div class="duration">
                            <i class="fas fa-clock"></i>
                            <span><?= isset($tour['ThoiGian']) ? $tour['ThoiGian'] : '' ?></span>
                        </div>
                    </div>
                    <div class="rating-box">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <span>4.96 (672 reviews)</span>
                            <span><?= isset($tour['Danhgia']) ? $tour['Danhgia'] : '' ?></span>
                        </div>
                    </div>
                    <div class="bottom-section">
                        <div class="price-info">
                            <?php displayPrice($tour['GiaTour'], $tour['GiaTourSale'], $tour['GiamGia']); ?>
                        </div>
                        <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $tour['MaTour']; ?>" class="book-button" style="text-decoration: none; display: inline-block;">Đặt Ngay</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>


                
                    
            </div>
        </div>
    </section>
    <!-- Du lịch trong nước -->
    <section class="tour-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <img src="public/img/Coconut Tree.png" alt="Vietnam Icon" class="section-icon">
                    <h2>DU LỊCH TRONG NƯỚC</h2>
                </div>
                <a href="#" class="view-all">Xem tất cả →</a>
            </div>

            <div class="tour-grid">
                <?php foreach ($tourList as $tour): ?>
            <?php if (isset($tour['TenDanhMuc']) && $tour['TenDanhMuc'] === 'Tour Trong Nước'): ?>
            <div class="tour-card">
                <a href="index1.php?controller=tourdetail&action=index" style="text-decoration: none; color: inherit;">
                    <div class="image-container">
                        <img src="public/img/<?= isset($tour['HinhAnh']) ? $tour['HinhAnh'] : '' ?>" 
                            alt="<?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?>" class="product-image">
                        <div class="image-overlay"></div>
                    </div>
                </a>
                <div class="product-content">
                    <h3 class="product-title"><?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?></h3>
                    <div class="location-duration">
                        <div class="location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?= isset($tour['DiemDen']) ? $tour['DiemDen'] : '' ?></span>
                        </div>
                        <div class="duration">
                            <i class="fas fa-clock"></i>
                            <span><?= isset($tour['ThoiGian']) ? $tour['ThoiGian'] : '' ?></span>
                        </div>
                    </div>
                    <div class="rating-box">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <span>4.96 (672 reviews)</span>
                            <span><?= isset($tour['Danhgia']) ? $tour['Danhgia'] : '' ?></span>
                        </div>
                    </div>
                    <div class="bottom-section">
                        <div class="price-info">
                            <?php displayPrice($tour['GiaTour'], $tour['GiaTourSale'], $tour['GiamGia']); ?>
                        </div>
                        <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $tour['MaTour']; ?>" class="book-button" style="text-decoration: none; display: inline-block;">Đặt Ngay</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
                    
                
            </div>
        </div>
    </section>
    <!--Tour bán chạy-->
    <section class="tour-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <img src="public/img/Fire Icons.png" alt="Fire Icon" class="section-icon">
                    <h2>TOUR BÁN CHẠY</h2>
                </div>
                <a href="#" class="view-all">Xem tất cả →</a>
            </div>

            <div class="tour-grid">
                <?php if (isset($bestsellerTours) && !empty($bestsellerTours)): ?>
                    <?php foreach ($bestsellerTours as $tour): ?>
                    <div class="tour-card">
                        <a href="index1.php?controller=tourdetail&action=index" style="text-decoration: none; color: inherit;">
                            <div class="image-container">
                                <img src="public/img/<?= isset($tour['HinhAnh']) ? $tour['HinhAnh'] : '' ?>" 
                                     alt="<?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?>" class="product-image">
                                <div class="image-overlay"></div>
                            </div>
                        </a>
                        <div class="product-content">
                            <h3 class="product-title"><?= isset($tour['TieuDe']) ? $tour['TieuDe'] : '' ?></h3>
                            
                            <div class="location-duration">
                                <div class="location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?= isset($tour['DiemDen']) ? $tour['DiemDen'] : '' ?></span>
                                </div>
                                <div class="duration">
                                    <i class="fas fa-clock"></i>
                                    <span><?= isset($tour['ThoiGian']) ? $tour['ThoiGian'] : '' ?></span>
                                </div>
                            </div>
                            
                            <div class="rating-box">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <span>4.96 (672 reviews)</span>
                                    <span><?= isset($tour['Danhgia']) ? $tour['Danhgia'] : '' ?></span>
                                </div>
                            </div>
                            
                            <div class="bottom-section">
                                <div class="price-info">
                                    <?php displayPrice($tour['GiaTour'], $tour['GiaTourSale'], $tour['GiamGia']); ?>
                                </div>
                                <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $tour['MaTour']; ?>" class="book-button" style="text-decoration: none; display: inline-block;">Đặt Ngay</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-tours">
                        <p>Chưa có tour bán chạy nào.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <div class="title-content">
                        <img src="public/img/Biểu tượng Tin tức.png" alt="News Icon" class="section-icon">
                        <h2>TIN TỨC</h2>
                    </div>
                    <div class="news-subtitle">
                        <p>Uy tin - Chất Lượng - An Toàn - Chuyên Nghiệp</p>
                    </div>
                </div>
                <a href="#" class="view-all">Xem tất cả →</a>
            </div>

            <div class="news-grid">
                <?php
// Function helper để hiển thị giá
function displayPrice($giaTour, $giaTourSale, $giamGia = 0) {
    $giaTour = isset($giaTour) ? (float)$giaTour : 0;
    $giaTourSale = isset($giaTourSale) ? (float)$giaTourSale : 0;
    $giamGia = isset($giamGia) ? (float)$giamGia : 0;
    
    // Tính giá sau giảm từ GiamGia nếu GiaTourSale không có
    $giaSauGiam = $giaTour - $giamGia;
    
    // Nếu có giá giảm (từ GiaTourSale hoặc GiamGia) và giá giảm > 0 và nhỏ hơn giá gốc, hiển thị cả hai
    if (($giaTourSale > 0 && $giaTourSale < $giaTour) || ($giamGia > 0 && $giaSauGiam > 0 && $giaSauGiam < $giaTour)) {
        echo '<span class="original-price">' . number_format($giaTour, 0, ',', '.') . '₫</span>';
        if ($giaTourSale > 0 && $giaTourSale < $giaTour) {
            echo '<span class="current-price">' . number_format($giaTourSale, 0, ',', '.') . '₫</span>';
        } else {
            echo '<span class="current-price">' . number_format($giaSauGiam, 0, ',', '.') . '₫</span>';
        }
    } else {
        // Chỉ hiển thị giá gốc nếu không có giảm giá hoặc giá giảm không hợp lệ
        echo '<span class="current-price">' . number_format($giaTour, 0, ',', '.') . '₫</span>';
    }
}

// Lấy tin tức từ database
// include_once __DIR__ . '/../../../models/Database.php';
$db = Database::getInstance();
                $newsList = $db->getAll("SELECT * FROM tintuc ORDER BY NgayDang DESC LIMIT 8");
if (!empty($newsList)) :
    foreach ($newsList as $news) : ?>
                        <div class="news-card">
                            <div class="news-image">
                                <img src="public/img/<?= isset($news['HinhDaiDien']) ? $news['HinhDaiDien'] : 'default-news.jpg' ?>" alt="<?= htmlspecialchars($news['TieuDe']) ?>">
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-date">
                                        <i class="fa-solid fa-calendar"></i>
                                        <?= isset($news['NgayDang']) ? date('d/m/Y', strtotime($news['NgayDang'])) : '' ?>
                                    </span>
                                    <span class="news-time">
                                        <i class="fa-solid fa-clock"></i>
                                        <!-- Không có trường giờ, để trống hoặc mặc định -->
                                    </span>
                                    <span class="news-comments">
                                        <i class="fa-solid fa-comment"></i>
                                        <!-- Nếu có số comment thì hiển thị, không thì để 0 -->
                                        0 comments
                                    </span>
                                </div>
                                <h3 class="news-title"><?= htmlspecialchars($news['TieuDe']) ?></h3>
                                <div class="news-footer">
                                    <div class="news-author">
                                        <i class="fa-solid fa-user"></i>
                                        <!-- Không có trường tác giả, để admin -->
                                        <span>admin</span>
                                    </div>
                                    <button class="news-btn">Chi Tiết</button>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                else: ?>
                    <!-- Nếu không có tin tức, giữ nguyên HTML cũ -->
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
    </section>
    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-container">
                <div class="newsletter-content">
                    <div class="newsletter-text">
                        <div class="newsletter-badge">
                            Tham Gia Cùng Chúng Tôi
                        </div>
                        <h2 class="newsletter-title">ĐĂNG KÝ NHẬN MAIL</h2>
                        <p class="newsletter-subtitle">
                            Theo dõi GO & CHILL để nhận được những thông tin khuyến mãi cực kỳ hấp dẫn
                        </p>
                        <form class="newsletter-form">
                            <div class="form-group">
                                <input type="email" class="newsletter-input" placeholder="Email" required>
                                <button type="submit" class="newsletter-btn">Đăng Ký</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="newsletter-image">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/4f/7d/fc/caption.jpg?w=1200&h=-1&s=1"
                        alt="Resort Pool">
                </div>
            </div>
        </div>
    </section>

<?php
// Include footer chung
include_once 'footer.php';
?>
<?php
// Header content starts here
// Đảm bảo không có output trước khi gọi header()
// Chỉ include FlashMessage khi cần thiết, không include ở đây
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }

        body.dark-mode {
            background-color: #1a1a1a;
            color: white;
        }

        .header {
            background-color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        body.dark-mode .header {
            background-color: #2d2d2d;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.1);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 80px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 120px;
            height: auto;
        }

        .search-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .search-container {
            max-width: 400px;
            position: relative;
            width: 400px;
        }

        .search-box {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 25px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        body.dark-mode .search-box {
            background-color: #3d3d3d;
            border-color: #555;
            color: white;
        }

        .search-container span {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            cursor: pointer;
        }

        body.dark-mode .search-container span {
            color: #9ca3af;
        }
        
        /* Flash Message Styles */
        .alert {
            margin: 20px auto;
            max-width: 800px;
            padding: 15px 20px;
            border-radius: 8px;
            border: 1px solid;
            font-weight: 500;
            position: relative;
            animation: slideIn 0.3s ease-out;
        }
        
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeaa7;
            color: #856404;
        }
        
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .search-btn {
            background-color: #000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
            white-space: nowrap;
        }

        .search-btn:hover {
            background-color: #333;
        }

        body.dark-mode .search-btn {
            background-color: #0891b2;
        }

        body.dark-mode .search-btn:hover {
            background-color: #0e7490;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Dark Mode Toggle */
        .dark-mode-toggle {
            width: 60px;
            height: 30px;
            background: linear-gradient(135deg, #fff, #DDDDDD);
            border-radius: 15px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 19px rgba(0, 0, 0, 0.2);
        }

        .dark-mode-toggle.dark {
            background: linear-gradient(135deg, #1e293b, #334155);
            box-shadow: 0 2px 19px rgba(204, 203, 203, 0.5);
        }

        .toggle-slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background: #079CCC;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(234, 234, 234, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dark-mode-toggle.dark .toggle-slider {
            transform: translateX(30px);
        }

        .toggle-icon {
            font-size: 12px;
            color: #fff;
            transition: all 0.3s ease;
        }

        .dark-mode-toggle.dark .toggle-icon {
            color: #fff;
        }

        .language-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .language-selector:hover {
            background-color: #f3f4f6;
        }

        body.dark-mode .language-selector {
            color: white;
        }

        body.dark-mode .language-selector:hover {
            background-color: #4a4a4a;
        }

        .acount-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background-color: #f3f4f6;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .acount-icon:hover {
            background-color: #e5e7eb;
            transform: scale(1.05);
        }

        body.dark-mode .acount-icon {
            background-color: #4a4a4a;
            color: white;
        }

        body.dark-mode .acount-icon:hover {
            background-color: #555;
        }

        /* User Dropdown Menu */
        .acount-icon {
            position: relative;
            z-index: 10000;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: -60px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            min-width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 9999;
            margin-top: 10px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 8px 0;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 75px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid white;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid #f3f4f6;
            position: relative;
            overflow: hidden;
        }

        .dropdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(8, 145, 178, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .dropdown-item:hover::before {
            left: 100%;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            margin-bottom: 5px;
        }

        .dropdown-item:hover {
            background-color: #f8fafc;
            color: #0891b2;
            transform: translateX(5px);
        }

        .dropdown-item i {
            font-size: 16px;
            width: 16px;
            text-align: center;
        }

        /* Dark mode styles for dropdown */
        body.dark-mode .dropdown-menu {
            background: #2d2d2d;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .dropdown-menu::before {
            border-bottom-color: #2d2d2d;
            right: 75px;
        }

        body.dark-mode .dropdown-item {
            color: #d1d5db;
            border-bottom-color: #404040;
        }

        body.dark-mode .dropdown-item:hover {
            background-color: #404040;
            color: #22d3ee;
        }

        /* Responsive design for dropdown */
        @media (max-width: 768px) {
            .dropdown-menu {
                right: -110px;
                min-width: 200px;
            }
            
            .dropdown-menu::before {
                right: 125px;
            }
        }

        @media (max-width: 480px) {
            .dropdown-menu {
                right: -140px;
                min-width: 220px;
            }
            
            .dropdown-menu::before {
                right: 155px;
            }
            
            .dropdown-item {
                padding: 14px 16px;
                font-size: 15px;
            }
        }

        .nav-menu {
            background-color: white;
            padding: 15px 20px;
            border-top: 1px solid #e5e7eb;
            transition: background-color 0.3s ease;
        }

        body.dark-mode .nav-menu {
            background-color: #2d2d2d;
            border-top-color: #555;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-link {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            position: relative;
            padding: 8px 0;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #0891b2;
        }

        body.dark-mode .nav-link {
            color: #d1d5db;
        }

        body.dark-mode .nav-link:hover {
            color: #22d3ee;
        }

        .nav-link.dropdown::after {
            content: '▼';
            font-size: 10px;
            margin-left: 5px;
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

        /* Registration Form Styles */
        .breadcrumb {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px 0;
        }

        .breadcrumb-item {
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .breadcrumb-item:hover {
            color: #0891b2;
        }

        .breadcrumb-item.current {
            color: #374151;
            font-weight: 500;
        }

        .breadcrumb-separator {
            margin: 0 12px;
            color: #9ca3af;
        }

        body.dark-mode .breadcrumb-item {
            color: #9ca3af;
        }

        body.dark-mode .breadcrumb-item:hover {
            color: #22d3ee;
        }

        body.dark-mode .breadcrumb-item.current {
            color: #d1d5db;
        }

        .registration-section {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #f0f0f0;
        }

        body.dark-mode .registration-section {
            background: #1f2937;
            border-color: #374151;
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
        }

        .registration-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .registration-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        body.dark-mode .registration-header h1 {
            color: white;
        }

        .registration-header p {
            color: #6b7280;
            font-size: 16px;
            line-height: 1.5;
        }

        body.dark-mode .registration-header p {
            color: #9ca3af;
        }

        .registration-form .form-group {
            margin-bottom: 24px;
        }

        .registration-form .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        body.dark-mode .registration-form .form-label {
            color: #d1d5db;
        }

        .required-asterisk {
            color: #ef4444;
            font-weight: 700;
        }

        .registration-form .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .registration-form .form-input:focus {
            outline: none;
            border-color: #0891b2;
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
        }

        .registration-form .form-input.error {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        body.dark-mode .registration-form .form-input {
            background: #374151;
            border-color: #4b5563;
            color: white;
        }

        body.dark-mode .registration-form .form-input:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 0 3px rgba(34, 211, 238, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
            display: block;
            font-weight: 500;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 30px 0;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            margin: 0;
            accent-color: #0891b2;
        }

        .checkbox-label {
            font-size: 14px;
            color: #374151;
            line-height: 1.5;
            cursor: pointer;
        }

        body.dark-mode .checkbox-label {
            color: #d1d5db;
        }

        .checkbox-label a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 500;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        body.dark-mode .checkbox-label a {
            color: #22d3ee;
        }

        .submit-btn {
            width: 100%;
            padding: 16px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Responsive Design for Registration */
        @media (max-width: 768px) {
            .registration-section {
                margin: 20px;
                padding: 30px 20px;
            }

            .registration-header h1 {
                font-size: 1.5rem;
            }

            .registration-header p {
                font-size: 14px;
            }
        }
    </style>
<header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="index1.php?controller=home&action=index" style="text-decoration: none; display: block;">
                    <img src="public/img/LogoGoAndChill.png" alt="Go & Chill Logo">
                </a>
            </div>

            <div class="search-wrapper">
                <div class="search-container">
                    <input type="text" class="search-box" placeholder="Bạn Muốn Đi Đâu ?">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
                <button class="search-btn">Tìm Kiếm</button>
            </div>

            <div class="header-actions">
                <div class="language-selector">
                    <span><i class="fa-solid fa-earth-asia"></i></span>
                    <span>VN</span>
                    <span>VNĐ</span>
                    <span>▼</span>
                </div>

                <!-- Dark Mode Toggle -->
                <div class="dark-mode-toggle" id="darkModeToggle">
                    <div class="toggle-slider">
                        <i class="toggle-icon fa-solid fa-sun"></i>
                    </div>
                </div>

                <div class="acount-icon" id="userDropdown">
                    <span><i class="fa-solid fa-user"></i></span>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="dropdown-header">
                                <i class="fa-solid fa-user-circle"></i>
                                Xin chào, <?php echo htmlspecialchars($_SESSION['fullname']); ?>
                            </div>
                            <a href="index1.php?controller=auth&action=logout" class="dropdown-item">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                Đăng xuất
                            </a>
                        <?php else: ?>
                            <a href="index1.php?controller=auth&action=login" class="dropdown-item">
                                <i class="fa-solid fa-sign-in-alt"></i>
                                Đăng nhập
                            </a>
                            <a href="index1.php?controller=register&action=index" class="dropdown-item">
                                <i class="fa-solid fa-user-plus"></i>
                                Đăng ký
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="nav-menu">
        <div class="nav-container">
            <div class="nav-links">
                <a href="index1.php?controller=about&action=index#" class="nav-link">GIỚI THIỆU</a>
                <a href="index1.php?controller=tour&category=Tour%20Nước%20Ngoài" class="nav-link dropdown">DU LỊCH NGOÀI NƯỚC</a>
                <a href="index1.php?controller=tour&category=Tour%20Trong%20Nước" class="nav-link dropdown">DU LỊCH TRONG NƯỚC</a>
                <a href="index1.php?controller=tour&category=Tour%20bán%20chạy" class="nav-link dropdown">TOUR BÁN CHẠY </a>
                <a href="index1.php?controller=contact&action=index#" class="nav-link">LIÊN HỆ</a>
                <a href="index1.php?controller=voucher&action=index#" class="nav-link dropdown">DỊCH VỤ KHÁC</a>
                <a href="index1.php?controller=news&action=index#" class="nav-link">TIN TỨC</a>
            </div>
        </div>
    </nav>
    
    <!-- Flash Message Display -->
    <?php 
    // Include FlashMessage helper nếu chưa được include
    if (!class_exists('FlashMessage')) {
        require_once './helpers/FlashMessage.php';
    }
    echo FlashMessage::display(); 
    ?>
    
    <script>
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    const toggleIcon = document.querySelector('.toggle-icon');

    // Check for saved dark mode preference
    const isDarkMode = localStorage.getItem('darkMode') === 'enabled';

    if (isDarkMode) {
        enableDarkMode();
    }

    darkModeToggle.addEventListener('click', () => {
        const isDarkMode = body.classList.contains('dark-mode');

        if (isDarkMode) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        body.classList.add('dark-mode');
        darkModeToggle.classList.add('dark');
        toggleIcon.className = 'toggle-icon fa-solid fa-moon';
        localStorage.setItem('darkMode', 'enabled');
    }

    function disableDarkMode() {
        body.classList.remove('dark-mode');
        darkModeToggle.classList.remove('dark');
        toggleIcon.className = 'toggle-icon fa-solid fa-sun';
        localStorage.setItem('darkMode', 'disabled');
    }
    </script>
    <script>
        // User Dropdown Menu Functionality
        const userDropdown = document.getElementById('userDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle dropdown when clicking on user icon
        userDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userDropdown.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

        // Close dropdown when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                dropdownMenu.classList.remove('show');
            }
        });

        // Add hover effect for better UX
        let hoverTimeout;

        userDropdown.addEventListener('mouseenter', function() {
            clearTimeout(hoverTimeout);
            dropdownMenu.classList.add('show');
        });

        userDropdown.addEventListener('mouseleave', function() {
            hoverTimeout = setTimeout(() => {
                if (!dropdownMenu.matches(':hover')) {
                    dropdownMenu.classList.remove('show');
                }
            }, 150);
        });

        dropdownMenu.addEventListener('mouseenter', function() {
            clearTimeout(hoverTimeout);
            dropdownMenu.classList.add('show');
        });

        dropdownMenu.addEventListener('mouseleave', function() {
            dropdownMenu.classList.remove('show');
        });

        // Add keyboard navigation
        userDropdown.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                dropdownMenu.classList.toggle('show');
            }
        });
    </script>
    <script>
    // Thêm hiệu ứng click cho các nút
    document.querySelectorAll('.book-button').forEach(button => {
        button.addEventListener('click', function() {
            // Hiệu ứng ripple
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255,255,255,0.6)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.left = '50%';
            ripple.style.top = '50%';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            ripple.style.marginLeft = '-10px';
            ripple.style.marginTop = '-10px';
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
            
            // Thông báo đặt tour
            alert('Cảm ơn bạn đã quan tâm! Chúng tôi sẽ liên hệ sớm nhất.');
        });
    });

    // Thêm CSS cho hiệu ứng ripple
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
</script>

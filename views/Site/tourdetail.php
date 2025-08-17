
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
        }

        body.dark-mode .acount-icon {
            background-color: #4a4a4a;
            color: white;
        }

        body.dark-mode .acount-icon:hover {
            background-color: #555;
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

        /* Tour Info Card */
        .main-content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .tour-info-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            transition: background-color 0.3s ease;
        }

        body.dark-mode .tour-info-card {
            background: #2d2d2d;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .tour-details {
            flex: 1;
            padding: 30px;
        }

        .tour-title {
            font-size: 32px;
            font-weight: 700;
            color: #0891b2;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        body.dark-mode .tour-title {
            color: #22d3ee;
        }

        .tour-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .rating-stars {
            color: #fbbf24;
            font-size: 18px;
        }

        .rating-text {
            color: #6b7280;
            font-size: 14px;
        }

        body.dark-mode .rating-text {
            color: #9ca3af;
        }

        .booking-section {
            background: linear-gradient(135deg, #bfdbfe, #dbeafe);
            padding: 30px;
            width: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        body.dark-mode .booking-section {
            background: linear-gradient(135deg, #1e3a8a, #1e40af);
        }

        .price-section {
            margin-bottom: 25px;
        }

        .price-label {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        body.dark-mode .price-label {
            color: #d1d5db;
        }

        .price-amount {
            font-size: 24px;
            font-weight: 700;
            color: #dc2626;
            margin-bottom: 15px;
        }

        .date-section {
            margin-bottom: 25px;
        }

        .date-display {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            color: #374151;
        }

        body.dark-mode .date-display {
            background: #374151;
            color: white;
        }

        .book-button {
            background: #000;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 15px;
        }

        .book-button:hover {
            background: #333;
        }

        body.dark-mode .book-button {
            background: #0891b2;
        }

        body.dark-mode .book-button:hover {
            background: #0e7490;
        }

        .schedule-link {
            text-align: center;
            color: #6b7280;
            text-decoration: underline;
            cursor: pointer;
            font-size: 14px;
        }

        body.dark-mode .schedule-link {
            color: #d1d5db;
        }

        .schedule-link:hover {
            color: #0891b2;
        }

        /* Banner Section */
        .banner-section {
            display: flex;
            gap: 20px;
            margin: 30px 0;
        }

        .banner-large {
            flex: 2;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 400px;
        }

        .banner-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .banner-large:hover img {
            transform: scale(1.05);
        }

        .banner-small-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .banner-small {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 190px;
        }

        .banner-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .banner-small:hover img {
            transform: scale(1.05);
        }

        .banner-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 20px;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .banner-large .banner-overlay h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .banner-large .banner-overlay p {
            font-size: 16px;
            opacity: 0.9;
        }

        .banner-small .banner-overlay h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .banner-small .banner-overlay p {
            font-size: 14px;
            opacity: 0.9;
        }

        body.dark-mode .banner-overlay {
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        }

        /* Section Divider */
        .section-divider {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
            margin: 40px 0;
            border-radius: 1px;
        }

        body.dark-mode .section-divider {
            background: linear-gradient(90deg, transparent, #4a5568, transparent);
        }

        /* Tour Information Section */
        .tour-info-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body.dark-mode .tour-info-section {
            background: #2d2d2d;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #f59e0b;
            margin-bottom: 20px;
        }

        body.dark-mode .section-title {
            color: #fbbf24;
        }

        .highlight-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .star-rating {
            font-size: 20px;
            font-weight: 700;
            color: #374151;
        }

        body.dark-mode .star-rating {
            color: #d1d5db;
        }

        .tour-route {
            font-size: 20px;
            font-weight: 700;
            color: #374151;
        }

        body.dark-mode .tour-route {
            color: #d1d5db;
        }

        .tour-details-info {
            margin-bottom: 20px;
        }

        .tour-duration {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #6b7280;
        }

        body.dark-mode .tour-duration {
            color: #9ca3af;
        }

        .tour-description {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.6;
            color: #374151;
        }

        body.dark-mode .tour-description {
            color: #d1d5db;
        }

        .experience-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: #dc2626;
            margin-bottom: 15px;
        }

        .experience-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .experience-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            line-height: 1.5;
        }

        .experience-item i {
            color: #10b981;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .experience-item span {
            color: #374151;
        }

        body.dark-mode .experience-item span {
            color: #d1d5db;
        }

        /* Tour Details Section */
        .tour-details-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body.dark-mode .tour-details-section {
            background: #2d2d2d;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .detail-card {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .detail-card {
            background: #374151;
        }

        body.dark-mode .detail-card:hover {
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        .detail-icon {
            width: 50px;
            height: 50px;
            background: #e0f2fe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #0891b2;
            flex-shrink: 0;
        }

        body.dark-mode .detail-icon {
            background: #1e3a8a;
            color: #22d3ee;
        }

        .detail-content h3 {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
        }

        body.dark-mode .detail-content h3 {
            color: #d1d5db;
        }

        .detail-content p {
            font-size: 16px;
            color: #6b7280;
            margin: 0;
        }

        body.dark-mode .detail-content p {
            color: #9ca3af;
        }

        .location-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .location-card {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .location-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .location-card {
            background: #374151;
        }

        body.dark-mode .location-card:hover {
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        .location-icon {
            width: 50px;
            height: 50px;
            background: #fef3c7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #f59e0b;
            flex-shrink: 0;
        }

        body.dark-mode .location-icon {
            background: #92400e;
            color: #fbbf24;
        }

        .location-content h3 {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
        }

        body.dark-mode .location-content h3 {
            color: #d1d5db;
        }

        .location-content p {
            font-size: 16px;
            color: #6b7280;
            margin: 0;
        }

        body.dark-mode .location-content p {
            color: #9ca3af;
        }

        .tour-type-section {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        body.dark-mode .tour-type-section {
            background: #374151;
        }

        .tour-type-icon {
            width: 50px;
            height: 50px;
            background: #f3e8ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #8b5cf6;
            flex-shrink: 0;
        }

        body.dark-mode .tour-type-icon {
            background: #581c87;
            color: #a78bfa;
        }

        .tour-type-content h3 {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        body.dark-mode .tour-type-content h3 {
            color: #d1d5db;
        }

        .tour-type-content p {
            font-size: 16px;
            color: #6b7280;
            line-height: 1.5;
            margin: 0;
        }

        body.dark-mode .tour-type-content p {
            color: #9ca3af;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .banner-section {
                flex-direction: column;
            }

            .banner-large {
                height: 250px;
            }

            .banner-small {
                height: 150px;
            }

            .tour-info-section {
                padding: 20px;
            }

            .section-title {
                font-size: 24px;
            }

            .highlight-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .details-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .location-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .detail-card,
            .location-card,
            .tour-type-section {
                padding: 15px;
            }

            .detail-icon,
            .location-icon,
            .tour-type-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .tour-details-section {
                padding: 20px;
            }

            .program-image {
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                margin: 20px 0;
                max-width: 100%;
            }

            .program-image img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                display: block;
            }

            /* Responsive cho ảnh */
            @media (max-width: 768px) {
                .program-image img {
                    height: 200px;
                }
            }

            @media (max-width: 480px) {
                .program-image img {
                    height: 180px;
                }
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .banner-section {
                flex-direction: column;
            }

            .banner-large {
                height: 250px;
            }

            .banner-small {
                height: 150px;
            }

            .tour-info-section,
            .tour-details-section,
            .program-section {
                padding: 20px;
            }

            .section-title,
            .program-title {
                font-size: 24px;
            }

            .highlight-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .details-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .location-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .detail-card,
            .location-card,
            .tour-type-section {
                padding: 15px;
            }

            .detail-icon,
            .location-icon,
            .tour-type-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .program-tabs {
                flex-direction: column;
                gap: 5px;
            }

            .tab-item {
                padding: 15px;
                border-radius: 8px;
                border-bottom: none;
            }

            .tab-item.active {
                border-bottom: none;
                background: #0891b2;
                color: white;
            }

            .day-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .program-image {
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                margin: 20px 0;
                max-width: 100%;
            }

            .program-image img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                display: block;
            }

            /* Responsive cho ảnh */
            @media (max-width: 768px) {
                .program-image img {
                    height: 200px;
                }
            }

            @media (max-width: 480px) {
                .program-image img {
                    height: 180px;
                }
            }
        }

        /* Program Section */
        .program-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body.dark-mode .program-section {
            background: #2d2d2d;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .program-tabs {
            display: flex;
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 30px;
            gap: 5px;
        }

        body.dark-mode .program_tabs {
            border-bottom-color: #4a5568;
        }

        .tab-item {
            padding: 15px 20px;
            cursor: pointer;
            font-weight: 500;
            color: #6b7280;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .tab-item:hover {
            color: #0891b2;
            background: #f8fafc;
        }

        .tab-item.active {
            color: #0891b2;
            border-bottom-color: #0891b2;
            background: #f0f9ff;
        }

        body.dark-mode .tab-item {
            color: #9ca3af;
        }

        body.dark-mode .tab-item:hover {
            color: #22d3ee;
            background: #374151;
        }

        body.dark-mode .tab-item.active {
            color: #22d3ee;
            border-bottom-color: #22d3ee;
            background: #1e3a8a;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        .program-title {
            font-size: 28px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 25px;
        }

        body.dark-mode .program-title {
            color: #d1d5db;
        }

        .day-program {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        body.dark-mode .day-program {
            border-color: #4a5568;
        }

        .day-header {
            background: #0891b2;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
        }

        .day-header:hover {
            background: #0e7490;
        }

        body.dark-mode .day-header {
            background: #1e3a8a;
        }

        body.dark-mode .day-header:hover {
            background: #1e40af;
        }

        .day-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .day-title {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .day-title h3 {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        .expand-btn {
            font-size: 16px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .day-program.expanded .expand-btn {
            transform: rotate(180deg);
        }

        .day-content {
            padding: 25px;
            background: #f8fafc;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease-out;
        }

        .day-program.expanded .day-content {
            max-height: 2000px;
            /* Đặt giá trị đủ lớn để chứa nội dung */
            transition: max-height 0.4s ease-in, padding 0.3s ease-in;
        }

        .day-program:not(.expanded) .day-content {
            padding: 0 25px;
        }

        .day-program:not(.expanded) {
            border-radius: 12px;
        }

        body.dark-mode .day-content {
            background: #374151;
        }

        .time-section {
            margin-bottom: 20px;
        }

        .time-title {
            color: #f59e0b;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        body.dark-mode .time-title {
            color: #fbbf24;
        }

        .time-description {
            color: #374151;
            line-height: 1.6;
            margin: 0;
        }

        body.dark-mode .time-description {
            color: #d1d5db;
        }

        .program-image {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            max-width: 100%;
        }

        .program-image img {
            width: 100%;
            height: 620px;
            object-fit: cover;
            display: block;
        }

        /* Responsive cho ảnh */
        @media (max-width: 768px) {
            .program-image img {
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .program-image img {
                height: 180px;
            }
        }

        /* Popular Tours Section */
        /* Popular Tours Section */
        .popular-tours-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body.dark-mode .popular-tours-section {
            background: #2d2d2d;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .tours-container {
            position: relative;
            display: flex;
            align-items: center;
            gap: 20px;
            max-width: 100%;
            overflow: hidden;
        }

        .tours-grid {
            display: flex;
            gap: 20px;
            transition: transform 0.3s ease;
            width: 100%;
        }

        .nav-arrow {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
            z-index: 10;
        }

        .nav-arrow-right {
            position: relative;
            right: 50px;
            /* Di chuyển arrow right về phía trái 15px */
        }

        .nav-arrow-left {
            position: relative;
            left: 10px;
            /* Di chuyển arrow left về phía phải 15px */
        }

        .nav-arrow:hover {
            background: #0891b2;
            color: white;
            border-color: #0891b2;
            transform: scale(1.1);
        }

        .nav-arrow:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        body.dark-mode .nav-arrow {
            background: #374151;
            border-color: #4a5568;
            color: #d1d5db;
        }

        body.dark-mode .nav-arrow:hover {
            background: #22d3ee;
            border-color: #22d3ee;
            color: #1a1a1a;
        }

        .tour-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            flex: 0 0 calc((100% - 40px) / 3);
            min-width: 0;
            max-width: calc((100% - 40px) / 3);
        }

        .tour-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }


        body.dark-mode .tour-card {
            background: #374151;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .tour-card.featured {
            border-color: #22d3ee;
            background: linear-gradient(135deg, #1e3a8a, #1e40af);
        }

        .tour-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .tour-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .tour-card:hover .tour-image img {
            transform: scale(1.1);
        }

        .tour-rating-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.95);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 5px;
            backdrop-filter: blur(10px);
        }

        .tour-rating-badge i {
            color: #fbbf24;
        }

        .tour-info {
            padding: 20px;
        }

        .tour-card-title {
            font-size: 16px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 15px;
            line-height: 1.3;
            height: 40px;
            overflow: hidden;
            display: -webkit-box;
            /* -webkit-line-clamp: 2; */
            -webkit-box-orient: vertical;
        }

        body.dark-mode .tour-card-title {
            color: #d1d5db;
        }

        .tour-card.featured .tour-card-title {
            color: #0891b2;
        }

        body.dark-mode .tour-card.featured .tour-card-title {
            color: #22d3ee;
        }

        .tour-details {
            margin-bottom: 15px;
        }

        .tour-duration,
        .tour-departure {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        body.dark-mode .tour-duration,
        body.dark-mode .tour-departure {
            color: #9ca3af;
        }

        .tour-duration i,
        .tour-departure i {
            color: #0891b2;
            width: 16px;
        }

        body.dark-mode .tour-duration i,
        body.dark-mode .tour-departure i {
            color: #22d3ee;
        }

        .tour-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Căn giữa mặc định */
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            min-height: 60px;
            /* Đảm bảo chiều cao tối thiểu */
        }

        body.dark-mode .tour-footer {
            border-top-color: #4a5568;
        }

        .tour-price {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Căn giữa giá */
            justify-content: center;
            /* Căn giữa theo chiều dọc */
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            text-align: center;
            /* Căn giữa text */
            width: 100%;
            /* Chiếm toàn bộ chiều rộng khi căn giữa */
        }

        /* Khi hover vào tour-card, giá sẽ chạy sang trái */
        .tour-card:hover .tour-footer {
            justify-content: space-between;
        }

        .tour-card:hover .tour-price {
            align-items: flex-start;
            /* Chạy sang trái khi hover */
            text-align: left;
            /* Căn trái text khi hover */
            width: auto;
            /* Trở về kích thước tự nhiên */
        }

        .price-amount {
            font-size: 18px;
            font-weight: 700;
            color: #dc2626;
            transition: all 0.3s ease;
            margin: 0;
            /* Loại bỏ margin để căn giữa tốt hơn */
        }

        .price-currency {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0;
            /* Loại bỏ margin để căn giữa tốt hơn */
        }

        body.dark-mode .price-currency {
            color: #9ca3af;
        }

        .book-now-btn {
            background: #0891b2;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            opacity: 0;
            /* Ẩn nút mặc định */
            transform: translateX(20px);
            /* Vị trí ban đầu bên phải */
            pointer-events: none;
            /* Không thể click khi ẩn */
            text-decoration: none;
            display: inline-block;
        }

        /* Khi hover vào tour-card, nút sẽ xuất hiện */
        .tour-card:hover .book-now-btn {
            opacity: 1;
            transform: translateX(0);
            pointer-events: auto;
        }

        .book-now-btn:hover {
            background: #0e7490;
            transform: translateY(-2px);
        }

        body.dark-mode .book-now-btn {
            background: #22d3ee;
            color: #1a1a1a;
        }

        body.dark-mode .book-now-btn:hover {
            background: #0891b2;
        }

        .tour-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            flex: 0 0 calc((100% - 40px) / 3);
            min-width: 0;
            max-width: calc((100% - 40px) / 3);
        }

        .tour-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .book-now-btn:hover {
            background: #0e7490;
            transform: translateY(-2px);
        }

        body.dark-mode .book-now-btn {
            background: #22d3ee;
            color: #1a1a1a;
        }

        body.dark-mode .book-now-btn:hover {
            background: #0891b2;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .tour-card {
                flex: 0 0 calc((100% - 20px) / 2);
                max-width: calc((100% - 20px) / 2);
            }
        }

        @media (max-width: 768px) {
            .tours-container {
                flex-direction: column;
                gap: 15px;
            }

            .tour-card {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .nav-arrow {
                display: none;
            }

            .tours-grid {
                flex-direction: column;
                gap: 15px;
            }

            .popular-tours-section {
                padding: 20px;
            }
        }

        /* You Might Like Section */
        .you-might-like-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body.dark-mode .you-might-like-section {
            background: #2d2d2d;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: repeat(3, 200px);
            gap: 15px;
            height: 615px;
        }

        .destination-card {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .destination-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .destination-card.large {
            grid-row: span 2;
        }

        .destination-card.medium {
            grid-row: span 1;
        }

        /* Grid layout positioning */
        .destination-card:nth-child(1) {
            grid-column: 1;
            grid-row: 1 / 3;
        }

        .destination-card:nth-child(2) {
            grid-column: 2;
            grid-row: 1;
        }

        .destination-card:nth-child(3) {
            grid-column: 3;
            grid-row: 1;
        }

        .destination-card:nth-child(4) {
            grid-column: 2 / 4;
            grid-row: 2;
        }

        .destination-card:nth-child(5) {
            grid-column: 1;
            grid-row: 3;
        }

        .destination-card:nth-child(6) {
            grid-column: 2 / 4;
            grid-row: 3;
        }

        .destination-image {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .destination-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .destination-card:hover .destination-image img {
            transform: scale(1.1);
        }

        .destination-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(0, 0, 0, 0.3) 0%,
                    rgba(0, 0, 0, 0.1) 50%,
                    rgba(0, 0, 0, 0.6) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .destination-card:hover .destination-overlay {
            background: linear-gradient(135deg,
                    rgba(0, 0, 0, 0.4) 0%,
                    rgba(0, 0, 0, 0.2) 50%,
                    rgba(0, 0, 0, 0.7) 100%);
        }

        .destination-label {
            color: white;
            font-size: 28px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-align: center;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .destination-card:hover .destination-label {
            transform: translateY(-5px);
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .destinations-grid {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: repeat(4, 180px);
                height: auto;
            }

            .destination-card:nth-child(1) {
                grid-column: 1 / 3;
                grid-row: 1;
            }

            .destination-card:nth-child(2) {
                grid-column: 1;
                grid-row: 2;
            }

            .destination-card:nth-child(3) {
                grid-column: 2;
                grid-row: 2;
            }

            .destination-card:nth-child(4) {
                grid-column: 1 / 3;
                grid-row: 3;
            }

            .destination-card:nth-child(5) {
                grid-column: 1;
                grid-row: 4;
            }

            .destination-card:nth-child(6) {
                grid-column: 2;
                grid-row: 4;
            }

            .destination-card.large,
            .destination-card.medium {
                grid-row: span 1;
            }

            .destination-label {
                font-size: 24px;
            }
        }

        @media (max-width: 768px) {
            .destinations-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, 150px);
                gap: 10px;
            }

            .destination-card:nth-child(1),
            .destination-card:nth-child(2),
            .destination-card:nth-child(3),
            .destination-card:nth-child(4),
            .destination-card:nth-child(5),
            .destination-card:nth-child(6) {
                grid-column: 1;
                grid-row: auto;
            }

            .destination-label {
                font-size: 20px;
                letter-spacing: 1px;
            }

            .you-might-like-section {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .destinations-grid {
                grid-template-rows: repeat(6, 120px);
            }

            .destination-label {
                font-size: 18px;
            }
        }
        /* Review Section Styles */
        .review-summary {
            background: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            border: 1px solid #e5e7eb;
        }

        body.dark-mode .review-summary {
            background: #374151;
            border-color: #4a5568;
        }

        .overall-rating {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .rating-score {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .score {
            font-size: 36px;
            font-weight: 700;
            color: #dc2626;
            line-height: 1;
        }

        .total-reviews {
            font-size: 14px;
            color: #6b7280;
            margin-top: 5px;
        }

        body.dark-mode .total-reviews {
            color: #9ca3af;
        }

        .rating-breakdown {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .rating-filter {
            padding: 8px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            background: white;
            cursor: pointer;
            font-size: 14px;
            color: #374151;
            transition: all 0.3s ease;
        }

        .rating-filter:hover {
            border-color: #0891b2;
            color: #0891b2;
        }

        .rating-filter.active {
            background: #dc2626;
            border-color: #dc2626;
            color: white;
        }

        body.dark-mode .rating-filter {
            background: #4a5568;
            border-color: #6b7280;
            color: #d1d5db;
        }

        .additional-filters {
            display: flex;
            gap: 10px;
        }

        .filter-chip {
            padding: 6px 12px;
            background: #e0f2fe;
            color: #0891b2;
            border-radius: 15px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-chip:hover {
            background: #0891b2;
            color: white;
        }

        body.dark-mode .filter-chip {
            background: #1e3a8a;
            color: #22d3ee;
        }

        .reviews-list {
            margin-bottom: 30px;
        }

        .review-item {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .review-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .review-item {
            background: #374151;
            border-color: #4a5568;
        }

        .reviewer-info {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            background: #f3f4f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            flex-shrink: 0;
        }

        body.dark-mode .reviewer-avatar {
            background: #4a5568;
            color: #d1d5db;
        }

        .reviewer-details {
            flex: 1;
        }

        .reviewer-name {
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
        }

        body.dark-mode .reviewer-name {
            color: #d1d5db;
        }

        .review-rating {
            display: flex;
            gap: 2px;
            margin-bottom: 5px;
        }

        .review-rating i {
            color: #fbbf24;
            font-size: 14px;
        }

        .review-date {
            font-size: 12px;
            color: #6b7280;
        }

        body.dark-mode .review-date {
            color: #9ca3af;
        }

        .review-content {
            margin-left: 65px;
        }

        .review-attributes {
            margin-bottom: 15px;
        }

        .attribute {
            display: block;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .attribute strong {
            color: #374151;
        }

        body.dark-mode .attribute {
            color: #9ca3af;
        }

        body.dark-mode .attribute strong {
            color: #d1d5db;
        }

        .review-text {
            font-size: 14px;
            line-height: 1.6;
            color: #374151;
            margin-bottom: 15px;
        }

        body.dark-mode .review-text {
            color: #d1d5db;
        }

        .review-images {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .review-image {
            position: relative;
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .review-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-indicator {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 4px;
            padding: 2px 6px;
            font-size: 10px;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .review-actions {
            display: flex;
            gap: 15px;
        }

        .helpful-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            background: none;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 6px 12px;
            color: #6b7280;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s ease;
        }

        .helpful-btn:hover {
            border-color: #0891b2;
            color: #0891b2;
        }

        body.dark-mode .helpful-btn {
            border-color: #4a5568;
            color: #9ca3af;
        }

        .seller-response {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 15px 0 15px 65px;
            border-radius: 8px;
        }

        body.dark-mode .seller-response {
            background: #92400e;
            border-left-color: #fbbf24;
        }

        .response-header {
            margin-bottom: 10px;
        }

        .response-label {
            font-size: 12px;
            font-weight: 600;
            color: #92400e;
            text-transform: uppercase;
        }

        body.dark-mode .response-label {
            color: #fbbf24;
        }

        .response-content {
            font-size: 14px;
            color: #374151;
            line-height: 1.5;
        }

        body.dark-mode .response-content {
            color: #d1d5db;
        }

        .load-more-section {
            text-align: center;
            padding: 20px 0;
        }

        .load-more-btn {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 30px;
            color: #374151;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .load-more-btn:hover {
            background: #0891b2;
            border-color: #0891b2;
            color: white;
        }

        body.dark-mode .load-more-btn {
            background: #374151;
            border-color: #4a5568;
            color: #d1d5db;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .review-content {
                margin-left: 0;
            }

            .seller-response {
                margin-left: 0;
            }

            .reviewer-info {
                flex-direction: column;
                gap: 10px;
            }

            .rating-breakdown {
                flex-direction: column;
                gap: 8px;
            }

            .rating-filter {
                text-align: center;
            }
        }
       
    </style>
<!-- Main Content -->
    <div class="main-content">
        <div class="tour-info-card">
            <div class="tour-details">
                <h1 class="tour-title">Tour Thái Lan 5N4D | Bangkok - Pattaya mùa hè T6,7,8,9</h1>
                <div class="tour-rating">
                    <span class="rating-stars">
                        <i class="fa-solid fa-star"></i>
                        4.8
                    </span>
                    <span class="rating-text">(2.000 reviews)</span>
                </div>
            </div>

            <div class="booking-section">
                <div class="price-section">
                    <div class="price-label">Giá từ</div>
                    <div class="price-amount">9.400.000 đ</div>
                </div>

                <div class="date-section">
                    <div class="date-display">
                        <i class="fa-regular fa-calendar"></i>
                        <span>06/11/2025</span>
                    </div>
                </div>

                <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $_GET['tour_id'] ?? '1'; ?>" class="book-button" style="text-decoration: none; display: inline-block;">Đặt ngay</a>
                <div class="schedule-link">Xem lịch khởi hành khác</div>
            </div>
        </div>
    </div>

    <!-- Banner Section -->
    <div class="main-content">
        <div class="banner-section">
            <div class="banner-large">
                <img src="https://namthientravel.com.vn/wp-content/uploads/2022/04/thai-13-09191539.jpg"
                    alt="Main Banner">
                <div class="banner-overlay">
                    <h3>Khám phá Thái Lan</h3>
                    <p>Trải nghiệm văn hóa độc đáo và ẩm thực tuyệt vời</p>
                </div>
            </div>
            <div class="banner-small-container">
                <div class="banner-small">
                    <img src="https://file.hstatic.net/200000851795/article/du-lich-bangkok__14__596a0508f97b47b481d8537a08b2ec44.jpg"
                        alt="Banner 1">
                    <div class="banner-overlay">
                        <h4>Bangkok</h4>
                        <p>Thủ đô sôi động</p>
                    </div>
                </div>
                <div class="banner-small">
                    <img src="https://i.ytimg.com/vi/xvD3tcJ0oKs/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBC_DeEPdcmcTB2HNRwv8tMfNK0uQ"
                        alt="Banner 2">
                    <div class="banner-overlay">
                        <h4>Pattaya</h4>
                        <p>Bãi biển tuyệt đẹp</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Horizontal Line -->
        <hr class="section-divider">

        <!-- Tour Information Section -->
        <div class="tour-info-section">
            <h2 class="section-title">Thông tin tour</h2>

            <div class="tour-highlights">
                <div class="highlight-header">
                    <span class="star-rating">5⭐</span>
                    <span class="tour-route">| BANGKOK PATTAYA</span>
                </div>

                <div class="tour-details-info">
                    <div class="tour-duration">
                        <i class="fa-regular fa-calendar"></i>
                        <span>5N4Đ | Khởi hành: 07/05, 21/05/2025 và 04/06/2025</span>
                    </div>

                    <div class="tour-description">
                        <i class="fa-solid fa-trophy"></i>
                        <span>Ưu đãi độc quyền! Tour Thái Lan 5N4Đ trọn gói, khách sạn 5 sao - Số lượng có hạn! Đừng bỏ
                            lỡ cơ hội khám phá những điểm đến nổi tiếng như Chợ Nổi Bốn Miền, NongNooch, Baiyoke Sky và
                            thưởng thức buffet hải sản & lẩu Suki Thái Lan trong một chuyến đi trọn vẹn. Giá tốt nhất
                            thị trường - Đặt ngay kẻo lỡ!</span>
                    </div>
                </div>

                <div class="experience-title">
                    <i class="fa-solid fa-fire"></i>
                    <span>Trải nghiệm không thể bỏ lỡ:</span>
                </div>

                <div class="experience-list">
                    <div class="experience-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Đạo thuyền Chợ nổi Bốn Miền: Khám phá nét văn hóa sông nước độc đáo 🚤</span>
                    </div>

                    <div class="experience-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Check-in Công viên khủng long NongNooch 🦕</span>
                    </div>

                    <div class="experience-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Thư giãn với massage Thái cổ truyền 👑</span>
                    </div>

                    <div class="experience-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Tặng vé xem show vũ công chuyển giới: Chiêm ngưỡng nghệ thuật trình diễn đặc sắc 🎭</span>
                    </div>

                    <div class="experience-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Buffet BBQ Hải sản & lẩu Suki Thái Lan: Thỏa mãn vị giác với hương vị biển cả và lẩu Thái
                            🍤</span>
                    </div>

                    <div class="experience-item">
                        <i class="fa-solid fa-check"></i>
                        <span>Ngắm toàn cảnh Bangkok từ tòa nhà 86 tầng Baiyoke Sky: Chiêm ngưỡng vẻ đẹp đô thị từ trên
                            cao 🏙️</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tour Details Section -->
        <div class="tour-details-section">
            <div class="details-grid">
                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Thời gian</h3>
                        <p>5 ngày 4 đêm</p>
                    </div>
                </div>

                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="fa-regular fa-calendar"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Khởi hành</h3>
                        <p>1/11; 3/11; 5/11/2025</p>
                    </div>
                </div>

                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Phương tiện</h3>
                        <p>Ô tô, máy bay</p>
                    </div>
                </div>
            </div>

            <div class="location-grid">
                <div class="location-card">
                    <div class="location-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="location-content">
                        <h3>Khởi hành</h3>
                        <p>Thành phố Hồ Chí Minh</p>
                    </div>
                </div>

                <div class="location-card">
                    <div class="location-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="location-content">
                        <h3>Nơi đến</h3>
                        <p>Thái lan</p>
                    </div>
                </div>
            </div>

            <div class="tour-type-section">
                <div class="tour-type-icon">
                    <i class="fa-regular fa-image"></i>
                </div>
                <div class="tour-type-content">
                    <h3>Loại hình du lịch</h3>
                    <p>Du lịch khám phá, Du lịch sinh thái, Du lịch nghỉ dưỡng, Du lịch giải trí, Gia đình, Trăng mật,
                        Cá nhân</p>
                </div>
            </div>
        </div>
        <!-- Program Section -->
        <div class="program-section">
            <!-- Tab Navigation -->
            <div class="program-tabs">
                <div class="tab-item active" data-tab="program">Chương trình tour</div>
                <div class="tab-item" data-tab="price">Giá chi tiết</div>
                <div class="tab-item" data-tab="notes">Các lưu ý khác</div>
                <div class="tab-item" data-tab="reviews">Đánh giá của khách hàng</div>
            </div>
            <div class="tab-panel" id="reviews-panel">
                <h2 class="program-title">Đánh giá của khách hàng</h2>

                <!-- Review Summary -->
                <div class="review-summary">
                    <div class="overall-rating">
                        <div class="rating-score">
                            <span class="score">5.0</span>
                            <span class="total-reviews">trên 5</span>
                        </div>
                        <div class="rating-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                    <div class="rating-breakdown">
                        <div class="rating-filter active" data-rating="all">Tất Cả</div>
                        <div class="rating-filter" data-rating="5">5 Sao (5.8k)</div>
                        <div class="rating-filter" data-rating="4">4 Sao (102)</div>
                        <div class="rating-filter" data-rating="3">3 Sao (16)</div>
                        <div class="rating-filter" data-rating="2">2 Sao (8)</div>
                        <div class="rating-filter" data-rating="1">1 Sao (11)</div>
                    </div>

                    <div class="additional-filters">
                        <div class="filter-chip">Có Bình Luận (2.4k)</div>
                        <div class="filter-chip">Có Hình Ảnh / Video (1.1k)</div>
                    </div>
                </div>

                <!-- Reviews List -->
                <div class="reviews-list">
                    <!-- Review Item 1 -->
                    <div class="review-item">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">
                                <span>k****j</span>
                            </div>
                            <div class="reviewer-details">
                                <div class="reviewer-name">k****j</div>
                                <div class="review-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="review-date">2025-07-16 20:15 | Tour Thái Lan 5N4D</div>
                            </div>
                        </div>

                        <div class="review-content">
                            <div class="review-attributes">
                                <span class="attribute">Mình vừa có chuyến đi Thái Lan cùng Go&Chill Travel và thực sự
                                    ấn tượng! 💯</span>
                                <span class="attribute">
                                    ✅ Lịch trình hợp lý, tham quan đầy đủ các điểm nổi bật như Chợ Nổi Bốn Miền, Công
                                    viên khủng long NongNooch, Baiyoke Sky…
                                    <br>✅ Dịch vụ cao cấp, ở khách sạn 5 sao, có cả Buffet BBQ hải sản và lẩu Suki Thái
                                    ngon
                                    hết sảy! 🍤🔥
                                    <br>✅ Hướng dẫn viên nhiệt tình, chuyên nghiệp, hỗ trợ chu đáo từ A-Z.
                                    <br>✅ Nhiều quà tặng hấp dẫn: vé xem show vũ công chuyển giới, vé tham quan Coffee
                                    Tổ
                                    Chim…
                                </span>

                            </div>

                            <div class="review-text">
                                💯 Tổng kết: Hành trình trọn vẹn, nhiều kỷ niệm đẹp. Một chuyến đi đáng đồng tiền bát
                                gạo, cực kỳ thích hợp cho dịp Tết! 10/10 khuyên bạn nên trải nghiệm! 🚀💙
                            </div>

                            

                            <div class="review-actions">
                                <button class="helpful-btn">
                                    <i class="fa-regular fa-thumbs-up"></i>
                                    <span>4</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 2 -->
                    <div class="review-item">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">
                                <span>h****653</span>
                            </div>
                            <div class="reviewer-details">
                                <div class="reviewer-name">haootranh653</div>
                                <div class="review-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="review-date">2025-06-28 18:31 | Tour Thái Lan 5N4D</div>
                            </div>
                        </div>

                        <div class="review-content">
                            <div class="review-attributes">
                                <span class="attribute">Mình vừa có một chuyến du lịch Thái Lan cực kỳ ấn tượng cùng
                                    Go&Chill Travel! 🎉</span>
                            </div>

                            <div class="review-text">
                                🌟 Điểm cộng lớn:
                                ✅ Lịch trình hấp dẫn – Kết hợp giữa tham quan, vui chơi và trải nghiệm văn hóa. Từ Chợ
                                nổi Bốn Miền, Công viên khủng long NongNooch, đến Baiyoke Sky đều rất đáng giá!
                                <br>✅ Dịch vụ xứng tầm 5 sao – Khách sạn sang trọng, di chuyển thoải mái, đồ ăn ngon, đặc
                                biệt là Buffet BBQ hải sản và lẩu Suki Thái Lan! 🍣🔥
                                <br>✅ Hướng dẫn viên siêu dễ thương – Vui vẻ, nhiệt tình, luôn hỗ trợ khách tận tình.
                                <br>✅ Show diễn & quà tặng hấp dẫn – Xem show vũ công chuyển giới, thưởng thức massage Thái
                                cổ truyền, vé tham quan Coffee Tổ Chim – quá xịn!
                            </div>

    
                        </div>
                    </div>

                    <!-- Seller Response -->
                    <div class="seller-response">
                        <div class="response-header">
                            <span class="response-label">Phản Hồi Của Người Bán</span>
                        </div>
                        <div class="response-content">
                            Chào bạn, cảm ơn bạn đã tin tưởng và lựa chọn dịch vụ của chúng tôi.
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="load-more-section">
                    <button class="load-more-btn">Xem thêm đánh giá</button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content">
                <div class="tab-panel active" id="program-panel">
                    <h2 class="program-title">Chương trình tour</h2>

                    <div class="day-program">
                        <div class="day-header">
                            <div class="day-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="day-title">
                                <h3>NGÀY 1: TPHCM ✈️ BANGKOK 🚌 PATAYA (Ăn coupon sân bay và ăn tối)</h3>
                                <div class="expand-btn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="day-content">
                            <div class="time-section">
                                <h4 class="time-title">SÁNG</h4>
                                <p class="time-description">
                                    Hướng dẫn viên GO&CHILL Travel đón Quý khách tại Ga đi - Sân bay Quốc Tế Tân Sơn
                                    Nhất - Cột số 10 từ Tp.HCM đi Thái Lan.
                                </p>
                            </div>

                            <div class="time-section">
                                <h4 class="time-title">CHIỀU</h4>
                                <p class="time-description">
                                    Hướng dẫn viên GO&CHILL Travel đón Quý khách tại Ga đi – Sân bay Quốc Tế Tân Sơn
                                    Nhất - Cột số 10 từ Tp.HCM đi Thái Lan.
                                    <br>Quý khách tham quan:
                                    <br>➢ <span style="color: red;font-weight: bold;">Chợ nổi Bốn Miền</span> là nơi để
                                    mua sắm và thưởng thức ẩm thực, thưởng thức các món ăn đặc sản tại Thái Lan như Pad
                                    Thai, SomTum. Mang trong mình nét văn hóa độc đáo của các miền đất nước Thái Lan,
                                    văn hóa lễ hội của từng miền sẽ được tổ chức hàng tuần tại chợ.
                                </p>

                                <div class="program-image">
                                    <img src="https://bizweb.dktcdn.net/100/474/438/products/tramy1206-232616012640-di-chuyen-di-lai-thai-lan-2.jpg?v=1714615748083"
                                        alt="Chợ nổi Bốn Miền - Thailand">
                                </div>
                            </div>

                            <div class="time-section">
                                <h4 class="time-title">TỐI</h4>
                                <p class="time-description">
                                    Quý khách dùng bữa tối tại nhà hàng địa phương, có thể tham gia các hoạt động giải
                                    trí, chợ đêm tại Pattaya.
                                    <br>➢ <span style="color: red;font-weight: bold;">Go&Chill Travel tặng 1 suất
                                        massage</span> cổ truyền Thái thư giãn.
                                </p>

                                <div class="program-image">
                                    <img src="https://intertour.vn/wp-content/uploads/2025/03/trai-nghiem-massage-thai-tour-thai-lan.jpg"
                                        alt="Massage Thái cổ truyền">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day 2 -->
                    <div class="day-program">
                        <div class="day-header">
                            <div class="day-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="day-title">
                                <h3>NGÀY 2: ĐẢO CORAL 🚌 KHAO CHEE CHAN 🚌 COFFEE TỔ CHIM (Ăn 3 bữa)</h3>
                                <div class="expand-btn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="day-content">
                            <div class="time-section">
                                <h4 class="time-title">SÁNG</h4>
                                <p class="time-description">
                                    Quý khách dùng bữa sáng tại khách sạn. Khởi hành đi tham quan:
                                    <br>➢ <span style="color: red;font-weight: bold;">Đảo Coral</span> - một trong những
                                    điểm du lịch nổi tiếng nhất Pattaya với các hoạt động thể thao dưới nước hấp dẫn.
                                </p>

                                <div class="program-image">
                                    <img src="https://owa.bestprice.vn/images/destinations/uploads/coral-island-600f8f6539bf8.jpg"
                                        alt="Đảo Coral - Pattaya">
                                </div>
                            </div>

                            <div class="time-section">
                                <h4 class="time-title">CHIỀU</h4>
                                <p class="time-description">
                                    ➢ <span style="color: red;font-weight: bold;">Khao Chee Chan</span> (Núi Phật Vàng)
                                    - chiêm ngưỡng hình ảnh Đức Phật được khắc trên vách núi cao 109m, rộng 70m bằng
                                    vàng 24k.
                                    <br>➢ <span style="color: red;font-weight: bold;">Coffee Tổ Chim</span> - thưởng
                                    thức cà phê độc đáo trong không gian thiên nhiên tuyệt đẹp.
                                </p>

                                <div class="program-image">
                                    <img src="https://pystravel.vn/uploads/posts/albums/3683/64d3a522851b90fe98396cb4c2235752.jpg"
                                        alt="Khao Chee Chan - Núi Phật Vàng">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day 3 -->
                    <div class="day-program">
                        <div class="day-header">
                            <div class="day-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="day-title">
                                <h3>NGÀY 3: PATTAYA 🚌 CÔNG VIÊN NONGNOOCH 🚌 BANGKOK (Ăn 3 bữa)</h3>
                                <div class="expand-btn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="day-content">
                            <div class="time-section">
                                <h4 class="time-title">SÁNG</h4>
                                <p class="time-description">
                                    Quý khách dùng bữa sáng tại khách sạn và trả phòng. Khởi hành về Bangkok, trên đường
                                    tham quan:
                                    <br>➢ <span style="color: red;font-weight: bold;">Công viên Nongnooch</span> - khu
                                    vườn nhiệt đới nổi tiếng với show diễn voi và vườn thực vật đa dạng.
                                </p>

                                <div class="program-image">
                                    <img src="https://viettourist.com//resources/images/BLOG-PIC/Blog-thai-lan/thailan%20-%20noongnoc2.jpg"
                                        alt="Công viên Nongnooch">
                                </div>
                            </div>

                            <div class="time-section">
                                <h4 class="time-title">CHIỀU</h4>
                                <p class="time-description">
                                    Quý khách tiếp tục hành trình về Bangkok. Check-in khách sạn và nghỉ ngơi.
                                    <br>Tối: Tự do khám phá Bangkok về đêm hoặc tham gia tour tùy chọn.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Day 4 -->
                    <div class="day-program">
                        <div class="day-header">
                            <div class="day-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="day-title">
                                <h3>NGÀY 4: WAT YANAWA 🚌 WAT ARUN 🚌 BAIYOKE SKY (Ăn 3 bữa)</h3>
                                <div class="expand-btn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="day-content">
                            <div class="time-section">
                                <h4 class="time-title">SÁNG</h4>
                                <p class="time-description">
                                    Dùng bữa sáng tại khách sạn. Khởi hành tham quan:
                                    <br>➢ <span style="color: red;font-weight: bold;">Wat Yanawa</span> - ngôi chùa độc
                                    đáo với kiến trúc hình thuyền nổi tiếng ở Bangkok.
                                    <br>➢ <span style="color: red;font-weight: bold;">Wat Arun</span> (Chùa Bình Minh) -
                                    biểu tượng của Bangkok với tháp chuông cao 82m.
                                </p>

                                <div class="program-image">
                                    <img src="https://cdn3.ivivu.com/2019/03/ngoi-chua-tuyet-dep-o-thai-lan-duoc-gioi-tre-ran-ran-check-in-ivivu-2-1024x683.jpg"
                                        alt="Wat Arun - Chùa Bình Minh">
                                </div>
                            </div>

                            <div class="time-section">
                                <h4 class="time-title">TỐI</h4>
                                <p class="time-description">
                                    ➢ <span style="color: red;font-weight: bold;">Baiyoke Sky</span> - tòa nhà cao nhất
                                    Bangkok (304m), ngắm toàn cảnh thành phố từ tầng 86.
                                    <br>Buffet tối tại nhà hàng với view panorama tuyệt đẹp.
                                </p>

                                <div class="program-image">
                                    <img src="https://oddviser.com/photo/place/1600/48.jpg" alt="Baiyoke Sky Tower">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day 5 -->
                    <div class="day-program">
                        <div class="day-header">
                            <div class="day-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="day-title">
                                <h3>NGÀY 5: WAT TRAIMIT 🚌 BANGKOK ✈️ TPHCM (Ăn coupon sân bay)</h3>
                                <div class="expand-btn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="day-content">
                            <div class="time-section">
                                <h4 class="time-title">SÁNG</h4>
                                <p class="time-description">
                                    Dùng bữa sáng tại khách sạn và trả phòng. Tham quan:
                                    <br>➢ <span style="color: red;font-weight: bold;">Wat Traimit</span> (Chùa Phật
                                    Vàng) - chiêm ngưỡng tượng Phật bằng vàng nguyên khối nặng 5,5 tấn.
                                </p>

                                <div class="program-image">
                                    <img src="https://www.tsttourist.com/vnt_upload/news/03_2024/TSTtourist_6_ngoi_chua_vang_thai_lan_duoc_nhieu_du_khach_yeu_thich_2.jpg"
                                        alt="Wat Traimit - Chùa Phật Vàng">
                                </div>
                            </div>

                            <div class="time-section">
                                <h4 class="time-title">CHIỀU</h4>
                                <p class="time-description">
                                    Tự do mua sắm tại các trung tâm thương mại hoặc chợ Chatuchak.
                                    <br>Xe đưa đoàn ra sân bay Suvarnabhumi làm thủ tục bay về TP.HCM.
                                    <br><strong>Kết thúc chương trình tour Thái Lan 5N4Đ đầy ý nghĩa!</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-panel" id="price-panel">
                    <h2 class="program-title">Giá chi tiết</h2>
                    <p>Nội dung giá chi tiết sẽ được hiển thị ở đây...</p>
                </div>

                <div class="tab-panel" id="notes-panel">
                    <h2 class="program-title">Các lưu ý khác</h2>
                    <p>Các lưu ý quan trọng sẽ được hiển thị ở đây...</p>
                </div>

                <div class="tab-panel" id="reviews-panel">
                    <h2 class="program-title">Đánh giá của khách hàng</h2>
                    <p>Đánh giá và phản hồi từ khách hàng sẽ được hiển thị ở đây...</p>
                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.day-header').forEach(function(header) {
            header.addEventListener('click', function() {
            const program = header.closest('.day-program');
            program.classList.toggle('expanded');
                });
            });
            // Tab chuyển động mượt cho chương trình tour
            const tabItems = document.querySelectorAll('.tab-item');
            const tabPanels = document.querySelectorAll('.tab-panel');

            tabItems.forEach(tab => {
                tab.addEventListener('click', function() {
        // Xóa active ở tất cả tab và panel
            tabItems.forEach(t => t.classList.remove('active'));
            tabPanels.forEach(panel => {
            // Thêm hiệu ứng fade out
            panel.classList.remove('active');
            panel.style.opacity = 0;
            panel.style.transition = 'opacity 0.3s';
        });

        // Active tab hiện tại
        tab.classList.add('active');
        const panelId = tab.dataset.tab + '-panel';
        const panel = document.getElementById(panelId);

        // Hiện panel với hiệu ứng fade in
        setTimeout(() => {
            panel.classList.add('active');
            panel.style.opacity = 1;
        }, 100);
    });
});
        </script>
        <!-- Popular Tours Section -->
        <div class="main-content">
            <div class="popular-tours-section">
                <h2 class="section-title">Các tour nổi bật</h2>

                <div class="tours-container">
                    <button class="nav-arrow nav-arrow-left" id="prevTour">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <div class="tours-grid" id="toursGrid">
                        <div class="tour-card">
                            <div class="tour-image">
                                <img src="https://newocean.edu.vn/wp-content/uploads/2024/10/diem-du-lich-han-quoc-noi-tieng.jpg"
                                    alt="Tour Seoul Hàn Quốc">
                                <div class="tour-rating-badge">
                                    <i class="fa-solid fa-star"></i>
                                    4.96
                                </div>
                            </div>
                            <div class="tour-info">
                                <h3 class="tour-card-title">Tour du lịch Seoul Hàn Quốc 4N4D</h3>
                                <div class="tour-details">
                                    <div class="tour-duration">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>4 ngày 4 đêm</span>
                                    </div>
                                    <div class="tour-departure">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Xuất phát: Hồ Chí Minh</span>
                                    </div>
                                </div>
                                <div class="tour-footer">
                                    <div class="tour-price">
                                        <span class="price-amount">52.990.000</span>
                                    </div>
                                    <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $_GET['tour_id'] ?? '1'; ?>" class="book-now-btn" style="text-decoration: none; display: inline-block;">Đặt ngay</a>
                                </div>
                            </div>
                        </div>

                        <div class="tour-card featured">
                            <div class="tour-image">
                                <img src="https://cdn.saigontimestravel.com/storage/images/retail/wp-content/uploads/2023/12/gioi-thieu-ve-dat-nuoc-nhat-ban-1.jpg"
                                    alt="Tour Nhật Bản">
                                <div class="tour-rating-badge">
                                    <i class="fa-solid fa-star"></i>
                                    4.98
                                </div>
                            </div>
                            <div class="tour-info">
                                <h3 class="tour-card-title">Tour du lịch Nhật Bản 5N4D</h3>
                                <div class="tour-details">
                                    <div class="tour-duration">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>5 ngày 4 đêm</span>
                                    </div>
                                    <div class="tour-departure">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Xuất phát: Hồ Chí Minh</span>
                                    </div>
                                </div>
                                <div class="tour-footer">
                                    <div class="tour-price">
                                        <span class="price-amount">68.990.000</span>
                                    </div>
                                    <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $_GET['tour_id'] ?? '1'; ?>" class="book-now-btn" style="text-decoration: none; display: inline-block;">Đặt ngay</a>
                                </div>
                            </div>
                        </div>

                        <div class="tour-card">
                            <div class="tour-image">
                                <img src="https://images2.thanhnien.vn/Uploaded/myquyen/2022_06_21/campuchia-9355.jpg"
                                    alt="Tour Campuchia">
                                <div class="tour-rating-badge">
                                    <i class="fa-solid fa-star"></i>
                                    4.85
                                </div>
                            </div>
                            <div class="tour-info">
                                <h3 class="tour-card-title">Tour du lịch Campuchia 3N2D</h3>
                                <div class="tour-details">
                                    <div class="tour-duration">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>3 ngày 2 đêm</span>
                                    </div>
                                    <div class="tour-departure">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Xuất phát: Hồ Chí Minh</span>
                                    </div>
                                </div>
                                <div class="tour-footer">
                                    <div class="tour-price">
                                        <span class="price-amount">12.990.000</span>
                                    </div>
                                    <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $_GET['tour_id'] ?? '1'; ?>" class="book-now-btn" style="text-decoration: none; display: inline-block;">Đặt ngay</a>
                                </div>
                            </div>
                        </div>

                        <div class="tour-card">
                            <div class="tour-image">
                                <img src="https://photo.znews.vn/w660/Uploaded/spivpdiv/2021_06_10/Spotlight_On_Blockchain_Regulation_And_Landscape_in_Malaysia_1_1.jpeg"
                                    alt="Tour Malaysia">
                                <div class="tour-rating-badge">
                                    <i class="fa-solid fa-star"></i>
                                    4.92
                                </div>
                            </div>
                            <div class="tour-info">
                                <h3 class="tour-card-title">Tour du lịch Malaysia 4N3D</h3>
                                <div class="tour-details">
                                    <div class="tour-duration">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>4 ngày 3 đêm</span>
                                    </div>
                                    <div class="tour-departure">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Xuất phát: Hồ Chí Minh</span>
                                    </div>
                                </div>
                                <div class="tour-footer">
                                    <div class="tour-price">
                                        <span class="price-amount">18.990.000</span>
                                    </div>
                                    <a href="index1.php?controller=payment&action=index&tour_id=<?php echo $_GET['tour_id'] ?? '1'; ?>" class="book-now-btn" style="text-decoration: none; display: inline-block;">Đặt ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="nav-arrow nav-arrow-right" id="nextTour">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <script>
            const toursGrid = document.getElementById('toursGrid');
            const prevBtn = document.getElementById('prevTour');
            const nextBtn = document.getElementById('nextTour');
            const tourCards = toursGrid.querySelectorAll('.tour-card');
            let currentIndex = 0;
            const visibleCards = 3; // Số lượng tour hiển thị cùng lúc

            function updateTours() {
                const cardWidth = tourCards[0].offsetWidth + 20; // 20 là gap
                toursGrid.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentIndex >= tourCards.length - visibleCards;
            }

            prevBtn.addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateTours();
                }
            });

            nextBtn.addEventListener('click', function() {
                if (currentIndex < tourCards.length - visibleCards) {
                    currentIndex++;
                    updateTours();
                }
            });

            // Khởi tạo vị trí ban đầu
            window.addEventListener('load', updateTours);
            window.addEventListener('resize', updateTours);
        </script>
        <!-- You Might Like Section -->
        <div class="main-content">
            <div class="you-might-like-section">
                <h2 class="section-title">Có thể bạn sẽ thích</h2>

                <div class="destinations-grid">
                    <div class="destination-card large">
                        <div class="destination-image">
                            <img src="https://vj-prod-website-cms.s3.ap-southeast-1.amazonaws.com/shutterstock1060601222huge-1676551521278.jpg"
                                alt="Singapore">
                            <div class="destination-overlay">
                                <div class="destination-label">SINGAPORE</div>
                            </div>
                        </div>
                    </div>

                    <div class="destination-card medium">
                        <div class="destination-image">
                            <img src="https://mekongheritage.vn/wp-content/uploads/2023/03/shutterstock_1196821240-1.jpg"
                                alt="Dubai">
                            <div class="destination-overlay">
                                <div class="destination-label">DUBAI</div>
                            </div>
                        </div>
                    </div>

                    <div class="destination-card medium">
                        <div class="destination-image">
                            <img src="https://res.cloudinary.com/dtljonz0f/image/upload/shutterstock_329662223_ss_non-editorial_3_csm8lw"
                                alt="New York">
                            <div class="destination-overlay">
                                <div class="destination-label">NEW YORK</div>
                            </div>
                        </div>
                    </div>

                    <div class="destination-card large">
                        <div class="destination-image">
                            <img src="https://images.ctfassets.net/wv75stsetqy3/3g3eYc9JHErfxMlj0I5Rg1/8944869cbe75632964eebfe9bc784eb8/Italy_Country_Guide.jpg?q=60&fit=fill&fm=webp"
                                alt="Italy">
                            <div class="destination-overlay">
                                <div class="destination-label">ITALY</div>
                            </div>
                        </div>
                    </div>

                    <div class="destination-card large">
                        <div class="destination-image">
                            <img src="https://erudera.com/media/images/germany-living.2e16d0ba.fill-16000x9000.jpg"
                                alt="Germany">
                            <div class="destination-overlay">
                                <div class="destination-label">GERMANY</div>
                            </div>
                        </div>
                    </div>

                    <div class="destination-card large">
                        <div class="destination-image">
                            <img src="https://eurotravel.com.vn/wp-content/uploads/2024/08/Su-thay-doi-trong-mui-gio-Thuy-Si.jpeg"
                                alt="Thụy Sĩ">
                            <div class="destination-overlay">
                                <div class="destination-label">THỤY SĨ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
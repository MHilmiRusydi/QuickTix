<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Event - QuickTix</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/tickets.png'); ?>">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #2C3E50;
            --accent-color: #E74C3C;
            --text-color: #333333;
            --background-color: #F5F6FA;
            --white: #FFFFFF;
            --success-color: #28a745;
            --danger-color: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-color);
            padding: 2rem;
        }

        /* --- NAVIGATION MODERN --- */
        .nav-container {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--white);
            padding: 1.1rem 2.2rem;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(74,144,226,0.13), 0 1.5px 6px rgba(44,62,80,0.07);
            max-width: 1200px;
            margin: 0 auto 2.2rem auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: box-shadow 0.3s, background 0.3s;
        }
        .nav-container:hover {
            box-shadow: 0 8px 32px rgba(74,144,226,0.18), 0 2px 8px rgba(44,62,80,0.09);
            background: #fafdff;
        }
        .nav-brand {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1px;
            transition: color 0.2s, transform 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-brand:hover {
            color: var(--accent-color);
            transform: scale(1.04) rotate(-2deg);
            text-shadow: 0 2px 8px rgba(74,144,226,0.08);
        }
        .nav-links {
            display: flex;
            gap: 1.7rem;
            align-items: center;
        }
        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.25s, background 0.25s, box-shadow 0.25s, transform 0.18s;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            position: relative;
            border-radius: 8px;
            padding: 0.55rem 1.1rem;
        }
        .nav-link:hover, .nav-link:focus {
            color: var(--primary-color);
            background: rgba(74,144,226,0.08);
            box-shadow: 0 2px 8px rgba(74,144,226,0.08);
            outline: none;
            transform: translateY(-2px) scale(1.04);
        }
        .nav-link:active {
            color: var(--accent-color);
            background: rgba(231,76,60,0.08);
            transform: scale(0.98);
        }
        .nav-link i {
            font-size: 1.15rem;
        }
        .nav-link.active {
            color: var(--primary-color);
            font-weight: 700;
            background: rgba(74,144,226,0.13);
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 7px;
            left: 18%;
            width: 64%;
            height: 2.5px;
            background-color: var(--primary-color);
            border-radius: 2px;
            opacity: 0.7;
        }
        .nav-link.btn-login, .nav-link.btn-register {
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 0.55rem 1.3rem;
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
            transition: background 0.25s, color 0.25s, box-shadow 0.25s, transform 0.18s;
        }
        .nav-link.btn-login {
            color: var(--white);
            background: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: 0 2px 8px rgba(74,144,226,0.13);
        }
        .nav-link.btn-login:hover, .nav-link.btn-login:focus {
            background: var(--white);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px) scale(1.05);
        }
        .nav-link.btn-register {
            background: #4A90E2;
            color: var(--white);
            border: 2px solid #4A90E2;
            box-shadow: 0 2px 8px rgba(74,144,226,0.13);
        }
        .nav-link.btn-register:hover, .nav-link.btn-register:focus {
            background: #357ABD;
            color: var(--white);
            border: 2px solid #357ABD;
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px) scale(1.05);
        }
        @media (max-width: 1024px) {
            .nav-container {
                padding: 0.8rem 1.2rem;
                border-radius: 12px;
            }
            .nav-brand {
                font-size: 1.4rem;
            }
            .nav-links {
                gap: 1.1rem;
            }
        }
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
                padding: 0.7rem 0.7rem;
                border-radius: 10px;
            }
            .nav-toggle {
                display: block !important;
                background: none;
                border: none;
                font-size: 2rem;
                color: var(--primary-color);
                cursor: pointer;
                margin-left: auto;
                transition: color 0.2s, transform 0.2s;
                z-index: 110;
            }
            .nav-toggle.active {
                color: var(--accent-color);
                transform: rotate(90deg) scale(1.1);
            }
            .nav-links {
                display: none;
                flex-direction: column;
                gap: 0.5rem;
                width: 100%;
                align-items: stretch;
                background: var(--white);
                border-radius: 10px;
                box-shadow: 0 4px 24px rgba(74,144,226,0.13);
                margin-top: 0.5rem;
                padding: 0.5rem 0;
                animation: navSlideDown 0.3s;
            }
            .nav-links.show {
                display: flex;
            }
            .nav-link {
                justify-content: flex-start;
                padding: 0.7rem 1rem;
                font-size: 1rem;
            }
            .nav-link.active::after {
                left: 18%;
                width: 50%;
                height: 3px;
                bottom: 6px;
            }
        }
        @keyframes navSlideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 480px) {
            .nav-container {
                padding: 0.6rem 0.3rem;
                border-radius: 8px;
            }
            .nav-brand {
                font-size: 2rem;
            }
            .nav-link {
                font-size: 1.15rem;
                padding: 1rem 1.2rem;
            }
            .nav-link.active::after {
                left: 22%;
                width: 40%;
                height: 3.5px;
                bottom: 4px;
            }
        }

        .search-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .filter-section {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: 2px solid var(--primary-color);
            border-radius: 20px;
            background: transparent;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn:hover {
            background: rgba(74, 144, 226, 0.1);
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.2);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .event-card {
            width: 100%;
            box-sizing: border-box;
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .event-card:hover {
            transform: translateY(-5px);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .event-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex: 1 1 auto;
            height: 100%;
        }

        .event-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--text-color);
            min-height: 2.6em;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .event-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .event-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .event-price {
            font-size: 1.2rem;
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .event-actions {
            display: flex;
            gap: 0.7rem;
            margin-top: auto;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(.4,2,.3,1), box-shadow 0.2s;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(74,144,226,0.08);
            will-change: transform, box-shadow;
        }

        .btn-detail, .btn-buy, .btn-search-event {
            transition: all 0.2s cubic-bezier(.4,2,.3,1), box-shadow 0.2s;
        }

        .btn:hover, .btn-detail:hover, .btn-buy:hover, .btn-search-event:hover {
            transform: scale(1.06) translateY(-2px);
            box-shadow: 0 6px 18px rgba(74,144,226,0.18), 0 1.5px 6px rgba(44,62,80,0.07);
            filter: brightness(1.07);
        }

        .btn:active, .btn-detail:active, .btn-buy:active, .btn-search-event:active {
            transform: scale(0.98);
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
        }

        .btn-detail {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-buy {
            background: var(--accent-color);
            color: var(--white);
        }

        .btn-search-event {
            background: var(--primary-color);
            color: var(--white);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            background: var(--white);
            width: 95%;
            max-width: 800px;
            margin: 20px auto;
            padding: 2rem;
            border-radius: 15px;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
            box-shadow: 0 5px 30px rgba(0,0,0,0.3);
            max-height: 90vh;
            overflow-y: auto;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Error State */
        .error-state {
            text-align: center;
            padding: 2rem;
            color: var(--danger-color);
        }

        .error-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        /* Event Detail Content */
        .event-detail-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .event-detail-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .event-detail-header h2 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .event-detail-image {
            max-width: 400px;
            max-height: 250px;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 30px rgba(74,144,226,0.15);
            border: 3px solid var(--primary-color);
        }

        .event-detail-image:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 40px rgba(74,144,226,0.25);
        }

        .event-detail-info {
            width: 100%;
            max-width: 500px;
            background: linear-gradient(135deg, #f5f6fa 60%, #e3f0ff 100%);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(74,144,226,0.08);
        }

        .event-detail-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
            padding: 0.8rem;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(44,62,80,0.04);
        }

        .event-detail-item:last-child {
            margin-bottom: 0;
        }

        .event-detail-item i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .event-detail-item .label {
            font-weight: 600;
            color: var(--secondary-color);
            min-width: 120px;
        }

        .event-detail-item .value {
            color: var(--text-color);
            font-weight: 500;
        }

        .event-detail-description {
            background: var(--white);
            padding: 1rem;
            border-radius: 10px;
            margin-top: 1rem;
            box-shadow: 0 2px 8px rgba(44,62,80,0.04);
            line-height: 1.6;
        }

        .event-detail-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .event-detail-btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            min-width: 140px;
            justify-content: center;
        }

        .event-detail-btn.primary {
            background: linear-gradient(90deg, #e74c3c 60%, #ffb347 100%);
            color: white;
        }

        .event-detail-btn.primary:hover {
            background: linear-gradient(90deg, #ffb347 0%, #e74c3c 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(231,76,60,0.3);
        }

        .event-detail-btn.secondary {
            background: var(--primary-color);
            color: white;
        }

        .event-detail-btn.secondary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(74,144,226,0.3);
        }

        .event-detail-btn.tertiary {
            background: #6c757d;
            color: white;
        }

        .event-detail-btn.tertiary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108,117,125,0.3);
        }



        /* Success Message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--success-color);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 2000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .success-message.show {
            opacity: 1;
            pointer-events: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-content {
                width: 98%;
                margin: 10px auto;
                padding: 1.5rem;
                max-height: 95vh;
            }

            .event-detail-header h2 {
                font-size: 1.5rem;
            }

            .event-detail-image {
                max-width: 100%;
                max-height: 200px;
            }

            .event-detail-info {
                padding: 1rem;
            }

            .event-detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.3rem;
            }

            .event-detail-item .label {
                min-width: auto;
                font-size: 0.9rem;
            }

            .event-detail-item .value {
                font-size: 0.9rem;
            }

            .event-detail-actions {
                flex-direction: column;
                gap: 0.8rem;
            }

            .event-detail-btn {
                width: 100%;
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                padding: 1rem;
                margin: 5px auto;
            }

            .event-detail-header h2 {
                font-size: 1.3rem;
            }

            .event-detail-image {
                max-height: 150px;
            }

            .event-detail-info {
                padding: 0.8rem;
            }

            .event-detail-item {
                padding: 0.6rem;
            }

            .event-detail-item i {
                font-size: 1rem;
            }

            .event-detail-item .label,
            .event-detail-item .value {
                font-size: 0.85rem;
            }

            .event-detail-btn {
                padding: 0.7rem 1rem;
                font-size: 0.9rem;
            }
        }

        /* Accessibility Improvements */
        .modal-content:focus {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }

        .event-detail-btn:focus {
            outline: 2px solid var(--white);
            outline-offset: 2px;
        }

        .share-btn:focus {
            outline: 2px solid var(--white);
            outline-offset: 1px;
        }

        /* High Contrast Mode Support */
        @media (prefers-contrast: high) {
            .event-detail-item {
                border: 2px solid var(--text-color);
            }

            .event-detail-btn {
                border: 2px solid var(--white);
            }
        }

        /* Reduced Motion Support */
        @media (prefers-reduced-motion: reduce) {
            .modal-content,
            .event-detail-image,
            .event-detail-btn,
            .share-btn,
            .success-message {
                transition: none;
            }

            .spinner {
                animation: none;
            }
        }

        .modal.show .modal-content {
            transform: translateY(0);
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-color);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            background: rgba(0,0,0,0.1);
            color: var(--accent-color);
        }

        /* Detail Modal Styles */
        .event-detail-content {
            margin-top: 1rem;
        }

        .event-detail-content h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .event-detail-content img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .event-detail-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: var(--text-color);
        }

        .event-detail-content p strong {
            color: var(--secondary-color);
            font-weight: 600;
        }

        /* Buy Modal Styles */
        .buy-loading-spinner {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            text-align: center;
        }

        .buy-loading-spinner p {
            margin-top: 1rem;
            color: var(--secondary-color);
            font-weight: 500;
        }

        .buy-error-state {
            text-align: center;
            padding: 2rem;
            color: var(--danger-color);
        }

        .buy-error-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .buy-error-state h3 {
            margin-bottom: 1rem;
            color: var(--danger-color);
        }

        .buy-content-container {
            animation: modalFadeIn 0.3s ease forwards;
        }

        .buy-form {
            margin-top: 1.5rem;
        }

        .buy-form-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .buy-form-header h2 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .buy-form-header .event-info {
            background: linear-gradient(135deg, #f5f6fa 60%, #e3f0ff 100%);
            padding: 1rem;
            border-radius: 10px;
            margin-top: 1rem;
            box-shadow: 0 2px 8px rgba(74,144,226,0.08);
        }

        .event-info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .event-info-item:last-child {
            margin-bottom: 0;
        }

        .event-info-item .label {
            color: var(--secondary-color);
            font-weight: 500;
        }

        .event-info-item .value {
            color: var(--text-color);
            font-weight: 600;
        }

        .buy-form-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            gap: 1rem;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            background: #f8f9fa;
            color: var(--secondary-color);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .step-indicator.active {
            background: var(--primary-color);
            color: white;
        }

        .step-indicator.completed {
            background: var(--success-color);
            color: white;
        }

        .step-indicator .step-number {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .buy-form {
            margin-top: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
            transform: translateY(-1px);
        }

        .form-group input[type="number"] {
            width: 120px;
            text-align: center;
            font-weight: 600;
        }

        .form-group small {
            display: block;
            margin-top: 0.5rem;
            color: var(--secondary-color);
            font-size: 0.85rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 2px solid var(--primary-color);
            background: var(--white);
            color: var(--primary-color);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .quantity-btn:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: scale(1.1);
        }

        .quantity-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .price-summary {
            background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
            padding: 1.5rem;
            border-radius: 12px;
            border: 2px solid #ffe0e0;
            margin: 1.5rem 0;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.8rem;
            font-size: 1rem;
        }

        .price-item:last-child {
            margin-bottom: 0;
            padding-top: 0.8rem;
            border-top: 1px solid #ffe0e0;
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--accent-color);
        }

        .price-item .label {
            color: var(--secondary-color);
        }

        .price-item .value {
            color: var(--text-color);
            font-weight: 500;
        }

        .price-item:last-child .value {
            color: var(--accent-color);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .buy-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
            min-width: 140px;
        }

        .buy-btn.primary {
            background: linear-gradient(90deg, #e74c3c 60%, #ffb347 100%);
            color: white;
            width: 100%;
            margin-top: 1rem;
        }

        .buy-btn.primary:hover {
            background: linear-gradient(90deg, #ffb347 0%, #e74c3c 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(231,76,60,0.3);
        }

        .buy-btn.secondary {
            background: var(--primary-color);
            color: white;
        }

        .buy-btn.secondary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(74,144,226,0.3);
        }

        .buy-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            margin: 1.5rem 0;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
        }

        .terms-checkbox input[type="checkbox"] {
            width: auto;
            margin-top: 0.2rem;
        }

        .terms-checkbox label {
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.4;
            color: var(--text-color);
        }

        .terms-checkbox a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Responsive Design untuk Buy Modal */
        @media (max-width: 768px) {
            .buy-form-header h2 {
                font-size: 1.5rem;
            }

            .buy-form-steps {
                flex-direction: column;
                gap: 0.5rem;
            }

            .step-indicator {
                justify-content: center;
            }

            .quantity-controls {
                justify-content: center;
            }

            .form-group input[type="number"] {
                width: 100px;
            }

            .price-summary {
                padding: 1rem;
            }

            .price-item {
                font-size: 0.9rem;
            }

            .price-item:last-child {
                font-size: 1rem;
            }

            .buy-btn {
                padding: 0.8rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            .buy-form-header h2 {
                font-size: 1.3rem;
            }

            .event-info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.2rem;
            }

            .quantity-controls {
                gap: 0.5rem;
            }

            .quantity-btn {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

            .form-group input[type="number"] {
                width: 80px;
                font-size: 0.9rem;
            }

            .price-summary {
                padding: 0.8rem;
            }

            .price-item {
                font-size: 0.85rem;
            }

            .price-item:last-child {
                font-size: 0.95rem;
            }

            .buy-btn {
                padding: 0.7rem 1rem;
                font-size: 0.9rem;
            }

            .terms-checkbox {
                padding: 0.8rem;
                font-size: 0.85rem;
            }
        }

        /* Animation for modal content */
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-content {
            animation: modalFadeIn 0.3s ease forwards;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success {
            background: var(--success-color);
            color: var(--white);
        }

        .alert-error {
            background: var(--danger-color);
            color: var(--white);
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .alert i {
            font-size: 1.2rem;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .search-input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(74,144,226,0.08);
        }

        .clear-search-btn {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 0.3rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
        }

        .clear-search-btn:hover {
            background: rgba(0,0,0,0.1);
            color: var(--danger-color);
            transform: translateY(-50%) scale(1.1);
        }

        .clear-search-btn:active {
            transform: translateY(-50%) scale(0.95);
        }

        .btn-search-event:hover {
            background: #357ABD;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .results-info {
            background: var(--white);
            padding: 1rem 2rem;
            border-radius: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            color: var(--text-color);
            font-weight: 500;
            text-align: center;
        }

        .pagination-wrapper {
            background: var(--white);
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .pagination-nav {
            display: flex;
            justify-content: center;
        }

        .pagination-list {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .pagination-item {
            margin: 0;
        }

        .pagination-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            background: #f8f9fa;
            position: relative;
            overflow: hidden;
        }

        .pagination-link:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
            border-color: var(--primary-color);
        }

        .pagination-link:active {
            transform: translateY(0);
        }

        .pagination-current {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .pagination-first,
        .pagination-last {
            width: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
            border-color: transparent;
        }

        .pagination-first:hover,
        .pagination-last:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .pagination-prev,
        .pagination-next {
            width: 50px;
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: var(--white);
            border-color: transparent;
        }

        .pagination-prev:hover,
        .pagination-next:hover {
            background: linear-gradient(135deg, #357ABD 0%, #4A90E2 100%);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
        }

        .pagination-ellipsis {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
        }

        .pagination-ellipsis-text {
            color: var(--text-color);
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* Responsive Pagination */
        @media (max-width: 768px) {
            .pagination-list {
                gap: 0.3rem;
            }

            .pagination-link {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
            }

            .pagination-first,
            .pagination-last,
            .pagination-prev,
            .pagination-next {
                width: 45px;
            }

            .results-info {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .pagination-list {
                gap: 0.2rem;
            }

            .pagination-link {
                width: 35px;
                height: 35px;
                font-size: 0.8rem;
            }

            .pagination-first,
            .pagination-last,
            .pagination-prev,
            .pagination-next {
                width: 40px;
            }

            .pagination-ellipsis {
                width: 35px;
                height: 35px;
            }
        }

        /* Animation for pagination */
        .pagination-link {
            animation: fadeInUp 0.3s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effects with ripple */
        .pagination-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.3s ease, height 0.3s ease;
        }

        .pagination-link:hover::before {
            width: 100%;
            height: 100%;
        }

        /* No results styling */
        .no-results {
            text-align: center;
            padding: 3rem;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .no-results i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .no-results h3 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .no-results p {
            color: #666;
        }

        /* Lightbox Styles */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            opacity: 0;
            transition: opacity 0.3s ease;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .lightbox-modal.show {
            opacity: 1;
            display: flex;
        }

        .lightbox-image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transform: scale(0.8);
            transition: transform 0.3s ease;
            width: auto;
            height: auto;
        }

        .lightbox-modal.show .lightbox-content {
            transform: scale(1);
        }

        .lightbox-close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 2001;
            transition: all 0.3s ease;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.5);
        }

        .lightbox-close:hover,
        .lightbox-close:focus {
            color: #bbb;
            text-decoration: none;
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
        }

        .lightbox-controls {
            position: absolute;
            top: 15px;
            left: 35px;
            display: flex;
            gap: 10px;
            z-index: 2001;
        }

        .lightbox-btn {
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .lightbox-btn:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
            color: #fff;
        }

        .lightbox-btn:active {
            transform: scale(0.95);
        }

        .lightbox-caption {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: white;
            padding: 15px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        /* Event detail image styles */
        .event-detail-content img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .event-detail-content img:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        /* Zoom indicator */
        .event-detail-content img::after {
            content: "🔍";
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 8px;
            border-radius: 50%;
            font-size: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .event-detail-content img:hover::after {
            opacity: 1;
        }

        /* Responsive lightbox */
        @media (max-width: 768px) {
            .lightbox-image-container {
                padding: 10px;
            }
            
            .lightbox-content {
                max-width: 95%;
                max-height: 85%;
            }
            
            .lightbox-close {
                top: 10px;
                right: 20px;
                font-size: 30px;
                width: 40px;
                height: 40px;
            }
            
            .lightbox-controls {
                top: 10px;
                left: 20px;
                gap: 8px;
            }
            
            .lightbox-btn {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
            
            .lightbox-caption {
                bottom: 10px;
                width: 90%;
                font-size: 1rem;
                padding: 10px;
            }
        }

        /* Responsive Design - Main Breakpoints */
        @media (max-width: 1024px) {
            body {
                padding: 1.5rem;
            }
            
            .nav-container {
                padding: 0.8rem 1.5rem;
            }
            
            .events-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .nav-container {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
                padding: 0.7rem 0.7rem;
            }
            
            .nav-toggle {
                display: block !important;
                background: none;
                border: none;
                font-size: 2rem;
                color: var(--primary-color);
                cursor: pointer;
                margin-left: auto;
                transition: color 0.2s, transform 0.2s;
                z-index: 110;
            }
            .nav-toggle.active {
                color: var(--accent-color);
                transform: rotate(90deg) scale(1.1);
            }
            .nav-links {
                display: none;
                flex-direction: column;
                gap: 0.5rem;
                width: 100%;
                align-items: stretch;
                background: var(--white);
                border-radius: 10px;
                box-shadow: 0 4px 24px rgba(74,144,226,0.13);
                margin-top: 0.5rem;
                padding: 0.5rem 0;
                animation: navSlideDown 0.3s;
            }
            .nav-links.show {
                display: flex;
            }
            .nav-link {
                justify-content: flex-start;
                padding: 0.7rem 1rem;
                font-size: 1rem;
            }
            .nav-link.active::after {
                left: 18%;
                width: 50%;
                height: 3px;
                bottom: 6px;
            }
        }
        @keyframes navSlideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            body {
                padding: 0.5rem;
            }
            
            .nav-container {
                padding: 0.6rem 0.3rem;
                border-radius: 8px;
            }
            .nav-brand {
                font-size: 2rem;
            }
            .nav-link {
                font-size: 1.15rem;
                padding: 1rem 1.2rem;
            }
            .nav-link.active::after {
                left: 22%;
                width: 40%;
                height: 3.5px;
                bottom: 4px;
            }
            
            .search-bar {
                margin-bottom: 1rem;
            }
            
            .search-input {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }
            
            .btn-search-event {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
            
            .filter-section {
                padding: 0.8rem;
            }
            
            .filter-section h2 {
                font-size: 1.2rem;
                margin-bottom: 0.8rem;
            }
            
            .filter-group {
                gap: 0.3rem;
            }
            
            .filter-btn {
                padding: 0.3rem 0.6rem;
                font-size: 0.8rem;
            }
            
            .events-grid {
                gap: 1rem;
            }
            
            .event-content {
                padding: 1rem;
            }
            
            .event-title {
                font-size: 1.1rem;
            }
            
            .event-price {
                font-size: 1.1rem;
            }
            
            .modal-content {
                width: 98%;
                margin: 10px auto;
                padding: 1rem;
            }
            
            .close-modal {
                top: 0.5rem;
                right: 0.5rem;
                font-size: 1.2rem;
            }
        }

        /* Modal Konfirmasi Logout (User) */
        .modal-logout {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(44,62,80,0.18);
            align-items: center;
            justify-content: center;
        }

        .modal-logout-content {
            background: #fff;
            padding: 2rem 1.5rem;
            border-radius: 14px;
            box-shadow: 0 8px 32px rgba(74,144,226,0.18);
            max-width: 340px;
            width: 90%;
            text-align: center;
            position: relative;
            animation: modalFadeIn 0.2s;
        }

        @keyframes modalFadeIn { from { opacity:0; transform:translateY(20px);} to { opacity:1; transform:translateY(0);} }
        .modal-logout.show { display:flex !important; }
        .modal-logout .modal-logout-content { animation: modalFadeIn 0.2s; }
        .modal-logout button:hover { filter:brightness(0.95); }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url(); ?>" class="nav-brand">QuickTix</a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle Navigation" style="display:none;">
            <i class="fas fa-bars"></i>
        </button>
        <div class="nav-links" id="navLinks">
            <?php if($this->session->userdata('logged_in')): ?>
                <a href="<?php echo base_url('events/search'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'events' ? 'active' : ''; ?>">
                    <i class="fas fa-search"></i>
                    Cari Event
                </a>
                <a href="<?php echo base_url('tickets'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'tickets' ? 'active' : ''; ?>">
                    <i class="fas fa-ticket-alt"></i>
                    Tiket Saya
                </a>
                <?php if($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?php echo base_url('admin'); ?>" class="nav-link" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                        <i class="fas fa-crown"></i>
                        Admin Panel
                    </a>
                <?php endif; ?>
                <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link" id="logoutLink">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            <?php else: ?>
                <a href="<?php echo base_url('events/search'); ?>" class="nav-link active">
                    <i class="fas fa-search"></i>
                    Cari Event
                </a>
                <a href="<?php echo base_url('auth/login'); ?>" class="nav-link btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk
                </a>
                <a href="<?php echo base_url('auth/register'); ?>" class="nav-link btn-register">
                    <i class="fas fa-user-plus"></i>
                    Daftar
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="search-container">
        <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <?php if(!$this->session->userdata('logged_in')): ?>
        <div class="alert alert-info" style="background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;">
            <i class="fas fa-info-circle"></i>
            <strong>Info:</strong> Silakan <a href="<?php echo base_url('auth/login'); ?>" style="color: #0c5460; text-decoration: underline; font-weight: 600;">login</a> terlebih dahulu untuk membeli tiket event.
        </div>
        <?php endif; ?>

        <div class="search-bar" style="margin-bottom:1.5rem;display:flex;gap:0.5rem;align-items:center;">
            <form method="get" action="" style="width:100%;display:flex;gap:0.5rem;">
                <div style="position:relative;flex:1;">
                    <input type="text" name="q" id="searchInput" value="<?php echo htmlspecialchars($this->input->get('q') ?? ''); ?>" placeholder="Cari nama event..." class="search-input" style="width:100%;padding:0.7rem 1rem;padding-right:2.5rem;border:2px solid #e1e1e1;border-radius:8px;font-size:1rem;">
                </div>
                <button type="submit" class="btn-search-event" style="background:var(--primary-color);color:#fff;border:none;padding:0.7rem 1.5rem;border-radius:8px;font-weight:600;display:flex;align-items:center;gap:0.5rem;cursor:pointer;transition:all 0.3s;">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>

        <div class="filter-section">
            <h2>Filter Event</h2>
            <br>
            <div class="filter-group">
                <button class="filter-btn <?php echo !$this->input->get('type') || $this->input->get('type') === 'all' ? 'active' : ''; ?>" data-type="all">Semua</button>
                <button class="filter-btn <?php echo $this->input->get('type') === 'Festival' ? 'active' : ''; ?>" data-type="Festival">Festival</button>
                <button class="filter-btn <?php echo $this->input->get('type') === 'Workshop' ? 'active' : ''; ?>" data-type="Workshop">Workshop</button>
                <button class="filter-btn <?php echo $this->input->get('type') === 'Konser' ? 'active' : ''; ?>" data-type="Konser">Konser</button>
            </div>
        </div>

        <div class="events-grid">
            <?php foreach($events as $event): ?>
            <div class="event-card">
                <img src="<?php echo base_url($event['image_url']); ?>" alt="<?php echo $event['event_name']; ?>" class="event-image">
                <div class="event-content">
                    <h3 class="event-title" style="margin-bottom:0.7rem;"><?php echo $event['event_name']; ?></h3>
                    <div class="event-details" style="margin-bottom:0.7rem;">
                        <div class="event-detail">
                            <i class="fas fa-calendar"></i>
                            <?php echo date('d M Y H:i', strtotime($event['date'])); ?>
                        </div>
                    </div>
                    <div class="event-price" style="margin-bottom:1rem;">
                        <i class="fas fa-money-bill-wave"></i> Rp <?php echo number_format($event['price'], 0, ',', '.'); ?>
                    </div>
                    <div class="event-actions" style="display:flex;gap:0.7rem;">
                        <button class="btn btn-detail" onclick="showEventDetail(<?php echo $event['id']; ?>)">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </button>
                        <button class="btn btn-buy" onclick="showBuyModal(<?php echo $event['id']; ?>)">
                            <i class="fas fa-shopping-cart"></i> Beli
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination dan Info Hasil -->
        <div class="pagination-container">
            <?php if($total_records > 0): ?>
                <div class="results-info">
                    Menampilkan <?php echo (($current_page - 1) * $per_page) + 1; ?> - 
                    <?php echo min($current_page * $per_page, $total_records); ?> 
                    dari <?php echo $total_records; ?> event
                </div>
                
                <?php if($pagination): ?>
                    <div class="pagination-wrapper">
                        <?php echo $pagination; ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <h3>Tidak ada event yang ditemukan</h3>
                    <p>Coba ubah filter atau kata kunci pencarian Anda</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal Detail Event -->
    <div id="detailModal" class="modal" role="dialog" aria-labelledby="eventDetailTitle" aria-hidden="true">
        <div class="modal-content" tabindex="-1">
            <span class="close-modal" onclick="closeDetailModal()" aria-label="Tutup modal">&times;</span>
            <div id="eventDetailContent">
                <!-- Loading State -->
                <div id="loadingState" class="loading-spinner" style="display: none;">
                    <div class="spinner"></div>
                    <p>Memuat detail event...</p>
                </div>
                
                <!-- Error State -->
                <div id="errorState" class="error-state" style="display: none;">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>Terjadi Kesalahan</h3>
                    <p id="errorMessage">Gagal memuat detail event. Silakan coba lagi.</p>
                    <button onclick="retryLoadEvent()" class="event-detail-btn secondary">
                        <i class="fas fa-redo"></i> Coba Lagi
                    </button>
                </div>
                
                <!-- Content State -->
                <div id="contentState" class="event-detail-container" style="display: none;">
                    <!-- Content will be loaded here -->
                </div>
                <div id="detailModalBackBtnContainer" style="display: flex; justify-content: center; margin-top: 2rem;">
                    <button type="button" class="event-detail-btn tertiary" id="detailModalBackBtn" style="min-width: 160px; box-shadow: 0 2px 8px rgba(44,62,80,0.08);">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="success-message">
        <i class="fas fa-check-circle"></i>
        <span id="successText">Berhasil!</span>
    </div>

    <!-- Modal Pembelian -->
    <div id="buyModal" class="modal" role="dialog" aria-labelledby="buyModalTitle" aria-hidden="true">
        <div class="modal-content" tabindex="-1">
            <span class="close-modal" onclick="closeBuyModal()" aria-label="Tutup modal pembelian">&times;</span>
            <div id="buyFormContent">
                <!-- Loading State -->
                <div id="buyLoadingState" class="buy-loading-spinner" style="display: none;">
                    <div class="spinner"></div>
                    <p>Memuat form pembelian...</p>
                </div>
                
                <!-- Error State -->
                <div id="buyErrorState" class="buy-error-state" style="display: none;">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>Terjadi Kesalahan</h3>
                    <p id="buyErrorMessage">Gagal memuat form pembelian. Silakan coba lagi.</p>
                    <button onclick="retryLoadBuyForm()" class="buy-btn secondary">
                        <i class="fas fa-redo"></i> Coba Lagi
                    </button>
                </div>
                
                <!-- Content State -->
                <div id="buyContentState" class="buy-content-container" style="display: none;">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal untuk Gambar -->
    <div id="imageLightbox" class="lightbox-modal">
        <span class="lightbox-close" onclick="closeImageLightbox()">&times;</span>
        <div class="lightbox-controls">
            <button class="lightbox-btn" onclick="zoomImage('in')" title="Zoom In (+)">
                <i class="fas fa-search-plus"></i>
            </button>
            <button class="lightbox-btn" onclick="zoomImage('out')" title="Zoom Out (-)">
                <i class="fas fa-search-minus"></i>
            </button>
            <button class="lightbox-btn" onclick="zoomImage('reset')" title="Reset Zoom (0)">
                <i class="fas fa-expand-arrows-alt"></i>
            </button>
        </div>
        <div class="lightbox-image-container">
            <img id="lightboxImage" class="lightbox-content" alt="Event Image">
        </div>
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>

    <!-- Modal Konfirmasi Logout (User) -->
    <div id="logoutModal" class="modal-logout" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(44,62,80,0.18);align-items:center;justify-content:center;">
        <div class="modal-logout-content" style="background:#fff;padding:2rem 1.5rem;border-radius:14px;box-shadow:0 8px 32px rgba(74,144,226,0.18);max-width:340px;width:90%;text-align:center;position:relative;animation:modalFadeIn 0.2s;">
            <i class="fas fa-sign-out-alt" style="font-size:2.2rem;color:#4A90E2;margin-bottom:0.7rem;"></i>
            <h3 style="color:#2C3E50;margin-bottom:0.7rem;">Konfirmasi Logout</h3>
            <p style="color:#555;margin-bottom:1.5rem;">Apakah Anda yakin ingin logout?</p>
            <div style="display:flex;gap:1rem;justify-content:center;">
                <button id="cancelLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#eee;color:#333;font-weight:500;cursor:pointer;transition:background 0.2s;">Batal</button>
                <button id="confirmLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#4A90E2;color:#fff;font-weight:500;cursor:pointer;box-shadow:0 2px 8px rgba(74,144,226,0.10);transition:background 0.2s;">Ya, Logout</button>
            </div>
        </div>
    </div>
    <style>
    @keyframes modalFadeIn { from { opacity:0; transform:translateY(20px);} to { opacity:1; transform:translateY(0);} }
    .modal-logout.show { display:flex !important; }
    .modal-logout .modal-logout-content { animation: modalFadeIn 0.2s; }
    .modal-logout button:hover { filter:brightness(0.95); }
    </style>
    <script>
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const type = this.getAttribute('data-type');
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Ambil parameter pencarian yang ada
                const urlParams = new URLSearchParams(window.location.search);
                const searchQuery = urlParams.get('q');
                
                // Buat URL baru dengan parameter type dan q
                let newUrl = `<?php echo base_url('events/search'); ?>?type=${type}`;
                if (searchQuery) {
                    newUrl += `&q=${encodeURIComponent(searchQuery)}`;
                }
                
                // Redirect ke URL baru
                window.location.href = newUrl;
            });
        });

        // Modal functions
        let currentEventId = null;

        function showEventDetail(eventId) {
            currentEventId = eventId;
            const modal = document.getElementById('detailModal');
            const loadingState = document.getElementById('loadingState');
            const errorState = document.getElementById('errorState');
            const contentState = document.getElementById('contentState');

            // Show modal and loading state
            modal.style.display = 'block';
            setTimeout(() => modal.classList.add('show'), 10);
            
            loadingState.style.display = 'flex';
            errorState.style.display = 'none';
            contentState.style.display = 'none';

            fetch(`<?php echo base_url('events/get_detail/'); ?>${eventId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(event => {
                    // Hide loading, show content
                    loadingState.style.display = 'none';
                    contentState.style.display = 'flex';
                    
                    // Format harga dengan pemisah ribuan yang benar
                    const formattedPrice = new Intl.NumberFormat('id-ID').format(event.price);
                    const formattedDate = new Date(event.date).toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    const content = `
                        <div class="event-detail-header">
                            <h2 id="eventDetailTitle">${event.event_name}</h2>
                        </div>
                        
                        <img src="<?php echo base_url(); ?>${event.image_url}" 
                             alt="${event.event_name}" 
                             class="event-detail-image"
                             onclick="openImageLightbox('<?php echo base_url(); ?>${event.image_url}', '${event.event_name}')"
                             title="Klik untuk melihat gambar penuh">

                            <div style="margin-top:0.5rem;font-size:0.95em;color:#888;display:flex;align-items:center;justify-content:center;gap:0.4em;">
                                <i class='fas fa-info-circle'></i> klik foto untuk memperbesar / melihat keseluruhan
                            </div>
                        
                        <div class="event-detail-info">
                            <div class="event-detail-item">
                                <i class="fas fa-tag" style="color: var(--primary-color);"></i>
                                <span class="label">Tipe Event:</span>
                                <span class="value">${event.event_type}</span>
                            </div>
                            <div class="event-detail-item">
                                <i class="fas fa-map-marker-alt" style="color: var(--accent-color);"></i>
                                <span class="label">Lokasi:</span>
                                <span class="value">${event.location}</span>
                            </div>
                            <div class="event-detail-item">
                                <i class="fas fa-calendar" style="color: var(--secondary-color);"></i>
                                <span class="label">Tanggal:</span>
                                <span class="value">${formattedDate}</span>
                            </div>
                            <div class="event-detail-item">
                                <i class="fas fa-ticket-alt" style="color: var(--success-color);"></i>
                                <span class="label">Tiket Tersedia:</span>
                                <span class="value">${event.available_tickets}</span>
                            </div>
                            <div class="event-detail-item">
                                <i class="fas fa-money-bill-wave" style="color: var(--accent-color);"></i>
                                <span class="label">Harga:</span>
                                <span class="value">Rp ${formattedPrice}</span>
                            </div>
                            
                            <div class="event-detail-description">
                                <strong><i class="fas fa-info-circle" style="color: var(--primary-color);"></i> Deskripsi:</strong><br>
                                ${event.description}
                            </div>
                        </div>
                        
                        <div class="event-detail-actions">
                            <button class="event-detail-btn primary" onclick="showBuyModal(${event.id})">
                                <i class="fas fa-shopping-cart"></i> Beli Tiket
                            </button>
                            <button id="copyEventLink" class="event-detail-btn secondary" type="button">
                                <i class="fas fa-link"></i> Salin Link Event
                            </button>
                        </div>
                    `;
                    
                    contentState.innerHTML = content;
                    
                    // Add event listeners
                    setupEventDetailListeners(event);
                })
                .catch(error => {
                    console.error('Error loading event details:', error);
                    loadingState.style.display = 'none';
                    errorState.style.display = 'block';
                    document.getElementById('errorMessage').textContent = 
                        'Gagal memuat detail event. Silakan periksa koneksi internet Anda dan coba lagi.';
                });
        }

        function setupEventDetailListeners(event) {
            // Copy link functionality
            const copyBtn = document.getElementById('copyEventLink');
            if (copyBtn) {
                copyBtn.onclick = function() {
                    const url = new URL(window.location.origin + window.location.pathname);
                    url.searchParams.set('q', event.event_name);
                    
                    navigator.clipboard.writeText(url.toString()).then(() => {
                        showSuccessMessage('Link event berhasil disalin!');
                        this.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
                        setTimeout(() => {
                            this.innerHTML = '<i class="fas fa-link"></i> Salin Link Event';
                        }, 2000);
                    }).catch(() => {
                        showSuccessMessage('Gagal menyalin link. Silakan coba lagi.');
                    });
                };
            }
        }

        function retryLoadEvent() {
            if (currentEventId) {
                showEventDetail(currentEventId);
            }
        }

        function showSuccessMessage(message) {
            const successMsg = document.getElementById('successMessage');
            const successText = document.getElementById('successText');
            if (!successMsg || !successText) return; // Proteksi jika elemen tidak ditemukan
            successText.textContent = message;
            successMsg.classList.add('show');
            setTimeout(() => {
                successMsg.classList.remove('show');
            }, 3000);
        }



        // Keyboard navigation and accessibility
        document.addEventListener('keydown', function(e) {
            const detailModal = document.getElementById('detailModal');
            const buyModal = document.getElementById('buyModal');
            
            // Detail Modal
            if (detailModal.style.display === 'block') {
                if (e.key === 'Escape') {
                    closeDetailModal();
                }
                if (e.key === 'Tab') {
                    const focusableElements = detailModal.querySelectorAll(
                        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
                    );
                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];
                    
                    if (e.shiftKey) {
                        if (document.activeElement === firstElement) {
                            e.preventDefault();
                            lastElement.focus();
                        }
                    } else {
                        if (document.activeElement === lastElement) {
                            e.preventDefault();
                            firstElement.focus();
                        }
                    }
                }
            }
            
            // Buy Modal
            if (buyModal.style.display === 'block') {
                if (e.key === 'Escape') {
                    closeBuyModal();
                }
                if (e.key === 'Tab') {
                    const focusableElements = buyModal.querySelectorAll(
                        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
                    );
                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];
                    
                    if (e.shiftKey) {
                        if (document.activeElement === firstElement) {
                            e.preventDefault();
                            lastElement.focus();
                        }
                    } else {
                        if (document.activeElement === lastElement) {
                            e.preventDefault();
                            firstElement.focus();
                        }
                    }
                }
            }
        });

        // Close modal when clicking outside
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });

        document.getElementById('buyModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBuyModal();
            }
        });

        // Focus management
        function trapFocus(element) {
            const focusableElements = element.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            
            if (focusableElements.length > 0) {
                focusableElements[0].focus();
            }
        }

        // Auto-focus modal content when opened
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                    const modal = document.getElementById('detailModal');
                    if (modal.style.display === 'block') {
                        setTimeout(() => {
                            const contentState = document.getElementById('contentState');
                            if (contentState.style.display === 'flex') {
                                trapFocus(modal);
                            }
                        }, 100);
                    }
                }
            });
        });

        observer.observe(document.getElementById('detailModal'), {
            attributes: true,
            attributeFilter: ['style']
        });

        let currentBuyEventId = null;

        function showBuyModal(eventId) {
            currentBuyEventId = eventId;
            const modal = document.getElementById('buyModal');
            const loadingState = document.getElementById('buyLoadingState');
            const errorState = document.getElementById('buyErrorState');
            const contentState = document.getElementById('buyContentState');

            // Show modal and loading state
            modal.style.display = 'block';
            setTimeout(() => modal.classList.add('show'), 10);
            
            loadingState.style.display = 'flex';
            errorState.style.display = 'none';
            contentState.style.display = 'none';

            fetch(`<?php echo base_url('events/get_detail/'); ?>${eventId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(event => {
                    // Hide loading, show content
                    loadingState.style.display = 'none';
                    contentState.style.display = 'block';
                    
                    const maxQuantity = Math.min(event.available_tickets, 10); // Maksimal 10 tiket per transaksi
                    const formattedPrice = new Intl.NumberFormat('id-ID').format(event.price);
                    const formattedDate = new Date(event.date).toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    const content = `
                        <div class="buy-form-header">
                            <h2 id="buyModalTitle">Beli Tiket Event</h2>
                            <div class="event-info">
                                <div class="event-info-item">
                                    <span class="label">Event:</span>
                                    <span class="value">${event.event_name}</span>
                                </div>
                                <div class="event-info-item">
                                    <span class="label">Lokasi:</span>
                                    <span class="value">${event.location}</span>
                                </div>
                                <div class="event-info-item">
                                    <span class="label">Tanggal:</span>
                                    <span class="value">${formattedDate}</span>
                                </div>
                                <div class="event-info-item">
                                    <span class="label">Harga per Tiket:</span>
                                    <span class="value">Rp ${formattedPrice}</span>
                                </div>
                            </div>
                        </div>

                        <div class="buy-form-steps">
                            <div class="step-indicator active">
                                <span class="step-number">1</span>
                                <span>Pilih Jumlah</span>
                            </div>
                            <div class="step-indicator">
                                <span class="step-number">2</span>
                                <span>Pembayaran</span>
                            </div>
                            <div class="step-indicator">
                                <span class="step-number">3</span>
                                <span>Selesai</span>
                            </div>
                        </div>

                        <form action="<?php echo base_url('events/buy'); ?>" method="POST" class="buy-form" id="buyTicketForm">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="ticket_id" value="${event.id}">
                            
                            <div class="form-group">
                                <label for="quantity">Jumlah Tiket</label>
                                <div class="quantity-controls">
                                    <button type="button" class="quantity-btn" onclick="changeQuantity(-1)" id="decreaseBtn">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" id="quantity" name="quantity" min="1" max="${maxQuantity}" value="1" required 
                                           onchange="updateTotalPrice(this.value, ${event.price})" oninput="validateQuantity(this)">
                                    <button type="button" class="quantity-btn" onclick="changeQuantity(1)" id="increaseBtn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <small>Maksimal ${maxQuantity} tiket per transaksi • Tiket tersedia: ${event.available_tickets}</small>
                            </div>

                            <div class="form-group">
                                <label for="payment_method">Metode Pembayaran</label>
                                <select id="payment_method" name="payment_method" required>
                                    <option value="">Pilih metode pembayaran</option>
                                    <option value="transfer_bank">Transfer Bank</option>
                                    <option value="e_wallet">E-Wallet (DANA, OVO, GoPay)</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>

                            <div class="price-summary">
                                <div class="price-item">
                                    <span class="label">Harga per Tiket:</span>
                                    <span class="value">Rp ${formattedPrice}</span>
                                </div>
                                <div class="price-item">
                                    <span class="label">Jumlah Tiket:</span>
                                    <span class="value" id="quantityDisplay">1</span>
                                </div>
                                <div class="price-item">
                                    <span class="label">Total Harga:</span>
                                    <span class="value" id="totalPrice">Rp ${formattedPrice}</span>
                                </div>
                            </div>

                            <div class="terms-checkbox">
                                <input type="checkbox" id="agreeTerms" name="agree_terms" required>
                                <label for="agreeTerms">
                                    Saya setuju dengan <a href="#" onclick="showTerms()">Syarat & Ketentuan</a> dan 
                                    <a href="#" onclick="showPrivacy()">Kebijakan Privasi</a> yang berlaku
                                </label>
                            </div>

                            <button type="submit" class="buy-btn primary" id="submitBtn" disabled>
                                <i class="fas fa-shopping-cart"></i> Beli Tiket
                            </button>
                        </form>
                    `;
                    
                    contentState.innerHTML = content;
                    
                    // Setup form validation
                    setupBuyFormValidation();
                })
                .catch(error => {
                    console.error('Error loading buy form:', error);
                    loadingState.style.display = 'none';
                    errorState.style.display = 'block';
                    document.getElementById('buyErrorMessage').textContent = 
                        'Gagal memuat form pembelian. Silakan periksa koneksi internet Anda dan coba lagi.';
                });
        }

        function closeDetailModal() {
            const modal = document.getElementById('detailModal');
            const loadingState = document.getElementById('loadingState');
            const errorState = document.getElementById('errorState');
            const contentState = document.getElementById('contentState');
            
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                // Reset states
                loadingState.style.display = 'none';
                errorState.style.display = 'none';
                contentState.style.display = 'none';
                currentEventId = null;
            }, 300);
        }

        function closeBuyModal() {
            const modal = document.getElementById('buyModal');
            const loadingState = document.getElementById('buyLoadingState');
            const errorState = document.getElementById('buyErrorState');
            const contentState = document.getElementById('buyContentState');
            
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                // Reset states
                loadingState.style.display = 'none';
                errorState.style.display = 'none';
                contentState.style.display = 'none';
                currentBuyEventId = null;
            }, 300);
        }

        function retryLoadBuyForm() {
            if (currentBuyEventId) {
                showBuyModal(currentBuyEventId);
            }
        }

        function changeQuantity(delta) {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value) || 1;
            const newValue = Math.max(1, Math.min(currentValue + delta, parseInt(quantityInput.max)));
            
            quantityInput.value = newValue;
            updateTotalPrice(newValue, getCurrentPrice());
            updateQuantityDisplay(newValue);
            updateQuantityButtons(newValue);
        }

        function validateQuantity(input) {
            const value = parseInt(input.value) || 1;
            const max = parseInt(input.max);
            const min = parseInt(input.min);
            
            if (value < min) input.value = min;
            if (value > max) input.value = max;
            
            const validValue = parseInt(input.value);
            updateTotalPrice(validValue, getCurrentPrice());
            updateQuantityDisplay(validValue);
            updateQuantityButtons(validValue);
        }

        function updateQuantityDisplay(quantity) {
            const display = document.getElementById('quantityDisplay');
            if (display) {
                display.textContent = quantity;
            }
        }

        function updateQuantityButtons(quantity) {
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const max = parseInt(document.getElementById('quantity').max);
            
            if (decreaseBtn) {
                decreaseBtn.disabled = quantity <= 1;
            }
            if (increaseBtn) {
                increaseBtn.disabled = quantity >= max;
            }
        }

        function getCurrentPrice() {
            // Extract price from the price summary
            const priceText = document.querySelector('.price-item .value').textContent;
            return parseInt(priceText.replace(/[^\d]/g, ''));
        }

        function updateTotalPrice(quantity, price) {
            const total = quantity * price;
            const formattedTotal = new Intl.NumberFormat('id-ID').format(total);
            const totalElement = document.getElementById('totalPrice');
            if (totalElement) {
                totalElement.textContent = `Rp ${formattedTotal}`;
            }
        }

        function setupBuyFormValidation() {
            const form = document.getElementById('buyTicketForm');
            const submitBtn = document.getElementById('submitBtn');
            const agreeTerms = document.getElementById('agreeTerms');
            const paymentMethod = document.getElementById('payment_method');
            const quantity = document.getElementById('quantity');

            function validateForm() {
                const isQuantityValid = quantity.value >= 1 && quantity.value <= parseInt(quantity.max);
                const isPaymentSelected = paymentMethod.value !== '';
                const isTermsAgreed = agreeTerms.checked;
                
                submitBtn.disabled = !(isQuantityValid && isPaymentSelected && isTermsAgreed);
            }

            // Add event listeners
            agreeTerms.addEventListener('change', validateForm);
            paymentMethod.addEventListener('change', validateForm);
            quantity.addEventListener('input', validateForm);
            
            // Initial validation
            validateForm();
        }

        function showTerms() {
            alert('Syarat & Ketentuan:\n\n1. Tiket yang sudah dibeli tidak dapat dikembalikan\n2. Pembayaran harus dilakukan dalam waktu 24 jam\n3. Tiket berlaku untuk 1 orang per tiket\n4. Dilarang memperjualbelikan tiket\n5. QuickTix berhak membatalkan tiket jika terjadi pelanggaran');
        }

        function showPrivacy() {
            alert('Kebijakan Privasi:\n\n1. Data pribadi Anda akan dijaga kerahasiaannya\n2. Data hanya digunakan untuk keperluan transaksi\n3. Tidak akan dibagikan ke pihak ketiga tanpa izin\n4. Data akan dihapus setelah 1 tahun\n5. Anda dapat menghubungi kami untuk pertanyaan privasi');
        }

        // Lightbox functions
        function openImageLightbox(imageSrc, imageAlt) {
            const lightbox = document.getElementById('imageLightbox');
            const lightboxImage = document.getElementById('lightboxImage');
            const lightboxCaption = document.getElementById('lightboxCaption');
            
            lightboxImage.src = imageSrc;
            lightboxImage.alt = imageAlt;
            lightboxCaption.textContent = imageAlt;
            
            // Reset zoom
            currentZoom = 1;
            lightboxImage.style.transform = 'scale(1)';
            
            lightbox.style.display = 'flex';
            setTimeout(() => lightbox.classList.add('show'), 10);
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeImageLightbox() {
            const lightbox = document.getElementById('imageLightbox');
            lightbox.classList.remove('show');
            setTimeout(() => {
                lightbox.style.display = 'none';
                // Restore body scroll
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Zoom functionality
        let currentZoom = 1;
        const zoomStep = 0.2;
        const maxZoom = 3;
        const minZoom = 0.5;

        function zoomImage(direction) {
            const lightboxImage = document.getElementById('lightboxImage');
            
            if (direction === 'in') {
                currentZoom = Math.min(currentZoom + zoomStep, maxZoom);
            } else if (direction === 'out') {
                currentZoom = Math.max(currentZoom - zoomStep, minZoom);
            } else if (direction === 'reset') {
                currentZoom = 1;
            }
            
            lightboxImage.style.transform = `scale(${currentZoom})`;
        }

        // Close lightbox when clicking outside the image
        document.addEventListener('click', function(event) {
            const lightbox = document.getElementById('imageLightbox');
            
            if (event.target === lightbox && lightbox.style.display === 'flex') {
                closeImageLightbox();
            }
        });

        // Keyboard controls for lightbox
        document.addEventListener('keydown', function(event) {
            const lightbox = document.getElementById('imageLightbox');
            
            if (lightbox.style.display === 'flex') {
                switch(event.key) {
                    case 'Escape':
                        closeImageLightbox();
                        break;
                    case '+':
                    case '=':
                        event.preventDefault();
                        zoomImage('in');
                        break;
                    case '-':
                        event.preventDefault();
                        zoomImage('out');
                        break;
                    case '0':
                        event.preventDefault();
                        zoomImage('reset');
                        break;
                }
            }
        });

        // Mouse wheel zoom
        document.addEventListener('wheel', function(event) {
            const lightbox = document.getElementById('imageLightbox');
            
            if (lightbox.style.display === 'flex' && event.ctrlKey) {
                event.preventDefault();
                
                if (event.deltaY < 0) {
                    zoomImage('in');
                } else {
                    zoomImage('out');
                }
            }
        });

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.classList.remove('show');
                setTimeout(() => event.target.style.display = 'none', 300);
            }
        }

        // Clear search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearSearchBtn = document.getElementById('clearSearch');
            
            // Show/hide clear button based on input value
            function toggleClearButton() {
                if (searchInput.value.trim() !== '') {
                    if (!clearSearchBtn) {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.id = 'clearSearch';
                        btn.className = 'clear-search-btn';
                        btn.innerHTML = '<i class="fas fa-times"></i>';
                        btn.title = 'Hapus pencarian';
                        btn.onclick = clearSearch;
                        searchInput.parentNode.appendChild(btn);
                    }
                } else {
                    if (clearSearchBtn) {
                        clearSearchBtn.remove();
                    }
                }
            }

            // Clear search function
            function clearSearch() {
                searchInput.value = '';
                searchInput.focus();
                
                // Remove query parameter and redirect
                const url = new URL(window.location);
                url.searchParams.delete('q');
                url.searchParams.delete('page'); // Reset to page 1
                window.location.href = url.toString();
            }

            // Add event listeners
            searchInput.addEventListener('input', toggleClearButton);
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Escape') {
                    clearSearch();
                }
            });

            // Initial check
            toggleClearButton();
        });

        // Tambahkan event listener untuk tombol kembali modal detail event
        document.addEventListener('DOMContentLoaded', function() {
            const backBtn = document.getElementById('detailModalBackBtn');
            if (backBtn) {
                backBtn.onclick = closeDetailModal;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const logoutLink = document.getElementById('logoutLink');
            const logoutModal = document.getElementById('logoutModal');
            const cancelLogoutBtn = document.getElementById('cancelLogoutBtn');
            const confirmLogoutBtn = document.getElementById('confirmLogoutBtn');
            if (logoutLink && logoutModal) {
                logoutLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    logoutModal.classList.add('show');
                });
            }
            if (cancelLogoutBtn && logoutModal) {
                cancelLogoutBtn.onclick = function() {
                    logoutModal.classList.remove('show');
                };
            }
            if (confirmLogoutBtn && logoutLink) {
                confirmLogoutBtn.onclick = function() {
                    window.location.href = logoutLink.href;
                };
            }
            // Tutup modal jika klik di luar konten
            logoutModal.addEventListener('click', function(e) {
                if (e.target === logoutModal) logoutModal.classList.remove('show');
            });
        });

        // Hamburger menu logic
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        let navOpen = false;
        function toggleNav() {
            navOpen = !navOpen;
            navLinks.classList.toggle('show', navOpen);
            navToggle.classList.toggle('active', navOpen);
            navToggle.innerHTML = navOpen ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        }
        if (navToggle && navLinks) {
            navToggle.style.display = window.innerWidth <= 768 ? 'block' : 'none';
            navLinks.classList.remove('show');
            navToggle.addEventListener('click', toggleNav);
            window.addEventListener('resize', function() {
                navToggle.style.display = window.innerWidth <= 768 ? 'block' : 'none';
                if (window.innerWidth > 768) {
                    navLinks.classList.remove('show');
                    navToggle.classList.remove('active');
                    navToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    navOpen = false;
                }
            });
        }
    </script>
</body>
</html>

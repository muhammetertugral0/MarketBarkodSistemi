<?php
// Hata ayıklama için
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basat Yazılım - Market Yönetim Sistemi</title>
    <!-- CSS stilleri burada kalacak -->
    <style>
        /* Mevcut CSS stilleriniz */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Üst Menü Başlangış */
        :root {
            --primary: #2563eb;
            --secondary: #1e40af;
            --accent: #3b82f6;
            --text: #1f2937;
            --light: #f3f4f6;
            --dark: #111827;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background: #f9fafb;
            color: var(--text);
        }

        .logoo {
            display: flex;
            align-items: center;
        }

        .logoo-icon {
            width: 160px;
            height: 65px;
            animation: pulse 2s infinite;
        }

        .logoo-text-container {
            display: flex;
            flex-direction: column;
            margin-left: 8px;
        }

        .logoo-text {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
        }

        .logoo-subtext {
            font-size: 14px;
            color: #333;
            line-height: -1;
            margin-top: 1.5px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            position: relative;
            padding: 5px 0;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Üst Menü Ve Logo Bitiş */
        /* Slogan Cart Curt Başlangış */
        .hero {
            margin-top: 80px;
            padding: 100px 0;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0) 70%);
            transform: rotate(45deg);
        }

        .hero-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-title {
            font-size: 48px;
            color: var(--text);
            margin-bottom: 20px;
            line-height: 1.2;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s forwards;
        }

        .hero-description {
            font-size: 18px;
            color: var(--text);
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s 0.2s forwards;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s 0.4s forwards;
        }

        .cta-primary,
        .cta-secondary {
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .cta-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
        }

        .cta-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .cta-secondary {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .cta-secondary:hover {
            background: var(--light);
        }

        .hero-image {
            flex: 1;
            position: relative;
        }

        /* Üstekki Resim Başlangıç */
        .floating-screen {
            width: 1000%;
            max-width: 800px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: perspective(1000px) rotateY(-10deg);
            transition: transform 0.5s ease;
            animation: float 6s infinite ease-in-out;
        }

        .features {
            padding: 100px 0;
            background: white;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Üstekki Resim Bitiş */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: perspective(1000px) rotateY(-10deg) translateY(0);
            }

            50% {
                transform: perspective(1000px) rotateY(-10deg) translateY(-20px);
            }
        }

        /* Slogan Cart Curt Bitiş */

        /* Açıklamalar Bitiş */
        .features-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: space-between;
            width: 100%;
        }

        .feature-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            width: 45%;
            padding: 10px;
            background: #f3f4f6;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 26px;
            color: var(--primary);
            margin-right: 30px;
        }

        .feature-text {
            flex: 1;
        }

        .feature-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text);
        }

        .feature-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        /* Açıklalar Bitiş */

        @media (max-width: 768px) {
            .feature-item {
                width: 100%;
            }

            .feature-row {
                flex-direction: column;
                gap: 20px;
            }

            .hero-content {
                flex-direction: column;
            }

            .hero-image {
                margin-top: 30px;
            }
        }

        /* Resimler Başlangış */
        .horizontal-scroll-section {
            padding: 20px 0;
            background: #f8fafc;
            overflow: hidden;
            min-height: 100vh;
            position: relative;
            width: 100%;
        }

        .scroll-container {
            position: relative;
            width: 100%;
            padding: 20px 0;
        }

        .scroll-content {
            display: flex;
            gap: 40px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 30px;
            white-space: nowrap;
            position: relative;
            z-index: 1;
        }

        .scroll-content {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scroll-content::-webkit-scrollbar {
            display: none;
        }

        .scroll-item {
            flex: 0 0 auto;
            width: 80vw;
            max-width: 1200px;
            aspect-ratio: 16/9;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            position: relative;
        }

        .scroll-item:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .scroll-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-color: #f8fafc;
        }

        .inline-fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .inline-fullscreen.active {
            display: flex;
        }

        .fullscreen-content {
            width: 100%;
            height: 100%;
            position: relative;
            background: transparent;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fullscreen-content img {
            max-width: 95%;
            max-height: 95%;
            object-fit: contain;
        }

        .close-fullscreen-button {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 11;
        }

        .close-fullscreen-button:hover {
            background: rgba(0, 0, 0, 0.9);
        }

        /* Resimler Bitiş */
        /* yt */
        .youtube-section {
            margin-top: 50px;
            padding: 20px 0;
        }

        .youtube-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: 0 auto;
            max-width: 1200px;
        }

        .youtube-item {
            flex: 1;
            text-decoration: none;
            color: #333;
            transition: transform 0.3s ease;
        }

        .youtube-item:hover {
            transform: scale(1.05);
        }

        .youtube-thumbnail {
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .youtube-title {
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
            color: #333;
        }

        @media (max-width: 768px) {
            .youtube-container {
                flex-direction: column;
                align-items: center;
            }

            .youtube-item {
                width: 100%;
                max-width: 400px;
            }
        }

        /* Footer */
        .footer {
            padding: 50px 0;
            background: var(--dark);
            color: white;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .footer-title {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin: 10px 0;
        }

        .footer-links a {
            color: var(--light);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        /*  */
        .contact-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .contact-overlay.active {
            display: flex;
        }

        .contact-modal {
            background: white;
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 700px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .close-contact-button {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.1);
            color: var(--text);
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 11;
        }

        .close-contact-button:hover {
            background: rgba(0, 0, 0, 0.2);
        }

        .section-title {
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
            color: var(--text);
        }

        .contact-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 36px;
            margin-right: 20px;
        }

        .contact-info h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
        }

        .contact-link {
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .contact-link:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .contact-modal {
                padding: 30px 20px;
            }
        }

        /* İndirme sayacı için ek stiller */
        .indirme-sayaci {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 8px 15px;
            display: inline-block;
            margin-top: 15px;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .indirme-sayaci .sayi {
            font-weight: bold;
            color: var(--primary);
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container nav-container">
            <div class="logoo">
                <img src="resim/basatyenilogo.png" alt="MHSS Logo" class="logoo-icon">
            </div>
            <nav class="nav-menu">
                <a href="" class="nav-link">ANA SAYFA</a>
                <a href="#features" class="nav-link">UYGULAMALARIMIZ</a>
                <a href="#contact" class="nav-link">İLETİŞİM</a>
            </nav>
        </div>
    </header>
    <!---->
    <div id="contact" class="contact-overlay">
        <div class="contact-modal">
            <button class="close-contact-button">×</button>
            <h2 class="section-title">İletişim</h2>
            <div class="contact-container">
                <div class="contact-item">
                    <span class="contact-icon">📧</span>
                    <div class="contact-info">
                        <h3>E-posta</h3>
                        <a href="mailto:mamoo81@gmail.com" class="contact-link">mamoo81@gmail.com</a>
                    </div>
                </div>
                <!-- <div class="contact-item">
                    <span class="contact-icon">📱</span>
                    <div class="contact-info">
                        <h3>WhatsApp</h3>
                        <a href="https://wa.me/9005525227999" class="contact-link">+90 552 522 79 99</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Hero kısmında indirme butonunu ve sayacı güncelleyelim -->
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Kağıtlarla mı Boğuşuyorsunuz?<br>Barkodla Kolaylaşın!</h1>
                <p class="hero-description">
                    Çağa ayak uydurun. Detaylara boğulmayın. Basat hızlı satış sistemi ile stoklarınızı, cari
                    hesaplarınızı ve kasanızı yönetmek çok kolay.
                </p>
                <div class="cta-buttons">
                    <!-- İndirme butonunun bağlantısını düzenleyelim -->
                    <a href="download.php?file=basat_market_yonetim.deb" class="cta-primary">Ücretsiz İndir</a>
                    <a href="#contact" class="cta-secondary">Bizimle İletişime Geçin</a>
                </div>

                <!-- İndirme sayacını ekleyelim -->
                <!-- <?php include 'counter.php'; ?> -->
            </div>
            <div class="hero-image">
                <img src="resim/anasayfa1.png" class="floating-screen">
            </div>
        </div>
    </section>
    <!---->
    <section id="features" class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-row">
                    <div class="feature-item">
                        <span class="feature-icon">💻</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Düşük Sistem Gereksinimi</h3>
                            <p class="feature-description">Minimal donanım, verimli çalışma.</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">👁️</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Kullanımı Kolay Arayüz</h3>
                            <p class="feature-description">Basit, anlaşılır, kullanıcı dostu tasarım.</p>
                        </div>
                    </div>
                </div>
                <div class="feature-row">
                    <div class="feature-item">
                        <span class="feature-icon">📦</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Akıllı Stok Yönetimi</h3>
                            <p class="feature-description">Yapay zeka destekli stok tahminleme, otomatik sipariş
                                yönetimi.</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🏷️</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Adisyon ve Etiket Desteği</h3>
                            <p class="feature-description">Adisyon, raf etiketi ve elektronik terazi desteği.</p>
                        </div>
                    </div>
                </div>
                <div class="feature-row">
                    <div class="feature-item">
                        <span class="feature-icon">👤</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Gelişmiş Cari Yönetimi</h3>
                            <p class="feature-description">Müşteri hesaplarını takip etme, ödemeleri yönetme.</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">☁️</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Bulut Yedekleme Desteği</h3>
                            <p class="feature-description">Verilerin uzaktan depolanması, güvenli erişim.</p>
                        </div>
                    </div>
                </div>
                <div class="feature-row">
                    <div class="feature-item">
                        <span class="feature-icon">📱</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Mobil Yönetim</h3>
                            <p class="feature-description">iOS ve Android uygulamaları ile her yerden yönetim.</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">💰</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Gelişmiş Kasa Yönetimi</h3>
                            <p class="feature-description">Nakit akışını izleme, satışları takip etme.</p>
                        </div>
                    </div>
                </div>
                <div class="feature-row">
                    <div class="feature-item">
                        <span class="feature-icon">💻</span>
                        <div class="feature-text">
                            <h3 class="feature-title">Çoklu Platform Desteği</h3>
                            <p class="feature-description">Windows, Linux, Android, iOS desteği.</p>
                        </div>
                    </div>
                    <div style="width: 45%"></div>
                </div>
            </div>
        </div>
    </section>
    <!---->
    <section class="horizontal-scroll-section">
        <div class="scroll-container">
            <div class="scroll-content" id="scrollContent">
                <div class="scroll-item">
                    <img src="resim/anasayfa1.png" alt="Image 1">
                </div>
                <div class="scroll-item">
                    <img src="resim/stok kartları.png" alt="Image 2">
                </div>
                <div class="scroll-item">
                    <img src="resim/satış ekranı.png" alt="Image 3">
                </div>
                <div class="scroll-item">
                    <img src="resim/kasa.png" alt="Image 4">
                </div>
                <div class="scroll-item">
                    <img src="resim/hızlı ürün şeç.png" alt="Image 5">
                </div>
                <div class="scroll-item">
                    <img src="resim/ayarlar.png" alt="Image 6">
                </div>
            </div>
        </div>
        <div id="inlineFullscreen" class="inline-fullscreen">
            <div class="fullscreen-content">
                <img id="fullscreenImage" src="" alt="Fullscreen Image">
                <button id="closeFullscreen" class="close-fullscreen-button">×</button>
            </div>
        </div>
    </section>
    <!---->
    <div class="youtube-section">
        <div class="youtube-container">
            <a href="https://www.youtube.com/watch?v=VIDEO_ID_1" class="youtube-item" target="_blank"
                rel="noopener noreferrer">
                <img src="resim/basatyazılım.png" alt="Video 1" class="youtube-thumbnail">
                <div class="youtube-title">Basat Yazılım Tanıtım Video</div>
            </a>

            <a href="https://www.youtube.com/watch?v=VIDEO_ID_2" class="youtube-item" target="_blank"
                rel="noopener noreferrer">
                <img src="resim/basatyazılım.png" alt="Video 2" class="youtube-thumbnail">
                <div class="youtube-title">Hızlı Satış Sistemi Eğitim Video</div>
            </a>

            <a href="https://www.youtube.com/watch?v=VIDEO_ID_3" class="youtube-item" target="_blank"
                rel="noopener noreferrer">
                <img src="resim/basatyazılım.png" alt="Video 3" class="youtube-thumbnail">
                <div class="youtube-title">Basat Mobil Uygulama Video</div>
            </a>
        </div>
    </div>
    </div>
    <!---->
    <footer class="footer">
        <div class="container">
            <div class="footer-section">
                <h4 class="footer-title">İletişim</h4>
                <ul class="footer-links">
                    <li><a href="mailto:mamoo81@gmail.com">mamoo81@gmail.com</a></li>
                    <!-- <li><a href="https://wa.me/9005525227999">+90 552 522 79 99</a></li> -->
                </ul>
            </div>
        </div>
    </footer>

    <!-- Geri kalan HTML içeriği aynı kalacak -->
    <!-- ... -->

    <!-- JavaScript kısmı aynı kalacak -->
    <script>
        // ... mevcut JavaScript kodları ...
        document.addEventListener('DOMContentLoaded', function() {
            const scrollContent = document.getElementById('scrollContent');
            const inlineFullscreen = document.getElementById('inlineFullscreen');
            const fullscreenImage = document.getElementById('fullscreenImage');
            const closeFullscreen = document.getElementById('closeFullscreen');

            document.querySelectorAll('.scroll-item').forEach(item => {
                item.addEventListener('click', function() {
                    const imgSrc = this.querySelector('img').src;
                    const imgAlt = this.querySelector('img').alt;
                    fullscreenImage.src = imgSrc;
                    fullscreenImage.alt = imgAlt;
                    inlineFullscreen.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });

            closeFullscreen.addEventListener('click', function() {
                inlineFullscreen.classList.remove('active');
                document.body.style.overflow = '';
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && inlineFullscreen.classList.contains('active')) {
                    inlineFullscreen.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });

            inlineFullscreen.addEventListener('click', function(e) {
                if (e.target === inlineFullscreen) {
                    inlineFullscreen.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
        // İletişime Basınca 
        document.addEventListener('DOMContentLoaded', function() {
            const contactLinks = document.querySelectorAll('a[href="#contact"]');
            const contactOverlay = document.getElementById('contact');
            const closeContactButton = document.querySelector('.close-contact-button');


            contactLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    contactOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });

            closeContactButton.addEventListener('click', function() {
                contactOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });

            contactOverlay.addEventListener('click', function(e) {
                if (e.target === contactOverlay) {
                    contactOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && contactOverlay.classList.contains('active')) {
                    contactOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</body>

</html>
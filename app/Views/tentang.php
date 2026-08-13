<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Look to the Sky</title>
    
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts untuk gaya Koran/Majalah -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Roboto', sans-serif; 
            background-color: #ffffff; 
            color: #111111;
        }

        /* Tipografi Koran */
        h1, h2, h3, h4, h5, h6, .logo-text {
            font-family: 'Playfair Display', serif;
        }

        /* Top Bar */
        .top-bar {
            background-color: #000000;
            color: #ffffff;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 0;
        }
        
        /* Header & Logo */
        .header-logo-section {
            padding: 40px 0;
            text-align: center;
        }
        .logo-text {
            font-size: 4.5rem;
            font-weight: 900;
            color: #000000;
            text-decoration: none;
            line-height: 1;
            letter-spacing: -1px;
        }
        .logo-sub {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #666666;
            margin-top: 10px;
        }

        /* Main Navigation */
        .main-nav-wrapper {
            border-top: 2px solid #000000;
            border-bottom: 1px solid #dddddd;
            margin-bottom: 40px;
        }
        .navbar-custom {
            padding: 0;
        }
        .nav-link {
            color: #000000 !important;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 20px !important;
            transition: color 0.2s;
        }
        .nav-link:hover { color: #cc0000 !important; }
        
        /* Search Form */
        .search-input {
            border: none;
            border-left: 1px solid #dddddd;
            border-radius: 0;
            font-size: 0.85rem;
        }
        .search-input:focus { box-shadow: none; border-color: #dddddd; }
        .search-btn {
            background: transparent;
            border: none;
            color: #000000;
        }

        /* Section Title */
        .section-title {
            font-size: 1.5rem;
            font-weight: 900;
            text-transform: uppercase;
            border-bottom: 2px solid #000000;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        /* Content Styling */
        .about-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333333;
        }
        .about-content p {
            margin-bottom: 25px;
        }

        /* Footer */
        .site-footer {
            background-color: #000000;
            color: #ffffff;
            padding: 40px 0;
            margin-top: 60px;
        }
    </style>
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <?= date('l, F j, Y') ?>
            </div>
            <div>
                <a href="https://www.facebook.com/mrendyamril/" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/rendyamril" class="text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- HEADER LOGO -->
    <header class="header-logo-section container">
        <a href="<?= base_url('/') ?>" class="logo-text">Look to the Sky</a>
        <div class="logo-sub">Jelajahi Alam Semesta</div>
    </header>

    <!-- MAIN NAVIGATION -->
    <div class="main-nav-wrapper sticky-top bg-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-custom">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/kategori') ?>">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('artikel/semua') ?>">Semua Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="<?= base_url('tentang') ?>">Tentang Kami</a>
                        </li>
                    </ul>
                    
                    <form action="<?= base_url('artikel/semua') ?>" method="GET" class="d-flex" style="max-width: 250px;">
                        <input type="text" name="keyword" class="form-control search-input" placeholder="Cari artikel..." value="<?= isset($_GET['keyword']) ? esc($_GET['keyword']) : '' ?>">
                        <button type="submit" class="btn search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="container my-4" style="max-width: 900px;">
        
        <h2 class="section-title">Tentang Kami</h2>

        <div class="about-content">
            <p>
                <strong>Look to the Sky</strong> adalah platform publikasi digital dan jurnalistik independen yang didedikasikan untuk menyajikan informasi terkini, wawasan mendalam, serta pengetahuan bermutu di berbagai bidang. Kami percaya bahwa informasi yang akurat, tajam, dan mencerahkan adalah fondasi penting dalam membangun masyarakat yang literat dan berpikir kritis.
            </p>
            
            <h3 class="fw-bold mt-4 mb-3" style="font-family: 'Playfair Display', serif;">Visi & Misi</h3>
            <p>
                Visi utama kami adalah menjadi medium terpercaya yang merangkum dinamika pengetahuan modern, sains, teknologi, dan kebudayaan. Melalui kurasi artikel yang ketat dan penyajian gaya majalah klasik yang elegan, kami berkomitmen untuk terus merawat tradisi literasi digital berkualitas tinggi.
            </p>

            <h3 class="fw-bold mt-4 mb-3" style="font-family: 'Playfair Display', serif;">Redaksi & Publikasi</h3>
            <p>
                Seluruh karya tulis, laporan investigatif, dan artikel pilihan di dalam portal ini dikurasi dan dipublikasikan di bawah supervisi langsung penulis dan editor utama kami, <strong>Mohammad Rendy Amril</strong>, bersama dengan kontributor dan penggerak konten digital lainnya.
            </p>

            <div class="p-4 bg-light border-start border-danger border-4 my-5">
                <h5 class="fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.9rem;">Hubungi Redaksi</h5>
                <p class="mb-0 text-secondary" style="font-size: 0.95rem;">
                    Untuk keperluan kerjasama, pengiriman rilis, kritik, maupun saran, Anda dapat langsung menghubungi tim redaksi kami melalui saluran resmi atau melalui panel administratif platform Look to the Sky.
                </p>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container text-center">
            <h2 class="text-white mb-3" style="font-family: 'Playfair Display', serif; font-weight: 900; letter-spacing: -1px;">Look to the Sky</h2>
            <p class="text-secondary" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px;">Jelajahi Alam Semesta</p>
            <hr class="border-secondary my-4" style="max-width: 100px; margin: auto;">
            <p class="mb-0 text-secondary" style="font-size: 0.85rem;">&copy; <?= date('Y') ?> Look to the Sky. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
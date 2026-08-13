<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($artikel['title']) ?> - Look to the Sky</title>
    
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

        /* Detail Article Styling */
        .article-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .article-category {
            color: #cc0000;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }
        .article-category:hover {
            color: #000000;
        }
        .article-detail-title {
            font-size: 3rem;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .article-meta {
            font-size: 0.85rem;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }
        .article-meta span { color: #000000; font-weight: 700; }

        .article-featured-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            margin-bottom: 40px;
        }

        .article-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333333;
            margin-bottom: 60px;
        }
        .article-body p {
            margin-bottom: 20px;
        }

        /* Back Button */
        .back-btn {
            display: inline-block;
            color: #000000;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-decoration: none;
            border-bottom: 2px solid #000000;
            padding-bottom: 3px;
            margin-bottom: 40px;
            transition: color 0.2s, border-color 0.2s;
        }
        .back-btn:hover {
            color: #cc0000;
            border-color: #cc0000;
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
                            <a class="nav-link" href="<?= base_url('tentang') ?>">Tentang Kami</a>
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

    <!-- MAIN CONTENT - DETAIL ARTIKEL -->
    <main class="container" style="max-width: 800px;">
        
        <a href="<?= base_url('/') ?>" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
        </a>

        <article>
            <div class="article-header">
                <!-- NAMA KATEGORI -->
                <a href="<?= base_url('kategori/' . $artikel['category_id']) ?>" class="article-category">
                    <?= esc($artikel['category_name'] ?? 'Umum') ?>
                </a>

                <!-- JUDUL ARTIKEL -->
                <h1 class="article-detail-title">
                    <?= esc($artikel['title']) ?>
                </h1>

                <!-- META PENULIS, TANGGAL & VIEWS -->
                <div class="article-meta">
                    Oleh <span>Mohammad Rendy Amril</span> &nbsp;|&nbsp; <?= date('F d, Y', strtotime($artikel['created_at'])) ?> &nbsp;|&nbsp; <i class="fas fa-eye"></i> <?= number_format($artikel['views'] ?? 0) ?> Dilihat
                </div>
            </div>

            <!-- GAMBAR UTAMA -->
            <?php if (!empty($artikel['cover_image'])) : ?>
                <img src="<?= base_url('uploads/' . $artikel['cover_image']) ?>" alt="<?= esc($artikel['title']) ?>" class="article-featured-img">
            <?php endif; ?>

            <!-- ISI KONTEN ARTIKEL -->
            <div class="article-body">
                <?= $artikel['content'] ?>
            </div>
        </article>

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
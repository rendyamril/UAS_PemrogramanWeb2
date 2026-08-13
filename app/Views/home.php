<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look to the Sky - Berita Utama</title>
    
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

        /* Hero Carousel Styling (Gaya Majalah) */
        .hero-carousel {
            margin-bottom: 50px;
        }
        .carousel-item img {
            height: 450px;
            object-fit: cover;
        }
        .carousel-caption-custom {
            background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0));
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 40px 30px 30px 30px;
            color: #ffffff;
            text-align: left;
        }
        .carousel-caption-custom .badge-cat {
            background-color: #cc0000;
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 4px 10px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }
        .carousel-caption-custom h2 a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.2s;
        }
        .carousel-caption-custom h2 a:hover {
            color: #dddddd;
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

        /* Article Styling */
        .article-post { margin-bottom: 40px; }
        .article-img-wrapper {
            overflow: hidden;
            margin-bottom: 15px;
            display: block;
        }
        .article-img-wrapper img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .article-img-wrapper:hover img {
            transform: scale(1.05);
        }
        
        .article-category {
            color: #cc0000;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 8px;
        }
        .article-category:hover {
            color: #000000;
        }

        .article-title {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 10px;
        }
        .article-title a {
            color: #000000;
            text-decoration: none;
            transition: color 0.2s;
        }
        .article-title a:hover { color: #cc0000; }

        .article-meta {
            font-size: 0.75rem;
            color: #999999;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .article-meta span { color: #000000; font-weight: 700; }

        .article-excerpt {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #444444;
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
                    
                    <form action="<?= current_url() ?>" method="GET" class="d-flex" style="max-width: 250px;">
                        <input type="text" name="keyword" class="form-control search-input" placeholder="Cari artikel..." value="<?= isset($_GET['keyword']) ? esc($_GET['keyword']) : '' ?>">
                        <button type="submit" class="btn search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="container">

        <!-- SLIDER / HERO CAROUSEL (Hanya tampil di Beranda & jika tidak sedang pencarian) -->
        <?php if (!isset($_GET['keyword']) && !empty($slider_artikel) && is_array($slider_artikel)) : ?>
            <div id="heroCarousel" class="carousel slide hero-carousel shadow-sm" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($slider_artikel as $index => $s_row) : ?>
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($slider_artikel as $index => $s_row) : ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="<?= !empty($s_row['cover_image']) ? base_url('uploads/' . $s_row['cover_image']) : 'https://via.placeholder.com/1200x500?text=No+Image' ?>" class="d-block w-100" alt="<?= esc($s_row['title']) ?>">
                            <div class="carousel-caption-custom">
                                <span class="badge-cat"><?= esc($s_row['category_name'] ?? 'Kategori') ?></span>
                                <h2 class="display-6 fw-bold">
                                    <a href="<?= base_url('artikel/detail/' . $s_row['id']) ?>">
                                        <?= esc($s_row['title']) ?>
                                    </a>
                                </h2>
                                <p class="text-light mb-0 small">
                                    Oleh <strong>Mohammad Rendy Amril</strong> &nbsp;|&nbsp; <?= date('M d, Y', strtotime($s_row['created_at'])) ?> &nbsp;|&nbsp; <i class="fas fa-eye"></i> <?= number_format($s_row['views'] ?? 0) ?> Dilihat
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" style="width: 5%;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" style="width: 5%;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        <?php endif; ?>
        
        <h2 class="section-title">
            <?php if (isset($_GET['keyword']) && !empty($_GET['keyword'])) : ?>
                Hasil Pencarian: <?= esc($_GET['keyword']) ?>
            <?php elseif (isset($current_category)) : ?>
                <?= esc($current_category) ?>
            <?php else : ?>
                Berita Utama
            <?php endif; ?>
        </h2>

        <div class="row">
            <?php if (!empty($artikel) && is_array($artikel)) : ?>
                <?php foreach ($artikel as $row) : ?>
                    <!-- KOTAK ARTIKEL -->
                    <div class="col-lg-4 col-md-6">
                        <article class="article-post">
                            
                            <!-- LINK GAMBAR -->
                            <a href="<?= base_url('artikel/detail/' . $row['id']) ?>" class="article-img-wrapper">
                                <img src="<?= !empty($row['cover_image']) ? base_url('uploads/' . $row['cover_image']) : 'https://via.placeholder.com/800x500?text=No+Image' ?>" alt="<?= esc($row['title']) ?>">
                            </a>

                            <!-- LABEL KATEGORI -->
                            <a href="<?= base_url('kategori/' . $row['category_id']) ?>" class="article-category">
                                <?= esc($row['category_name'] ?? 'GAGAL JOIN') ?>
                            </a>

                            <!-- JUDUL ARTIKEL -->
                            <h3 class="article-title">
                                <a href="<?= base_url('artikel/detail/' . $row['id']) ?>">
                                    <?= esc($row['title']) ?>
                                </a>
                            </h3>

                            <!-- META DATA PENULIS & VIEWS -->
                            <div class="article-meta">
                                Oleh <span>Mohammad Rendy Amril</span> &nbsp;|&nbsp; <?= date('M d, Y', strtotime($row['created_at'])) ?> &nbsp;|&nbsp; <i class="fas fa-eye"></i> <?= number_format($row['views'] ?? 0) ?> Dilihat
                            </div>

                            <!-- CUPLIKAN KONTEN -->
                            <div class="article-excerpt">
                                <?= strip_tags(substr($row['content'], 0, 130)) ?>...
                            </div>
                            
                        </article>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <p class="text-muted text-center py-5" style="font-size: 1.2rem;">Tidak ada artikel yang ditemukan saat ini.</p>
                </div>
            <?php endif; ?>
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
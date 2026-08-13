<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - Look to the Sky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            background-color: #f0f2f5; 
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Sidebar Styles (Sama dengan Dashboard) */
        .sidebar {
            background-color: #0b132b;
            background-image: radial-gradient(circle at top right, #1c2541 0%, #0b132b 100%);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            z-index: 100;
        }
        .sidebar-brand {
            color: #e0e1dd;
            font-weight: bold;
            font-size: 1.1rem;
            padding: 22px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .sidebar-nav { padding: 20px 10px; }
        .sidebar-nav a {
            color: #8d99ae;
            text-decoration: none;
            padding: 12px 15px;
            display: block;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background-color: #3a506b;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }
        .top-navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
            padding: 15px 30px;
        }

        /* Styling List Artikel Modern */
        .item-artikel {
            border-left: 4px solid #3a506b;
            transition: all 0.2s;
        }
        .item-artikel:hover {
            background-color: #f8f9fa !important;
            border-left-color: #5bc0be;
            transform: translateX(5px);
        }
        .btn-astro {
            background: linear-gradient(135deg, #5bc0be, #3a506b);
            color: white;
            border: none;
        }
        .btn-astro:hover {
            background: linear-gradient(135deg, #3a506b, #1c2541);
            color: white;
        }
        /* Pagination Styling */
        .pagination .page-item .page-link { color: #3a506b; }
        .pagination .page-item.active .page-link { background-color: #3a506b; border-color: #3a506b; color: white; }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-meteor me-2 text-info"></i> LOOK TO THE SKY
        </div>
        <div class="sidebar-nav">
            <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-space-shuttle me-2"></i> Dashboard</a>
            <a href="<?= base_url('admin/artikel') ?>" class="active"><i class="fas fa-newspaper me-2"></i> Publikasi</a>
            <a href="<?= base_url('admin/kategori') ?>"><i class="fas fa-tags me-2"></i> Kategori</a>
            <a href="<?= base_url('admin/profil') ?>"><i class="fas fa-user-astronaut me-2"></i> Profil Admin</a>
            <a href="<?= base_url('logout') ?>" class="mt-4"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 fw-bold text-dark">Publikasi</h5>
            <div class="user-profile">
                <span class="me-2 text-muted fw-medium"><?= session()->get('user_name') ?? 'Commander' ?></span>
                <i class="fas fa-user-circle fs-3 text-secondary align-middle"></i>
            </div>
        </div>

        <div class="container-fluid px-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark"><i class="fas fa-satellite-dish me-2 text-secondary"></i> Daftar Artikel</h4>
                <a href="<?= base_url('admin/artikel/create') ?>" class="btn btn-astro rounded-pill px-4 shadow-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Artikel
                </a>
            </div>

            <!-- Header Grid List (Disembunyikan di layar kecil) -->
            <div class="d-none d-md-flex fw-bold text-muted mb-2 px-3 align-items-center">
                <div class="col-1">NO</div>
                <div class="col-3">JUDUL</div>
                <div class="col-2">KATEGORI</div>
                <div class="col-2">TANGGAL</div>
                <div class="col-1 text-center">VIEWS</div>
                <div class="col-3 text-center">AKSI</div>
            </div>

            <!-- List Body -->
            <div class="d-flex flex-column gap-2 mb-4">
                <?php if(!empty($artikel)): ?>
                    <?php 
                    // Kalkulasi nomor urut berdasarkan pagination
                    $page = isset($_GET['page_artikel']) ? $_GET['page_artikel'] : 1;
                    $no = 1 + (10 * ($page - 1));
                    foreach($artikel as $row): 
                    ?>
                    <div class="item-artikel bg-white p-3 rounded shadow-sm d-flex flex-column flex-md-row align-items-md-center">
                        <div class="col-12 col-md-1 mb-2 mb-md-0 text-muted fw-bold">#<?= $no++ ?></div>
                        <div class="col-12 col-md-3 mb-2 mb-md-0 fw-bold text-dark fs-6"><?= esc($row['title']) ?></div>
                        
                        <!-- Menampilkan Nama Kategori -->
                        <div class="col-12 col-md-2 mb-2 mb-md-0 text-muted small"><i class="fas fa-tag me-1"></i> <?= esc($row['category_name'] ?? 'Tanpa Kategori') ?></div>
                        
                        <!-- Menampilkan Tanggal -->
                        <div class="col-12 col-md-2 mb-2 mb-md-0 text-muted small"><i class="fas fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($row['created_at'])) ?></div>

                        <!-- Menampilkan Jumlah Views -->
                        <div class="col-12 col-md-1 mb-3 mb-md-0 text-md-center">
                            <span class="badge bg-light text-dark border px-2 py-1 small">
                                <i class="fas fa-eye text-secondary me-1"></i> <?= number_format($row['views'] ?? 0) ?>
                            </span>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="col-12 col-md-3 text-md-center">
                            <a href="<?= base_url('admin/artikel/edit/'.$row['slug']) ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/artikel/delete/'.$row['slug']) ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Hapus transmisi ini permanen?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="bg-white p-5 rounded shadow-sm text-center text-muted">
                        <i class="fas fa-box-open fs-1 mb-3 text-light"></i>
                        <h5>Data kosong</h5>
                        <p>Belum ada artikel yang dipublikasikan.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination Render -->
            <div class="d-flex justify-content-end">
                <?= $pager->links('artikel', 'default_full') ?>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
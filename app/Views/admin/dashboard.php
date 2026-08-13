<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Look to the Sky</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            background-color: #f0f2f5; 
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Tema Astronomi: Deep Space */
        .sidebar {
            background-color: #0b132b;
            background-image: radial-gradient(circle at top right, #1c2541 0%, #0b132b 100%);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
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
        .sidebar-nav {
            padding: 20px 10px;
        }
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
        
        /* Styling Kartu Statistik */
        .card-stat {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: transform 0.3s ease;
        }
        .card-stat:hover {
            transform: translateY(-5px);
        }
        .icon-box {
            width: 65px; 
            height: 65px;
            display: flex; 
            align-items: center; 
            justify-content: center;
            border-radius: 12px; 
            font-size: 26px; 
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        /* Palet Warna Ikon Astronomi */
        .bg-astro-1 { background: linear-gradient(135deg, #1c2541, #0b132b); } /* Dark Blue */
        .bg-astro-2 { background: linear-gradient(135deg, #3a506b, #1c2541); } /* Nebula Blue */
        .bg-astro-3 { background: linear-gradient(135deg, #5bc0be, #3a506b); } /* Starlight Cyan */

        /* Styling Daftar Artikel (List-Group) */
        .list-artikel {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .item-artikel {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background-color: #ffffff;
            border-radius: 10px;
            border-left: 4px solid #3a506b;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
            transition: all 0.2s;
        }
        .item-artikel:hover {
            background-color: #f8f9fa;
            border-left-color: #5bc0be;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-meteor me-2 text-info"></i> LOOK TO THE SKY
        </div>
        <div class="sidebar-nav">
            <a href="<?= base_url('admin/dashboard') ?>" class="active"><i class="fas fa-space-shuttle me-2"></i> Dashboard</a>
            <a href="<?= base_url('admin/artikel') ?>"><i class="fas fa-newspaper me-2"></i> Publikasi</a>
            <a href="<?= base_url('admin/kategori') ?>"><i class="fas fa-tags me-2"></i> Kategori</a>
            <a href="<?= base_url('admin/profil') ?>"><i class="fas fa-user-astronaut me-2"></i> Profil Admin</a>
            <a href="<?= base_url('logout') ?>" class="mt-4"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Dashboard</h5>
            <div class="user-profile">
                <span class="me-2 text-muted fw-medium"><?= session()->get('user_name') ?? 'Commander' ?></span>
                <i class="fas fa-user-circle fs-3 text-secondary align-middle"></i>
            </div>
        </div>

        <!-- Content Area -->
        <div class="container-fluid p-4">
            
            <!-- Statistik Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card card-stat p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-astro-1 me-3">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold"><?= $total_artikel ?? 0 ?></h3>
                                <span class="text-muted">Total Artikel</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stat p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-astro-2 me-3">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold"><?= $total_kategori ?? 0 ?></h3>
                                <span class="text-muted">Kategori</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stat p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-astro-3 me-3">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div>
                                <h3 class="mb-0 fw-bold"><?= $total_views ?? 0 ?></h3>
                                <span class="text-muted">Total Views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Artikel Terbaru -->
            <div class="card card-stat bg-transparent shadow-none">
                <div class="card-body p-0">
                    <h5 class="fw-bold mb-3 text-dark px-1"><i class="fas fa-satellite-dish me-2 text-secondary"></i> Artikel Terbaru</h5>
                    
                    <div class="list-artikel">
                        <?php if(!empty($artikel_terbaru)): ?>
                            <?php foreach($artikel_terbaru as $artikel): ?>
                                <div class="item-artikel">
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark"><?= esc($artikel['title']) ?></h6>
                                        <small class="text-muted">
                                            <i class="fas fa-user-astronaut me-1"></i> Admin &nbsp;|&nbsp; 
                                            <i class="fas fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($artikel['created_at'])) ?>
                                        </small>
                                    </div>
                                    <div>
                                        <span class="badge bg-astro-2 rounded-pill px-3 py-2 me-2"><i class="fas fa-eye me-1"></i> <?= esc($artikel['views'] ?? 0) ?></span>
                                        <a href="<?= base_url('admin/artikel/edit/' . $artikel['id']) ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="item-artikel justify-content-center text-muted py-4">
                                <em>Belum ada transmisi sinyal publikasi yang ditemukan di sistem.</em>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>

        </div> <!-- End Container -->
    </div> <!-- End Main Content -->

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
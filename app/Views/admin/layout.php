<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Look to the Sky</title>
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
        .bg-astro-1 { background: linear-gradient(135deg, #1c2541, #0b132b); }
        .bg-astro-2 { background: linear-gradient(135deg, #3a506b, #1c2541); }
        .bg-astro-3 { background: linear-gradient(135deg, #5bc0be, #3a506b); }
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
            <a href="<?= base_url('admin/dashboard') ?>" class="<?= service('uri')->getSegment(2) == 'dashboard' ? 'active' : '' ?>"><i class="fas fa-space-shuttle me-2"></i> Dashboard</a>
            <a href="<?= base_url('admin/artikel') ?>" class="<?= service('uri')->getSegment(2) == 'artikel' ? 'active' : '' ?>"><i class="fas fa-newspaper me-2"></i> Publikasi</a>
            <a href="<?= base_url('admin/kategori') ?>" class="<?= service('uri')->getSegment(2) == 'kategori' ? 'active' : '' ?>"><i class="fas fa-tags me-2"></i> Kategori</a>
            <a href="<?= base_url('admin/profile/edit') ?>" class="<?= service('uri')->getSegment(2) == 'profile' ? 'active' : '' ?>"><i class="fas fa-user-astronaut me-2"></i> Profil Admin</a>
            <a href="<?= base_url('logout') ?>" class="mt-4"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Pusat Komando</h5>
            <div class="user-profile">
                <span class="me-2 text-muted fw-medium"><?= session()->get('user_name') ?? 'Commander' ?></span>
                <i class="fas fa-user-circle fs-3 text-secondary align-middle"></i>
            </div>
        </div>

        <!-- Dynamic Content Section -->
        <?= $this->renderSection('content') ?>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Ilmu - Look to the Sky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
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
            <a href="<?= base_url('admin/artikel') ?>"><i class="fas fa-newspaper me-2"></i> Publikasi</a>
            <a href="<?= base_url('admin/kategori') ?>" class="active"><i class="fas fa-tags me-2"></i> Kategori</a>
            <a href="<?= base_url('admin/profil') ?>"><i class="fas fa-user-astronaut me-2"></i> Profil Admin</a>
            <a href="<?= base_url('logout') ?>" class="mt-4"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="top-navbar d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 fw-bold text-dark">Kategori</h5>
            <div class="user-profile">
                <span class="me-2 text-muted fw-medium"><?= session()->get('user_name') ?? 'Commander' ?></span>
                <i class="fas fa-user-circle fs-3 text-secondary align-middle"></i>
            </div>
        </div>

        <div class="container-fluid px-4">
            
            <!-- Notifikasi -->
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i> <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Kolom Tambah Kategori -->
                <div class="col-md-4 mb-4">
                    <div class="card card-custom p-4 border-top border-4 border-info">
                        <h5 class="fw-bold mb-3"><i class="fas fa-plus-circle me-2 text-info"></i> Kategori Baru</h5>
                        <form action="<?= base_url('admin/kategori/store') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label text-muted fw-medium">Nama Kategori</label>
                                <input type="text" class="form-control form-control-lg" name="name" placeholder="Contoh: Tata Surya" required>
                            </div>
                            <button type="submit" class="btn btn-astro w-100 rounded-pill py-2 fw-bold">
                                Tambahkan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Kolom Daftar Kategori -->
                <div class="col-md-8">
                    <div class="card card-custom p-4">
                        <h5 class="fw-bold mb-4"><i class="fas fa-list me-2 text-secondary"></i> Daftar Kategori</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" width="10%">ID</th>
                                        <th width="40%">NAMA KATEGORI</th>
                                        <th width="30%">SLUG</th>
                                        <th class="text-center" width="20%">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($kategori)): ?>
                                        <?php foreach($kategori as $kat): ?>
                                        <tr>
                                            <td class="text-center text-muted fw-bold">#<?= $kat['id'] ?></td>
                                            <td class="fw-bold text-dark"><?= esc($kat['name']) ?></td>
                                            <td class="text-muted"><span class="badge bg-light text-dark border"><?= esc($kat['slug']) ?></span></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/kategori/delete/'.$kat['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Peringatan: Menghapus kategori ini dapat membuat publikasi terkait kehilangan klasifikasinya. Lanjutkan?')">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">
                                                <i class="fas fa-satellite-dish fs-3 mb-2"></i>
                                                <p class="mb-0">Belum ada kategori yang terdeteksi di radar.</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
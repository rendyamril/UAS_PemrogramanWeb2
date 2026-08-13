<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - Look to the Sky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow-x: hidden; }
        .sidebar { background-color: #0b132b; min-height: 100vh; width: 250px; position: fixed; left: 0; top: 0; }
        .sidebar-brand { color: #e0e1dd; font-weight: bold; font-size: 1.1rem; padding: 22px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05); text-transform: uppercase; }
        .sidebar-nav { padding: 20px 10px; }
        .sidebar-nav a { color: #8d99ae; text-decoration: none; padding: 12px 15px; display: block; border-radius: 8px; margin-bottom: 8px; transition: all 0.3s ease; }
        .sidebar-nav a:hover, .sidebar-nav a.active { background-color: #3a506b; color: #ffffff; }
        .main-content { margin-left: 250px; width: calc(100% - 250px); }
        .top-navbar { background-color: #ffffff; padding: 15px 30px; box-shadow: 0 2px 15px rgba(0,0,0,0.04); }
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
            <a href="<?= base_url('admin/kategori') ?>"><i class="fas fa-tags me-2"></i> Kategori</a>
            <a href="<?= base_url('admin/profil') ?>" class="active"><i class="fas fa-user-astronaut me-2"></i> Profil Admin</a>
            <a href="<?= base_url('logout') ?>" class="mt-4"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-dark">Ubah Profil</h5>
            <div class="user-profile">
                <span class="me-2 text-muted fw-medium"><?= session()->get('user_name') ?? 'Commander' ?></span>
                <i class="fas fa-user-circle fs-3 text-secondary align-middle"></i>
            </div>
        </div>

        <div class="container-fluid p-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold m-0 text-dark"><i class="fas fa-user-astronaut text-info me-2"></i> Pengaturan Profil</h4>
                    </div>

                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success bg-success text-white border-0 py-2 text-center shadow-sm mb-4" style="border-radius: 10px;">
                            <i class="fas fa-check-circle me-1"></i> <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <div class="card p-4 shadow-sm bg-white border-0" style="border-radius: 12px;">
                        <form action="<?= base_url('admin/profil/update') ?>" method="POST">
                            <?= csrf_field() ?>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted fw-bold">Nama</label>
                                <input type="text" class="form-control" name="name" value="<?= esc($user['name']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted fw-bold">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= esc($user['username']) ?>" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted fw-bold">Password Baru</label>
                                <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah sandi">
                                <div class="form-text text-muted" style="font-size: 0.8rem;">Biarkan kosong jika password tetap menggunakan yang lama.</div>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 fw-bold py-2 shadow-sm">
                                <i class="fas fa-save me-1"></i> PERBARUI PROFIL
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
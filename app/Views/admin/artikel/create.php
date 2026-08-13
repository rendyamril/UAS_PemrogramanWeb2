<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transmisi - Look to the Sky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            background-color: #f0f2f5; 
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Sidebar Styles */
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
        
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border-top: 4px solid #3a506b;
        }
        
        /* Styling khusus agar editor teksnya lebih tinggi */
        .ck-editor__editable_inline {
            min-height: 300px;
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
            <h5 class="mb-0 fw-bold text-dark">Tambah Artikel Baru</h5>
            <div class="user-profile">
                <span class="me-2 text-muted fw-medium"><?= session()->get('user_name') ?? 'Commander' ?></span>
                <i class="fas fa-user-circle fs-3 text-secondary align-middle"></i>
            </div>
        </div>

        <div class="container-fluid px-4 pb-5">
            
            <a href="<?= base_url('admin/artikel') ?>" class="btn btn-outline-secondary rounded-pill mb-4 px-4">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>

            <div class="form-card p-4">
                <form action="<?= base_url('admin/artikel/store') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Judul Artikel</label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Masukkan judul..." value="<?= old('title') ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Isi Artikel</label>
                                <textarea name="content" id="editor"><?= old('content') ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="category_id" class="form-label fw-bold">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" selected disabled>-- Pilih Kategori --</option>
                                    <?php if(!empty($kategori)): ?>
                                        <?php foreach($kategori as $kat): ?>
                                            <option value="<?= $kat['id'] ?>"><?= esc($kat['name'] ?? 'Kategori ' . $kat['id']) ?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- Opsi cadangan jika tabel kategori masih kosong -->
                                        <option value="1">Astronomi</option>
                                        <option value="2">Eksplorasi Ruang</option>
                                        <option value="3">Teknologi Satelit</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Gambar Cover (Opsional)</label>
                                <input class="form-control" type="file" name="cover_image" accept="image/*">
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill shadow-sm">
                                    <i class="fas fa-rocket me-2"></i> Terbitkan Artikel
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- CKEditor 5 Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
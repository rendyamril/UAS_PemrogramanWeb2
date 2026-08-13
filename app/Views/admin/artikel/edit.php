<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel - Look to the Sky</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { background-color: #0b132b; min-height: 100vh; width: 250px; position: fixed; }
        .sidebar-brand { color: #e0e1dd; font-weight: bold; padding: 22px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .sidebar-nav a { color: #8d99ae; text-decoration: none; padding: 12px 15px; display: block; margin: 8px 10px; border-radius: 8px; }
        .sidebar-nav a:hover, .sidebar-nav a.active { background-color: #3a506b; color: #ffffff; }
        .main-content { margin-left: 250px; padding-bottom: 50px; }
        .top-navbar { background-color: #ffffff; padding: 15px 30px; box-shadow: 0 2px 15px rgba(0,0,0,0.04); margin-bottom: 30px; }
        .form-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border-top: 4px solid #fca311; padding: 30px; }
        .ck-editor__editable_inline { min-height: 300px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand"><i class="fas fa-meteor me-2 text-info"></i> LOOK TO THE SKY</div>
        <div class="sidebar-nav">
            <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-space-shuttle me-2"></i> Dashboard</a>
            <a href="<?= base_url('admin/artikel') ?>" class="active"><i class="fas fa-newspaper me-2"></i> Publikasi</a>
        </div>
    </div>

    <div class="main-content">
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Edit Publikasi</h5>
        </div>

        <div class="container-fluid px-4">
            <a href="<?= base_url('admin/artikel') ?>" class="btn btn-outline-secondary rounded-pill mb-4 px-4"><i class="fas fa-arrow-left me-2"></i> Kembali</a>

            <div class="form-card">
                <form action="<?= base_url('admin/artikel/update/'.$artikel['slug']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Judul Artikel</label>
                                <input type="text" class="form-control form-control-lg" name="title" value="<?= old('title', $artikel['title']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Isi Artikel</label>
                                <textarea name="content" id="editor"><?= old('content', $artikel['content']) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Kategori</label>
                                <select class="form-select" name="category_id" required>
                                    <option value="" disabled>-- Pilih Kategori --</option>
                                    <?php foreach($kategori as $kat): ?>
                                        <option value="<?= $kat['id'] ?>" <?= ($kat['id'] == $artikel['category_id']) ? 'selected' : '' ?>>
                                            <?= esc($kat['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- PERBAIKAN: Menggunakan cover_image agar sinkron dengan database -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Cover Artikel</label>
                                
                                <?php if (!empty($artikel['cover_image'])) : ?>
                                    <div class="mb-2">
                                        <img src="<?= base_url('uploads/' . $artikel['cover_image']) ?>" alt="Cover Lama" class="img-thumbnail" style="max-height: 180px; width: 100%; object-fit: cover; border-radius: 8px;">
                                    </div>
                                    <small class="text-muted d-block mb-2">Gambar saat ini. Biarkan kosong jika tidak ingin mengganti.</small>
                                <?php else : ?>
                                    <small class="text-muted d-block mb-2">Belum ada cover artikel. Silakan unggah gambar baru.</small>
                                <?php endif; ?>

                                <input type="file" class="form-control" name="cover_image" accept="image/*">
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-warning btn-lg rounded-pill text-dark fw-bold shadow-sm">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#editor'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ]
        }).catch(error => console.error(error));
    </script>
</body>
</html>
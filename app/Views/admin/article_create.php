<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <!-- Memanggil Script TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#editor', // Menyasar textarea dengan ID 'editor'
        plugins: 'lists link',
        toolbar: 'blocks | bold italic | bullist numlist | link',
        menubar: false
      });
    </script>
</head>
<body>
    <h2>Buat Artikel Baru</h2>

    <!-- Menampilkan pesan error validasi jika ada -->
    <?php if(session()->has('errors')): ?>
        <ul style="color: red;">
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="/admin/article/store" method="post" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="title" value="<?= old('title') ?>"><br><br>

        <label>Kategori:</label><br>
        <select name="category_id">
            <option value="">Pilih Kategori</option>
            <option value="1">Berita Utama</option>
            <!-- Data kategori asli akan dipanggil dari database nantinya -->
        </select><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="author" value="<?= old('author') ?>"><br><br>

        <label>Tanggal Publikasi:</label><br>
        <input type="date" name="published_at" value="<?= old('published_at') ?>"><br><br>

        <label>Isi Artikel:</label><br>
        <!-- Textarea ini akan otomatis berubah menjadi Rich Text Editor karena TinyMCE -->
        <textarea id="editor" name="content"><?= old('content') ?></textarea><br><br>

        <label>Gambar:</label><br>
        <input type="file" name="cover_image"><br><br>

        <button type="submit">Simpan Artikel</button>
    </form>
</body>
</html>
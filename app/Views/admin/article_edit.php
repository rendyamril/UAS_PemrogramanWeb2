<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <!-- Memanggil Script TinyMCE seperti di form tambah -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#editor',
        plugins: 'lists link',
        toolbar: 'blocks | bold italic | bullist numlist | link',
        menubar: false
      });
    </script>
</head>
<body>
    <h2>Edit Artikel</h2>

    <!-- Menampilkan pesan error validasi jika ada -->
    <?php if(session()->has('errors')): ?>
        <ul style="color: red;">
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Action form mengarah ke rute update menggunakan SLUG -->
    <form action="/admin/article/update/<?= $article['slug'] ?>" method="post" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="title" value="<?= old('title', $article['title']) ?>"><br><br>

        <label>Kategori:</label><br>
        <select name="category_id">
            <option value="1" <?= ($article['category_id'] == 1) ? 'selected' : '' ?>>Berita Utama</option>
            <!-- Nanti disesuaikan dengan data kategori dari database -->
        </select><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="author" value="<?= old('author', $article['author']) ?>"><br><br>

        <label>Tanggal Publikasi:</label><br>
        <input type="date" name="published_at" value="<?= old('published_at', $article['published_at']) ?>"><br><br>

        <label>Isi Artikel:</label><br>
        <textarea id="editor" name="content"><?= old('content', $article['content']) ?></textarea><br><br>

        <!-- TAMBAHAN: Menampilkan cover lama jika ada -->
        <label>Cover Artikel Saat Ini:</label><br>
        <?php if (!empty($article['cover_image'])): ?>
            <div style="margin-bottom: 10px;">
                <img src="<?= base_url('uploads/' . $article['cover_image']) ?>" alt="Cover Lama" style="max-height: 150px; border: 1px solid #ccc; padding: 3px;">
            </div>
        <?php else: ?>
            <p style="color: #666; font-style: italic;">Tidak ada cover sebelumnya.</p>
        <?php endif; ?>

        <label>Gambar Baru (Kosongkan jika tidak ingin ganti):</label><br>
        <input type="file" name="cover_image" accept="image/*"><br><br>

        <button type="submit">Update Artikel</button>
    </form>
</body>
</html>
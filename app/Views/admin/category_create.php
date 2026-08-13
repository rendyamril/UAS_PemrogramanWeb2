<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
</head>
<body>
    <h2>Buat Kategori Baru</h2>
    <form action="/admin/category/store" method="post">
        <label>Nama Kategori:</label><br>
        <input type="text" name="name" required><br><br>
        <button type="submit">Simpan Kategori</button>
    </form>
</body>
</html>
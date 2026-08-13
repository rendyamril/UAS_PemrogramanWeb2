<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
</head>
<body>
    <h2>Edit Kategori</h2>
    <form action="/admin/category/update/<?= $category['slug'] ?>" method="post">
        <label>Nama Kategori:</label><br>
        <input type="text" name="name" value="<?= $category['name'] ?>" required><br><br>
        <button type="submit">Update Kategori</button>
    </form>
</body>
</html>
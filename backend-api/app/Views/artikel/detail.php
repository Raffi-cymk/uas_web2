<!DOCTYPE html>
<html>
<head>
    <title>Detail Artikel</title>
</head>
<body>

<h1>Detail Artikel</h1>

<?php if (isset($artikel)): ?>

    <h2><?= $artikel['judul']; ?></h2>

    <p><?= $artikel['isi']; ?></p>

    <?php if (!empty($artikel['gambar'])): ?>
        <img src="/uploads/<?= $artikel['gambar']; ?>" width="200">
    <?php endif; ?>

<?php else: ?>
    <p>Data tidak ditemukan</p>
<?php endif; ?>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <?php $title = $title ?? ''; ?>
</head>
<body>

<h1><?= $title; ?></h1>

<?php if (!empty($artikel)): ?>
    <?php foreach ($artikel as $row): ?>
        <h2><?= $row['judul']; ?></h2>
        <p>Kategori: <?= $row['nama_kategori']; ?></p>
        <p><?= $row['isi']; ?></p>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>Tidak ada data</p>
<?php endif; ?>

</body>
</html>
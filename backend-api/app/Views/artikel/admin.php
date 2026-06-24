<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>

<h1>Halaman Admin</h1>

<?php if (isset($artikel)): ?>
    <ul>
        <?php foreach ($artikel as $row): ?>
            <li><?= $row['judul']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Tidak ada data</p>
<?php endif; ?>

</body>
</html>
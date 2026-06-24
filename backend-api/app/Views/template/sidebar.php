<hr>

<h3>Artikel Terbaru</h3>

<ul>
<?php if (!empty($artikel)): ?>
    <?php foreach ($artikel as $row): ?>
        <li><?= $row['judul']; ?></li>
    <?php endforeach; ?>
<?php else: ?>
    <li>Tidak ada artikel</li>
<?php endif; ?>
</ul>

<hr>
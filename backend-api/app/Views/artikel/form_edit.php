<?php /** @var array $artikel */ ?>

<h1>Edit Artikel</h1>

<form method="post" action="/artikel/update/<?= $artikel['id']; ?>">

    <p>Judul</p>
    <input type="text" name="judul" value="<?= $artikel['judul']; ?>">

    <p>Isi</p>
    <textarea name="isi"><?= $artikel['isi']; ?></textarea>

    <br><br>
    <button type="submit">Update</button>

</form>
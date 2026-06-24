<h1>Tambah Artikel</h1>

<form method="post" action="/artikel/simpan" enctype="multipart/form-data">

    <p>Judul</p>
    <input type="text" name="judul">

    <p>Isi</p>
    <textarea name="isi"></textarea>

    <p>Gambar</p>
    <input type="file" name="gambar">

    <br><br>
    <button type="submit">Simpan</button>

</form>
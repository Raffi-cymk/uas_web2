<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();

        $data = [
            'title'   => 'Daftar Artikel',
            'artikel' => $model->getArtikelDenganKategori()
        ];

        return view('artikel/index', $data);
    }

    public function admin_index()
{
    $title = 'Daftar Artikel';

    $model = new ArtikelModel();

    $q = $this->request->getVar('q') ?? '';

    $artikel = $model->like('judul', $q)->findAll();

    $data = [
        'title'   => $title,
        'artikel' => $artikel,
        'q'       => $q
    ];

    if ($this->request->isAJAX()) {

        return $this->response->setJSON($data);

    }

    return view('artikel/admin_index', $data);
}
    public function simpan()
{
    $model = new \App\Models\ArtikelModel();

    $file = $this->request->getFile('gambar');

    $namaFile = null;

    if ($file && $file->isValid()) {
        $namaFile = $file->getRandomName();
        $file->move('uploads', $namaFile);
    }

    $model->save([
        'judul' => $this->request->getPost('judul'),
        'isi'   => $this->request->getPost('isi'),
        'slug'  => url_title($this->request->getPost('judul'), '-', true),
        'gambar'=> $namaFile
    ]);

    return redirect()->to('/artikel/admin');
}
   public function tambah()
{
    $kategoriModel = new \App\Models\KategoriModel();

    return view('artikel/form_tambah', [
        'kategori' => $kategoriModel->findAll()
    ]);
}
   public function detail($id)
{
    $model = new \App\Models\ArtikelModel();

    $data = [
        'artikel' => $model->find($id)
    ];

    return view('artikel/detail', $data);
}
  public function edit($id)
{
    $model = new \App\Models\ArtikelModel();

    $data = [
        'artikel' => $model->find($id)
    ];

    return view('artikel/form_edit', $data);
}
  public function update($id)
{
    $model = new \App\Models\ArtikelModel();

    $model->update($id, [
        'judul' => $this->request->getPost('judul'),
        'isi'   => $this->request->getPost('isi'),
        'slug'  => url_title($this->request->getPost('judul'), '-', true),
    ]);

    return redirect()->to('/artikel/admin');
}
  public function hapus($id)
{
    $model = new \App\Models\ArtikelModel();
    $model->delete($id);

    return redirect()->to('/artikel/admin');
}

}
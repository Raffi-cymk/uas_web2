<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use CodeIgniter\RESTful\ResourceController;

class KategoriController extends ResourceController
{
    protected $modelName = KategoriModel::class;
    protected $format = 'json';

    public function index()
    {
        return $this->respond(
            $this->model->findAll()
        );
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return $this->failNotFound('Kategori tidak ditemukan');
        }

        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'slug_kategori' => $this->request->getPost('slug_kategori')
        ];

        $this->model->insert($data);

        return $this->respondCreated([
            'message' => 'Kategori berhasil ditambahkan'
        ]);
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        $this->model->update($id, $data);

        return $this->respond([
            'message' => 'Kategori berhasil diupdate'
        ]);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);

        return $this->respond([
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}
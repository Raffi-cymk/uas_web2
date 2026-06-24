<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\RESTful\ResourceController;

class BukuController extends ResourceController
{
    protected $modelName = BukuModel::class;
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
            return $this->failNotFound('Data buku tidak ditemukan');
        }

        return $this->respond($data);
    }

   public function create()
{
    $data = $this->request->getJSON(true);

    $this->model->insert($data);

    return $this->respondCreated([
        'message' => 'Buku berhasil ditambahkan'
    ]);
}

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        $this->model->update($id, $data);

        return $this->respond([
            'message' => 'Buku berhasil diupdate'
        ]);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);

        return $this->respond([
            'message' => 'Buku berhasil dihapus'
        ]);
    }
}
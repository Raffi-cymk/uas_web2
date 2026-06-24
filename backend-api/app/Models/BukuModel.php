<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kategori_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
protected $updatedField = 'updated_at';
}
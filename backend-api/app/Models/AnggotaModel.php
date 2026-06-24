<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';

    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'email', 'telepon'];

    protected $useTimestamps = true;

protected $createdField = 'created_at';
protected $updatedField = 'updated_at';
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarModel extends Model
{
    protected $table            = 'standar';
    protected $primaryKey       = ['standar_id', "kategori_id"];
    protected $returnType       = 'array';
    protected $allowedFields    = ['standar_id', "kategori_id", 'nama_standar', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

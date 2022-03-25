<?php

namespace App\Models;

use CodeIgniter\Model;

class DataIndukModel extends Model
{
    protected $table            = 'data_induk';
    protected $primaryKey       = ['induk_id', "kategori_id"];
    protected $returnType       = 'array';
    protected $allowedFields    = ['induk_id', "kategori_id", 'nama_induk', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

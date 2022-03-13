<?php

namespace App\Models;

use CodeIgniter\Model;

class DataIndukModel extends Model
{
    protected $table            = 'data_induk';
    protected $primaryKey       = 'induk_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["kategori_id", "kebutuhan", "nilai", "tahun_id", "unit", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

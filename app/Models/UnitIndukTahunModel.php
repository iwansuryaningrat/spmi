<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitIndukTahunModel extends Model
{
    protected $table            = 'unit_induk_tahun';
    protected $primaryKey       = ['tahun', 'unit_id', 'induk_id'];
    protected $returnType       = 'array';
    protected $allowedFields    = ['tahun', 'unit_id', 'induk_id', 'nilai', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

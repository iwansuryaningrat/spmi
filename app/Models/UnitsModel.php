<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitsModel extends Model
{
    protected $table            = 'units';
    protected $primaryKey       = 'unit_id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['unit_id', 'nama_unit', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

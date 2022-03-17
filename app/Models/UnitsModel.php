<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitsModel extends Model
{
    protected $table            = 'units';
    protected $primaryKey       = 'unit_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["nama_unit", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // function to get data by id
    public function getUnitId($unit_id)
    {
        return $this->where('unit_id', $unit_id)->first();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitTransaksiModel extends Model
{
    protected $table            = 'unit_transaksi';
    protected $primaryKey       = 'id_transunit';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_unit', 'id_kategori', 'id_tahun', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // function to get all data by id unit
    public function getUnitId($id_unit)
    {
        return $this->where('id_unit', $id_unit)->findAll();
    }
}

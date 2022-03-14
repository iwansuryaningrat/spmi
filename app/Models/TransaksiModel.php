<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'transaksi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["user_id", "unit_id", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // function to get data by user
    public function getTransaksiUser($user_id)
    {
        return $this->where('user_id', $user_id)->first();
    }

    // function to get data by unit
    public function getTransaksiUnit($unit_id)
    {
        return $this->where('unit_id', $unit_id)->first();
    }
}

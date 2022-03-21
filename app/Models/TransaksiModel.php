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
        return $this->where('user_id', $user_id)->findAll();
    }

    // function to get data by unit
    public function getTransaksiUnit($unit_id)
    {
        return $this->where('unit_id', $unit_id)->findAll();
    }

    // joining table users and units
    public function getTransaksiUserUnit($user_id, $unit_id)
    {
        return $this->select('transaksi.*, users.nama, users.email, users.nip, users.username, users.foto, units.nama_unit')
            ->join('users', 'users.user_id = transaksi.user_id')
            ->join('units', 'units.unit_id = transaksi.unit_id')
            ->where('transaksi.user_id', $user_id)
            ->where('transaksi.unit_id', $unit_id)
            ->first();
    }
}

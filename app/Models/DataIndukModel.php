<?php

namespace App\Models;

use CodeIgniter\Model;

class DataIndukModel extends Model
{
    protected $table            = 'data_induk';
    protected $primaryKey       = 'induk_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["kategori", "kebutuhan", "nilai", "tahun_id", "unit_id", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // function to get data by id
    public function getDataIndukId($id)
    {
        return $this->where('induk_id', $id)->first();
    }

    // function to get data by kategori
    public function getDataIndukKategori($kategori)
    {
        return $this->where('kategori', $kategori)->first();
    }

    // function to get data by tahun
    public function getDataIndukTahun($tahun_id)
    {
        return $this->where('tahun_id', $tahun_id)->first();
    }

    // function to get data by unit
    public function getDataIndukUnit($unit_id)
    {
        return $this->where('unit_id', $unit_id)->first();
    }

    // function to get data by unit and tahun
    public function getDataIndukUnitTahun($unit_id, $tahun_id)
    {
        return $this->where('unit_id', $unit_id)->where('tahun_id', $tahun_id)->first();
    }
}

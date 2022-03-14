<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarModel extends Model
{
    protected $table            = 'standar';
    protected $primaryKey       = 'standar_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["nama_standar", "status", "nilai", "kategori_id", "tahun_id", "unit_id", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // function to get data by id
    public function getStandarId($standar_id)
    {
        return $this->where('standar_id', $standar_id)->first();
    }

    // function to get data by kategori
    public function getStandarKategori($kategori_id)
    {
        return $this->where('kategori_id', $kategori_id)->first();
    }

    // function to get data by tahun
    public function getStandarTahun($tahun_id)
    {
        return $this->where('tahun_id', $tahun_id)->first();
    }

    // function to get data by unit
    public function getStandarUnit($unit_id)
    {
        return $this->where('unit_id', $unit_id)->first();
    }

    // function to get data by unit and tahun
    public function getStandarUnitTahun($unit_id, $tahun_id)
    {
        return $this->where('unit_id', $unit_id)->where('tahun_id', $tahun_id)->first();
    }

    // function to get data by unit and kategori
    public function getStandarUnitKategori($unit_id, $kategori_id)
    {
        return $this->where('unit_id', $unit_id)->where('kategori_id', $kategori_id)->first();
    }

    // function to get data by unit and tahun and kategori
    public function getStandarUnitTahunKategori($unit_id, $tahun_id, $kategori_id)
    {
        return $this->where('unit_id', $unit_id)->where('tahun_id', $tahun_id)->where('kategori_id', $kategori_id)->first();
    }
}

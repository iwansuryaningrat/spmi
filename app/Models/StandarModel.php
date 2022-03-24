<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarModel extends Model
{
    protected $table            = 'standar';
    protected $primaryKey       = 'standar_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["kode_standar", "nama_standar", "status", "nilai", "kategori_id", "tahun_id", "unit_id", "created_at", "updated_at"];

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
        return $this->where('kategori_id', $kategori_id)->findAll();
    }

    // function to get data by tahun
    public function getStandarTahun($tahun_id)
    {
        return $this->where('tahun_id', $tahun_id)->findAll();
    }

    // function to get data by unit
    public function getStandarUnit($unit_id)
    {
        return $this->where('unit_id', $unit_id)->findAll();
    }

    // function to get data by unit and kategori
    public function getStandarUnitKategori($unit_id, $kategori_id)
    {
        return $this->where('unit_id', $unit_id)->where('kategori_id', $kategori_id)->findAll();
    }

    // function to get data by unit and tahun and kategori
    public function getStandarUnitTahunKategori($unit_id, $tahun_id, $kategori_id)
    {
        return $this->where('unit_id', $unit_id)->where('tahun_id', $tahun_id)->where('kategori_id', $kategori_id)->findAll();
    }

    //  function to get data by status
    public function getStandarStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    // Join all data from all tabel
    public function getStandarAll($unit_id, $tahun_id, $kategori_id)
    {
        return $this->select('standar.*, kategori.nama_kategori, tahun.tahun, units.nama_unit')
            ->join('kategori', 'kategori.kategori_id = standar.kategori_id')
            ->join('tahun', 'tahun.tahun_id = standar.tahun_id')
            ->join('units', 'units.unit_id = standar.unit_id')
            ->where('standar.unit_id', $unit_id)
            ->where('standar.tahun_id', $tahun_id)
            ->where('standar.kategori_id', $kategori_id)
            ->findAll();
    }

    // join standar unit tahun
    public function getStandarUnitTahun($unit_id, $tahun_id)
    {
        return $this->select('standar.*, kategori.nama_kategori, tahun.tahun, units.nama_unit')
            ->join('kategori', 'kategori.kategori_id = standar.kategori_id')
            ->join('tahun', 'tahun.tahun_id = standar.tahun_id')
            ->join('units', 'units.unit_id = standar.unit_id')
            ->where('standar.unit_id', $unit_id)
            ->where('standar.tahun_id', $tahun_id)
            ->findAll();
    }

    // get status
    public function getStatus($unit_id, $tahun_id)
    {
        return $this->select('standar.status')
            ->where('standar.unit_id', $unit_id)
            ->where('standar.tahun_id', $tahun_id)
            ->findAll();
    }

    // update status
    public function updateStatus($standar_id, $status)
    {
        return $this->where('standar_id', $standar_id)
            ->set('status', $status)
            ->update();
    }
}

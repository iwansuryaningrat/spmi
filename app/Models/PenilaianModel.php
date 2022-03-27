<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table            = 'penilaian';
    protected $primaryKey       = ['tahun', "kategori_id", "standar_id", "indikator_id", "unit_id"];
    protected $returnType       = 'array';
    protected $allowedFields    = ['tahun', "kategori_id", "standar_id", "indikator_id", "unit_id", 'nilai_input', 'dokumen', 'keterangan', 'catatan', 'status', 'hasil', 'nila_akhir', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Joining all tables
    public function getPenilaian($unit_id, $tahun)
    {
        return $this->select('penilaian.*, kategori.nama_kategori, standar.nama_standar, units.*')
            ->join('kategori', 'kategori.kategori_id = penilaian.kategori_id')
            ->join('standar', 'standar.kategori_id = penilaian.kategori_id')
            ->join('units', 'units.unit_id = penilaian.unit_id')
            ->where('penilaian.unit_id', $unit_id)
            ->where('penilaian.tahun', $tahun)
            ->findAll();
    }

    // Joining all tables
    public function getPenilaianSpec($unit_id, $standar_id, $tahun, $kategori_id)
    {
        return $this->select('penilaian.*, kategori.nama_kategori, standar.nama_standar, units.*')
            ->join('kategori', 'kategori.kategori_id = penilaian.kategori_id')
            ->join('standar', 'standar.kategori_id = penilaian.kategori_id')
            ->join('units', 'units.unit_id = penilaian.unit_id')
            ->where('penilaian.unit_id', $unit_id)
            ->where('penilaian.standar_id', $standar_id)
            ->where('penilaian.tahun', $tahun)
            ->where('penilaian.kategori_id', $kategori_id)
            ->findAll();
    }

    // Update status berdasarkan unit_id dan tahun
    public function updateStatus($unit_id, $tahun, $status)
    {
        return $this->where('unit_id', $unit_id)
            ->where('tahun', $tahun)
            ->set('status', $status)
            ->update();
    }
}

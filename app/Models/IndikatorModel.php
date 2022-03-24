<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorModel extends Model
{
    protected $table            = 'indikator';
    protected $primaryKey       = 'indikator_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["nama_indikator", "target", "satuan", "tipe_hasil", "hasil", "dokumen", "keterangan", "catatan", "nilai", "kriteria", "standar_id", "induk_id", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //  Joining table standar and indikator and data_induk
    public function getIndikatorStandarInduk($standar_id)
    {
        return $this->select('indikator.*, standar.kode_standar, standar.nama_standar, indikator.induk_id, indikator.standar_id, indikator.indikator_id, indikator.nama_indikator, indikator.target, indikator.satuan, indikator.tipe_hasil, indikator.hasil, indikator.dokumen, indikator.keterangan, indikator.catatan, indikator.nilai, indikator.kriteria, indikator.created_at, indikator.updated_at')
            ->join('standar', 'standar.standar_id = indikator.standar_id')
            ->join('data_induk', 'data_induk.induk_id = indikator.induk_id')
            ->where('indikator.standar_id', $standar_id)
            ->findAll();;
    }
}

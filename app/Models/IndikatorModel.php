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

    // function to get data by id
    public function getIndikatorId($indikator_id)
    {
        return $this->where('indikator_id', $indikator_id)->first();
    }

    // function to get data by induk
    public function getIndikatorInduk($induk_id)
    {
        return $this->where('induk_id', $induk_id)->findAll();
    }

    // function to get data by standar
    public function getIndikatorStandar($standar_id)
    {
        return $this->where('standar_id', $standar_id)->findAll();
    }
}

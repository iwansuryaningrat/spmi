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
}

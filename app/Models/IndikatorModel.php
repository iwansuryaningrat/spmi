<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorModel extends Model
{
    protected $table            = 'indikator';
    protected $primaryKey       = ['indikator_id', "kategori_id", "standar_id"];
    protected $returnType       = 'array';
    protected $allowedFields    = ['indikator_id', "kategori_id", "standar_id", 'nama_indikator', 'target', 'nilai_acuan', 'satuan', 'keterangan', 'induk_id', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

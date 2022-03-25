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
}

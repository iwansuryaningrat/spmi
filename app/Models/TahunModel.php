<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table            = 'tahun';
    protected $primaryKey       = 'tahun_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["tahun"];

    // get data tahun aktif
    public function getTahunAktif($tahun)
    {
        return $this->where('tahun', $tahun)->first();
    }

    // get data tahun
    public function getTahunId($tahun_id)
    {
        return $this->where('tahun_id', $tahun_id)->first();
    }
}

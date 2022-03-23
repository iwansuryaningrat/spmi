<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'kategori_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["nama_kategori"];

    // get data by id
    public function getKategoriId($kategori_id)
    {
        return $this->where('kategori_id', $kategori_id)->first();
    }

    // get data by nama kategori
    public function getKategoriNama($nama_kategori)
    {
        return $this->where('nama_kategori', $nama_kategori)->first();
    }
}

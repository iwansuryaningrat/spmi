<?php

namespace App\Models;

use CodeIgniter\Model;

class Tahun extends Model
{
    protected $table            = 'tahun';
    protected $primaryKey       = 'tahun_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ["tahun"];
}

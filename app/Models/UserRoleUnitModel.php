<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleUnitModel extends Model
{
    protected $table            = 'user_role_unit';
    protected $primaryKey       = ['email', 'role_id', 'unit_id', 'tahun'];
    protected $returnType       = 'array';
    protected $allowedFields    = ['email', 'role_id', 'unit_id', 'tahun', 'created_at', 'updated_at', 'deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

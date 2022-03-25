<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table            = 'role';
    protected $primaryKey       = 'role_id';
    protected $allowedFields    = ['role'];
}

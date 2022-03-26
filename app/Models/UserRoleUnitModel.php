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

    // Join Table User Unit
    public function getUserUnit($email, $tahun)
    {
        return $this->select('user_role_unit.*, users.*, units.*, role.*')
            ->join('users', 'users.email = user_role_unit.email')
            ->join('units', 'units.unit_id = user_role_unit.unit_id')
            ->join('role', 'role.role_id = user_role_unit.role_id')
            ->where('user_role_unit.email', $email)
            ->where('user_role_unit.tahun', $tahun)
            ->findAll();
    }
}

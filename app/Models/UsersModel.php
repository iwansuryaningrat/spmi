<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'email';
    protected $returnType       = 'array';
    protected $allowedFields    = ['email', 'nama', 'nip', 'telp', 'foto', 'password', 'role_id', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Get User by email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}

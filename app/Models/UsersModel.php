<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = "users";
    protected $primaryKey       = "user_id";
    protected $returnType       = "array";
    protected $protectFields    = true;
    protected $allowedFields    = ["nama", "email", "password", "role", "foto", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = "datetime";
    protected $createdField  = "created_at";
    protected $updatedField  = "updated_at";

    // function to get data by email
    public function getUserEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // function to get data by role
    public function getUserRole($role)
    {
        return $this->where('role', $role)->first();
    }

    // function to get data by id
    public function getUserId($id)
    {
        return $this->where('user_id', $id)->first();
    }
}

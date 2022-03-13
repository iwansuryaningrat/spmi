<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
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
}

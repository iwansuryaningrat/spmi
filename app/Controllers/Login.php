<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Login extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        //
    }
}

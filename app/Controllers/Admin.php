<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UnitsModel;
use App\Models\KategoriModel;
use App\Models\TahunModel;
use App\Models\UsersModel;
use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\StandarModel;

class Admin extends BaseController
{
    protected $unitsModel;
    protected $kategoriModel;
    protected $tahunModel;
    protected $usersModel;
    protected $dataIndukModel;
    protected $indikatorModel;
    protected $standarModel;

    public function __construct()
    {
        $this->unitsModel = new UnitsModel();
        $this->kategoriModel = new KategoriModel();
        $this->tahunModel = new TahunModel();
        $this->usersModel = new UsersModel();
        $this->dataIndukModel = new DataIndukModel();
        $this->indikatorModel = new IndikatorModel();
        $this->standarModel = new StandarModel();
        $this->data_user = [
            'nama' => session()->get('nama'),
            'role' => session()->get('role'),
            'email' => session()->get('email'),
            'username' => session()->get('username'),
            'id_user' => session()->get('id_user'),
            'foto' => session()->get('foto'),
        ];
        $this->units = $this->unitsModel->findAll();
        $this->i = 1;
    }

    // Admin Dashboard Method
    public function index()
    {
        $usersession = $this->data_user;

        $data = [
            'title' => 'Dashboard SIPMPP | SIPMPP UNDIP 2022',
            'tab' => 'home',
            'css' => 'styles-admin-dashboard.css',
            'header' => 'header__big',
            'i' => $this->i,
            'usersession' => $usersession,
            'units' => $this->units,
            'kategori' => $this->kategoriModel->findAll(),
            'tahun' => $this->tahunModel->findAll(),
        ];


        return view('admin/index', $data);
    }

    // Standar Method
    public function standar()
    {
        return view('admin/standar');
    }

    // Data Induk Method
    public function dataInduk()
    {
        return view('admin/dataInduk');
    }

    // units Method
    public function units()
    {
        return view('admin/units');
    }

    // Profile Method
    public function profile()
    {
        return view('admin/profile');
    }

    // User Method (Done)
    public function user()
    {
        $usersession = $this->data_user;

        $user = $this->usersModel->getUserRole('user');

        $data = [
            'title' => 'Base User | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $usersession,
            'users' => $user
        ];

        return view('admin/user-baseuser', $data);
    }

    // Leader Method
    public function leader()
    {
        return view('admin/user-leader');
    }

    // Auditor Method
    public function auditor()
    {
        return view('admin/user-auditor');
    }

    // Report Method
    public function report()
    {
        return view('admin/report');
    }

    //Add user method
    public function addUser()
    {
        return view('admin/add-user');
    }

    //Add Unit Method
    public function addUnit()
    {
        return view('admin/add-units');
    }

    //view data induk method
    public function viewDataInduk()
    {
        return view('admin/view-dataInduk');
    }

    //add data induk method
    public function addDataInduk()
    {
        return view('admin/add-dataInduk');
    }

    //view standar method
    public function viewStandar()
    {
        return view('admin/view-standar');
    }

    //Add standar method
    public function addStandar()
    {
        return view('admin/add-standar');
    }

    //view indikator
    public function viewIndikator()
    {
        return view('admin/view-indikator');
    }
}

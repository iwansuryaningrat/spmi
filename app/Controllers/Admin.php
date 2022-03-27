<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\KategoriModel;
use App\Models\PenilaianModel;
use App\Models\StandarModel;
use App\Models\TahunModel;
use App\Models\UnitIndukTahunModel;
use App\Models\UnitsModel;
use App\Models\UsersModel;
use App\Models\UserUnitModel;
use Config\Validation;

class Admin extends BaseController
{
    protected $dataIndukModel;
    protected $indikatorModel;
    protected $kategoriModel;
    protected $penilaianModel;
    protected $standarModel;
    protected $tahunModel;
    protected $unitIndukTahunModel;
    protected $unitsModel;
    protected $usersModel;
    protected $userunitModel;

    public function __construct()
    {
        $this->dataIndukModel = new DataIndukModel();
        $this->indikatorModel = new IndikatorModel();
        $this->kategoriModel = new KategoriModel();
        $this->penilaianModel = new PenilaianModel();
        $this->standarModel = new StandarModel();
        $this->tahunModel = new TahunModel();
        $this->unitIndukTahunModel = new UnitIndukTahunModel();
        $this->unitsModel = new UnitsModel();
        $this->usersModel = new UsersModel();
        $this->userunitModel = new UserUnitModel();
        $this->data_user = [
            'email' => session()->get('email'),
            'nama' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'role_id' => session()->get('role_id'),
            'role' => session()->get('role'),
            'tahun' => session()->get('tahun'),
        ];
        $this->i = 1;

        $this->session = \Config\Services::session();
    }

    // Admin Dashboard Method
    public function index()
    {
        $usersession = $this->data_user;
        $units = $this->unitsModel->findAll();

        $data = [
            'title' => 'Dashboard SIPMPP | SIPMPP UNDIP 2022',
            'tab' => 'home',
            'css' => 'styles-admin-dashboard.css',
            'header' => 'header__big',
            'i' => $this->i,
            'usersession' => $usersession,
            'tahun' => $this->tahunModel->findAll(),
            'units' => $units,
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

    //penilaian
    public function penilaian()
    {
        return view('admin/penilaian');
    }

    //daftar user (Done)
    public function daftarUser()
    {
        $users = $this->usersModel->findAll();
        $data = [
            'title' => 'Daftar User | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $this->data_user,
            'users' => $users
        ];

        return view('admin/daftar-user', $data);
    }

    //Add user form method (Done)
    public function addUserForm()
    {
        $data = [
            'title' => 'Form Tambah User | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-add-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $this->data_user,
        ];
        return view('admin/add-user', $data);
    }

    // Add user method (Done)
    public function addUser()
    {
        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('fullname');
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        // Validasi email
        $validation =  \Config\Services::validation();
        $valid = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
        ]);

        if (!$valid) {
            // Set flashdata gagal dan kirim pesan eror dengan flashdata
            $this->session->setFlashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email sudah terdaftar!</div>');
            return redirect()->to(base_url('admin/adduserform'));
        } else {
            $data = [
                'email' => $email,
                'nama' => $nama,
                'password' => $password,
            ];

            $this->usersModel->insert($data);
            // Set flashdata gagal dan kirim pesan eror dengan flashdata
            $this->session->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">User berhasil ditambahkan!</div>');
            return redirect()->to(base_url('admin/daftaruser'));
        }
    }

    //add leader
    public function addLeader()
    {
        return view('admin/add-leader');
    }

    //add basic user
    public function addBasicUser()
    {
        return view('admin/add-base-user');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\KategoriModel;
use App\Models\PenilaianModel;
use App\Models\RoleModel;
use App\Models\StandarModel;
use App\Models\TahunModel;
use App\Models\UnitIndukTahunModel;
use App\Models\UnitsModel;
use App\Models\UsersModel;
use App\Models\UserUnitModel;
use App\Models\UserRoleUnitModel;
use Config\Validation;

class Admin extends BaseController
{
    protected $dataIndukModel;
    protected $indikatorModel;
    protected $kategoriModel;
    protected $penilaianModel;
    protected $roleModel;
    protected $standarModel;
    protected $tahunModel;
    protected $unitIndukTahunModel;
    protected $unitsModel;
    protected $usersModel;
    protected $userunitModel;
    protected $userroleunitModel;

    public function __construct()
    {
        $this->dataIndukModel = new DataIndukModel();
        $this->indikatorModel = new IndikatorModel();
        $this->kategoriModel = new KategoriModel();
        $this->penilaianModel = new PenilaianModel();
        $this->roleModel = new RoleModel();
        $this->standarModel = new StandarModel();
        $this->tahunModel = new TahunModel();
        $this->unitIndukTahunModel = new UnitIndukTahunModel();
        $this->unitsModel = new UnitsModel();
        $this->usersModel = new UsersModel();
        $this->userunitModel = new UserUnitModel();
        $this->userroleunitModel = new UserRoleUnitModel();
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

    // User Method (Kurang parsing data units)
    public function user()
    {
        $usersession = $this->data_user;
        $users = $this->userroleunitModel->getData();
        // dd($users);

        $data = [
            'title' => 'Base User | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $usersession,
            'users' => $users
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

    // units Method
    public function units()
    {
        return view('admin/units');
    }

    // Data Induk Method
    public function dataInduk()
    {
        return view('admin/dataInduk');
    }

    //view data induk method
    public function viewDataInduk()
    {
        return view('admin/view-dataInduk');
    }

    // Standar Method
    public function standar()
    {
        return view('admin/standar');
    }

    //view standar method
    public function viewStandar()
    {
        return view('admin/view-standar');
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
    } // Profile Method
    public function profile()
    {
        return view('admin/profile');
    }

    // Report Method
    public function report()
    {
        return view('admin/report');
    }

    // FORM METHOD

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

    // add basic user Form (Done)
    public function addBasicUserform()
    {
        $users = $this->usersModel->findAll();
        $units = $this->unitsModel->findAll();
        $tahun = $this->tahunModel->findAll();
        $role = $this->roleModel->getRole('user');
        // dd($role, $tahun, $units, $users);
        $data = [
            'title' => 'Form Tambah User | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-add-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $this->data_user,
            'users' => $users,
            'units' => $units,
            'tahun' => $tahun,
            'role' => $role,
        ];
        return view('admin/add-base-user', $data);
    }

    // add auditor Form
    public function addAuditor()
    {
        return view('admin/add-auditor');
    }

    // add leader Form
    public function addLeader()
    {
        return view('admin/add-leader');
    }

    //Add Unit Method
    public function addUnit()
    {
        return view('admin/add-units');
    }

    //add data induk method
    public function addDataInduk()
    {
        return view('admin/add-dataInduk');
    }

    //Add standar method
    public function addStandar()
    {
        return view('admin/add-standar');
    }


    // FORM ACTION METHOD

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

    // Add user role unit method
    public function addBasicUser($role)
    {
        $email = $this->request->getVar('user');
        $role_id = $this->roleModel->getRole($role);
        $role_id = (int)$role_id['role_id'];
        $unit = $this->request->getVar('unit');
        $tahun = (int)$this->request->getVar('tahun');

        $data = [
            'email' => $email,
            'role_id' => $role_id,
            'unit_id' => $unit,
            'tahun' => $tahun,
        ];

        // Insert data ke User Role Unit
        $this->userroleunitModel->insert($data);

        // Set flashdata gagal dan kirim pesan eror dengan flashdata
        $this->session->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">User berhasil ditambahkan!</div>');
        return redirect()->to(base_url('admin/daftaruser'));
    }
}

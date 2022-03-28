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
            'css' => 'styles-admin-daftar-user.css',
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

    // Leader Method (Kurang parsing data units)
    public function leader()
    {
        $usersession = $this->data_user;
        $users = $this->userroleunitModel->getData();
        // dd($users);

        $data = [
            'title' => 'Pimpinan | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $usersession,
            'users' => $users
        ];

        return view('admin/user-leader', $data);
    }

    // Auditor Method (Done)
    public function auditor()
    {
        $usersession = $this->data_user;
        $users = $this->userroleunitModel->getData();
        // dd($users);

        $data = [
            'title' => 'Auditor | SIPMPP Admin UNDIP',
            'tab' => 'user',
            'css' => 'styles-admin-user.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $usersession,
            'users' => $users
        ];

        return view('admin/user-auditor', $data);
    }

    // units Method
    public function units()
    {
        $usersession = $this->data_user;
        $units = $this->unitsModel->findAll();

        $data = [
            'title' => 'Daftar | SIPMPP Admin UNDIP',
            'tab' => 'unit',
            'css' => 'styles-admin-unit.css',
            'header' => 'header__mini',
            'i' => $this->i,
            'usersession' => $usersession,
            'units' => $units
        ];

        return view('admin/units', $data);
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
    }

    // Profile Method
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

    // add auditor Form (Done)
    public function addAuditor()
    {
        $users = $this->usersModel->findAll();
        $units = $this->unitsModel->findAll();
        $tahun = $this->tahunModel->findAll();
        $role = $this->roleModel->getRole('auditor');
        // dd($role, $tahun, $units, $users);
        $data = [
            'title' => 'Form Tambah Auditor | SIPMPP Admin UNDIP',
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

        return view('admin/add-auditor', $data);
    }

    // add leader Form (Done)
    public function addLeader()
    {
        $users = $this->usersModel->findAll();
        $units = $this->unitsModel->findAll();
        $tahun = $this->tahunModel->findAll();
        $role = $this->roleModel->getRole('pimpinan');
        // dd($role, $tahun, $units, $users);
        $data = [
            'title' => 'Form Tambah User Pimpinan | SIPMPP Admin UNDIP',
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

        return view('admin/add-leader', $data);
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

    // Add user role unit method (Done)
    public function addBasicUser($role)
    {
        $email = $this->request->getVar('user');
        $role_id = $this->roleModel->getRole($role);
        $role_id = (int)$role_id['role_id'];

        if ($role == 'pimpinan') {
            $unit = 'lppm';
        } else {
            $unit = $this->request->getVar('unit');
        }
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

    // GENERATOR

    // Generate data induk method (Need Testing)
    public function generateDataInduk($tahun = null)
    {
        if ($tahun == null) {
            $tahun = (int)date('Y');
        }

        $datainduk = $this->dataIndukModel->findAll();
        $units = $this->unitsModel->findAll();

        foreach ($units as $unit) {
            foreach ($datainduk as $induk) {
                $data = [
                    'unit_id' => $unit['unit_id'],
                    'tahun' => $tahun,
                    'induk_id' => $induk['induk_id'],
                    'nilai' => 0,
                ];

                $this->unitIndukTahunModel->insert($data);
            }
        }

        // Set flashdata sukses
        $this->session->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Induk berhasil digenerate setiap unit!</div>');
        return redirect()->to(base_url('admin/datainduk'));
    }

    // Generate standar method (Need Testing)
    public function generateStandar($tahun = null)
    {
        if ($tahun == null) {
            $tahun = (int)date('Y');
        }

        $units = $this->unitsModel->findAll();
        $indikator = $this->indikatorModel->findAll();

        foreach ($units as $unit) {
            foreach ($indikator as $stand) {
                $data = [
                    'tahun' => $tahun,
                    'kategori_id' => $stand['kategori_id'],
                    'standar_id' => $stand['standar_id'],
                    'indikator_id' => $stand['indikator_id'],
                    'unit_id' => $unit['unit_id'],
                    'status' => 'Belum Diisi',
                ];

                $this->penilaianModel->insert($data);
            }
        }

        // Set flashdata sukses
        $this->session->setFlashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Standar berhasil digenerate setiap unit!</div>');
        return redirect()->to(base_url('admin/standar'));
    }

    //kategori page
    public function kategori()
    {
        return view('admin/kategori');
    }

    //edit data induk page
    public function editDataInduk()
    {
        return view('admin/edit-dataInduk');
    }
}

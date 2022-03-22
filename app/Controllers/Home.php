<?php

namespace App\Controllers;

use App\Models\UnitsModel;
use App\Models\TransaksiModel;
use App\Models\KategoriModel;
use App\Models\TahunModel;
use App\Models\UsersModel;
use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\StandarModel;

class Home extends BaseController
{
    protected $unitsModel;
    protected $transaksiModel;
    protected $kategoriModel;
    protected $tahunModel;
    protected $usersModel;
    protected $dataIndukModel;
    protected $indikatorModel;
    protected $standarModel;

    public function __construct()
    {
        $this->unitsModel = new UnitsModel();
        $this->transaksiModel = new TransaksiModel();
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
        $this->unitData = $this->transaksiModel->getTransaksiUserJoin($this->data_user['id_user']);
    }

    public function index()
    {
        // Check Login status
        // if (!session()->get('isLoggedIn')) {
        //     session()->setFlashdata('gagal', 'Anda harus login terlebih dahulu');
        //     return redirect()->to('/login');
        // }

        // if (session()->get('role') != 'user') {
        //     if (session()->get('role') == 'admin') {
        //         return redirect()->to('/admin');
        //     } elseif (session()->get('role') == 'auditor') {
        //         return redirect()->to('/auditor');
        //     } elseif (session()->get('role') == 'leader') {
        //         return redirect()->to('/leader');
        //     }
        // }

        $data_user = $this->data_user;
        // dd($data_user);

        $unitData = $this->unitData;
        // foreach ($unitData as $units) {
        //     dd($units);
        // }
        // dd($unitData);
        // $data_user = [
        //     'nama' => session()->get('nama'),
        //     'role' => session()->get('role'),
        //     'email' => session()->get('email'),
        //     'username' => session()->get('username'),
        //     'id_user' => session()->get('id_user'),
        //     'foto' => session()->get('foto'),
        // ];
        // dd($data_user);
        // $data = $this->unitsModel->getUnitKategoriTahun(1, 1);
        // $unit = $this->standarModel->getStandarAll(1, 4, 1);
        // $unit = $this->indikatorModel->getIndikatorAll(1);
        // dd($unit);

        // $tahun = (int)date('Y');
        // $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
        // $dataInduk = $this->dataIndukModel->getDataIndukUnitTahun($this->session->get('unit_id'), $tahun_id);
        // dd($dataInduk);

        $data = [
            'title' => 'Dashboard SIPMPP | SPMI UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'tab' => 'home',
            'css' => 'styles-dashboard.css'
        ];

        return view('user/index', $data);
        // return view('user/coba', $data);
    }

    public function dataInduk($unit_id, $tahun = null)
    {
        $path = $this->request->getPath();
        // dd($path);
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);
        // dd($unit);

        if ($tahun == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        } else {
            $tahun = (int)$tahun;
            // dd($tahun_id);
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        }

        // dd($tahun);

        $data = [
            'title' => 'Data Induk | SPMI UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'path' => $path,
            'tab' => 'datainduk',
            'css' => 'styles-data-induk.css',
            'tahun' => $tahun,
            'data_induk' => $this->dataIndukModel->getDataIndukJoin($unit_id, $tahun_id),
        ];
        // dd($data);

        return view('user/datainduk', $data);
    }
}

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

    // Dashboard Method
    public function index()
    {
        $data_user = $this->data_user;

        $unitData = $this->unitData;
        $i = 1;

        $data = [
            'title' => 'Dashboard SIPMPP | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'i' => $i,
            'tab' => 'home',
            'css' => 'styles-dashboard.css'
        ];

        return view('user/index', $data);
    }

    // Data Induk Method
    public function dataInduk($unit_id)
    {
        $tahun = $this->request->getVar('tahun');

        // getting path
        $path = $this->request->getPath();
        $path = base_url($path);

        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);

        if ($tahun == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        } else {
            $tahun = (int)$tahun;
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        }

        $data = [
            'title' => 'Data Induk | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'path' => $path,
            'tab' => 'datainduk',
            'css' => 'styles-data-induk.css',
            'tahun' => $tahun,
            'data_induk' => $this->dataIndukModel->getDataIndukJoin($unit_id, $tahun_id),
        ];

        return view('user/datainduk', $data);
    }

    // Standar Method
    public function standar($unit_id)
    {
        $tahun = $this->request->getVar('tahun');
        // getting path
        $path = $this->request->getPath();
        $path = base_url($path);
        // dd($path);
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);

        if ($tahun == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        } else {
            $tahun = (int)$tahun;
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        }

        $data = [
            'title' => 'Standar | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'path' => $path,
            'tab' => 'standar',
            'css' => 'styles-standar.css',
            'tahun' => $tahun,
            'standar' => $this->standarModel->getStandarUnitTahun($unit_id, $tahun_id),
        ];

        // dd($data);

        return view('user/standar', $data);
    }

    // Send Penilaian Method
    public function sendPenilaian($unit_id, $tahun)
    {
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);
    }

    // Indikator Method
    public function indikator($unit_id)
    {
        $tahun = $this->request->getVar('tahun');
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);

        if ($tahun == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        } else {
            $tahun = (int)$tahun;
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        }

        $data = [
            'title' => 'Indikator | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'tab' => 'indikator',
            'css' => 'styles-indikator.css',
            'tahun' => $tahun,
            'indikator' => $this->indikatorModel->getIndikatorUnitTahun($unit_id, $tahun_id),
        ];

        // dd($data);

        return view('user/indikator', $data);
    }
}

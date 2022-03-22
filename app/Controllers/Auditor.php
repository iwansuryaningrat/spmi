<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UnitsModel;
use App\Models\TransaksiModel;
use App\Models\KategoriModel;
use App\Models\TahunModel;
use App\Models\UsersModel;
use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\StandarModel;

class Auditor extends BaseController
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
            'title' => 'Dashboard SIPMPP | SPMI UNDIP 2022',
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
            'title' => 'Data Induk | SPMI UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
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
            'title' => 'Standar | SPMI UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'tab' => 'standar',
            'css' => 'styles-standar.css',
            'tahun' => $tahun,
            'standar' => $this->standarModel->getStandarJoin($unit_id, $tahun_id),
        ];

        return view('user/standar', $data);
    }
}

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
    }

    public function index()
    {
        // $data = $this->unitsModel->getUnitKategoriTahun(1, 1);
        $unit = $this->dataIndukModel->getDataIndukAll(1, 1, 4);
        // $unit = $this->dataIndukModel->findAll();
        dd($unit);

        // $tahun = (int)date('Y');
        // $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
        // $dataInduk = $this->dataIndukModel->getDataIndukUnitTahun($this->session->get('unit_id'), $tahun_id);
        // dd($dataInduk);

        // $data = [
        //     'title' => 'Dashboard | SPMI UNDIP 2022',
        // ];

        // return view('welcome_message');
    }

    public function dataInduk($tahun_id = null)
    {
        if ($tahun_id == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
        }

        $data = [
            'title' => 'Data Induk | SPMI UNDIP 2022',
            'tahun_id' => $tahun_id,
            'tahun' => $this->tahunModel->getTahun($tahun_id)['tahun'],
            'data_induk' => $this->dataIndukModel->getDataIndukUnitTahun($this->session->get('unit_id'), $tahun_id),
            'indikator' => $this->indikatorModel->getIndikator(),
            'standar' => $this->standarModel->getStandar(),
        ];
    }
}

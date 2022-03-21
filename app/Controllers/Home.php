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
        // Check Login status
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('gagal', 'Anda harus login terlebih dahulu');
            return redirect()->to('/login');
        }

        if (session()->get('role') != 'user') {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin');
            } elseif (session()->get('role') == 'auditor') {
                return redirect()->to('/auditor');
            } elseif (session()->get('role') == 'leader') {
                return redirect()->to('/leader');
            }
        }

        $data = [
            'nama' => session()->get('nama'),
            'role' => session()->get('role'),
            'email' => session()->get('email'),
            'username' => session()->get('username'),
            'id_user' => session()->get('id_user'),
            'foto' => session()->get('foto'),
        ];
        dd($data);
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
        ];

        return view('user/index', $data);
    }

    public function dataInduk($tahun = null)
    {

        if ($tahun == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
        } else {
            $tahun = (int)$tahun;
            // dd($tahun_id);
            $tahun = $this->tahunModel->getTahunAktif($tahun);
        }

        dd($tahun);
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

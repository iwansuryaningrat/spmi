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

        $this->session = \Config\Services::session();
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
            'header' => 'header__big',
            'css' => 'styles-dashboard.css'
        ];

        return view('user/index', $data);
    }

    // Data Induk Method (Done)
    public function dataInduk($unit_id)
    {
        $tahun = $this->request->getVar('tahun');
        // dd($tahun);

        $data_tahun = $this->tahunModel->findAll();

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

        $i = 1;
        // $datainduk = $this->dataIndukModel->getDataIndukJoin($unit_id, $tahun_id);
        // dd($datainduk);

        $data = [
            'title' => 'Data Induk | SIPMPP UNDIP 2022',
            'path' => $path,
            'tab' => 'datainduk',
            'header' => 'header__mini',
            'css' => 'styles-data-induk.css',
            'i' => $i,
            'data_user' => $data_user,
            'unit' => $unit,
            'unitData' => $unitData,
            'tahun' => $tahun,
            'dataTahun' => $data_tahun,
            'data_induk' => $this->dataIndukModel->getDataIndukJoin($unit_id, $tahun_id),
        ];

        return view('user/datainduk', $data);
    }

    // Standar Method (Done)
    public function standar($unit_id)
    {
        $tahun = $this->request->getVar('tahun');

        $data_tahun = $this->tahunModel->findAll();

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

        $i = 1;

        // Penelitian 
        $penelitian_id = $this->kategoriModel->getKategoriNama('Penelitian')['kategori_id'];
        $penelitian_id = (int)$penelitian_id;
        $penelitian = $this->standarModel->getStandarAll($unit_id, $tahun_id, $penelitian_id);

        // Pengabdian Masyarakat
        $pengabdian_id = $this->kategoriModel->getKategoriNama('Pengabdian Masyarakat')['kategori_id'];
        $pengabdian_id = (int)$pengabdian_id;
        $pengabdian = $this->standarModel->getStandarAll($unit_id, $tahun_id, $pengabdian_id);

        $standardata = $this->standarModel->getStandarUnitTahun($unit_id, $tahun_id);

        $status = [];
        foreach ($standardata as $standar) {
            array_push($status, $standar['status']);
        }

        // Cek apakah semua standar sudah diisi
        if (in_array('Dikirim', $status)) {
            $status = "Sudah Dikirim";
        } else {
            $status = "Belum Dikirim";
        }

        $data = [
            'title' => 'Standar | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'unit_id' => $unit_id,
            'path' => $path,
            'tab' => 'standar',
            'header' => 'header__mini',
            'css' => 'styles-standar.css',
            'tahun' => $tahun,
            'i' => $i,
            'status' => $status,
            'dataTahun' => $data_tahun,
            'penelitian' => $penelitian,
            'pengabdian' => $pengabdian,
        ];

        return view('user/standar', $data);
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
            'header' => 'header__mini',
            'css' => 'styles-indikator.css',
            'tahun' => $tahun,
            'indikator' => $this->indikatorModel->getIndikatorUnitTahun($unit_id, $tahun_id),
        ];

        // dd($data);

        return view('user/indikator', $data);
    }

    // Report Method
    public function report()
    {
        $data_user = $this->data_user;

        $unitData = $this->unitData;
        $i = 1;

        $data = [
            'title' => 'Dashboard SIPMPP | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'i' => $i,
            'tab' => 'report',
            'header' => 'header__mini',
            'css' => 'styles-report.css'
        ];

        return view('user/report', $data);
    }

    // FORM METHOD // 

    // Indikator Form Method
    public function indikatorForm()
    {
        return view('user/indikatorform');
    }


    // ACTION METHOD // 

    // Send Penilaian Method
    public function sendPenilaian($unit_id, $tahun)
    {
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);

        $unit_id = (int)$unit_id;

        if ($tahun == null) {
            $tahun = (int)date('Y');
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        } else {
            $tahun = (int)$tahun;
            $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
            $tahun_id = (int)$tahun_id;
        }

        $standar = $this->standarModel->getStandarUnitTahun($unit_id, $tahun_id);
        $status = [];
        foreach ($standar as $s) {
            array_push($status, $s['status']);
        }

        // Cek apakah semua standar sudah diisi
        if (in_array('Belum Diisi', $status) || in_array('Belum Lengkap', $status)) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Peringatan!</strong> Semua standar belum diisi.
            </div>');
            return redirect()->to(base_url('home/standar/' . $unit_id . '/' . $tahun));
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Berhasil!</strong> Penilaian telah dikirim.
            </div>');
            return redirect()->to(base_url('home/standar/' . $unit_id . '/' . $tahun));
        }
    }

    // Edit Data Induk Method (Done)
    public function editDataInduk($unit_id, $tahun)
    {
        $id = $this->request->getVar('induk_id');
        $id = (int)$id;
        $tahun = (int)$tahun;
        $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
        $tahun_id = (int)$tahun_id;

        $induk = $this->dataIndukModel->getDataIndukId($id);
        $induk['nilai'] = (int)$this->request->getVar('nilai');
        $induk['induk_id'] = (int)$induk['induk_id'];
        $induk['kategori_id'] = (int)$induk['kategori_id'];
        $induk['tahun_id'] = (int)$induk['tahun_id'];
        $induk['unit_id'] = (int)$induk['unit_id'];

        // Update Data
        $this->dataIndukModel->update($id, $induk);

        return redirect()->to('/home/datainduk/' . $unit_id . '/' . $tahun);
    }
}

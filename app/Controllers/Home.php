<?php

namespace App\Controllers;

use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\KategoriModel;
use App\Models\PenilaianModel;
use App\Models\StandarModel;
use App\Models\TahunModel;
use App\Models\UnitIndukTahunModel;
use App\Models\UnitsModel;
use App\Models\UsersModel;
use App\Models\UserRoleUnitModel;

class Home extends BaseController
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
    protected $userroleunitModel;

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
        $this->userunitModel = new UserRoleUnitModel();
        $this->data_user = [
            'email' => session()->get('email'),
            'nama' => session()->get('nama'),
            'foto' => session()->get('foto'),
            'unit_id' => session()->get('unit_id'),
            'unit' => session()->get('unit'),
            'role' => session()->get('role'),
            'role_id' => session()->get('role_id'),
            'tahun' => session()->get('tahun'),
        ];
        $this->getTahun = (int)date('Y');
        $this->i = 1;
        $this->session = \Config\Services::session();
    }

    // Dashboard Method
    public function index()
    {
        $data_user = $this->data_user;
        // dd($data_user);

        $i = 1;

        $data = [
            'title' => 'Dashboard SIPMPP | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'i' => $i,
            'tab' => 'home',
            'header' => 'header__big',
            'css' => 'styles-dashboard.css'
        ];

        return view('user/index', $data);
    }

    // Data Induk Method (Done)
    public function dataInduk()
    {
        $tahun = $this->request->getVar('tahun');

        $data_tahun = $this->tahunModel->findAll();

        // getting path
        $path = $this->request->getPath();
        $path = base_url($path);

        $data_user = $this->data_user;

        if ($tahun == null) {
            $tahun = $this->getTahun;
        } else {
            $tahun = (int)$tahun;
        }

        $unit_id = $data_user['unit_id'];
        // dd($unit_id);
        $data_induk = $this->unitIndukTahunModel->getIndukUnit($unit_id, $tahun);
        // dd($data_induk);

        $i = 1;

        $data = [
            'title' => 'Data Induk | SIPMPP UNDIP 2022',
            'path' => $path,
            'tab' => 'induk',
            'header' => 'header__mini',
            'css' => 'styles-data-induk.css',
            'i' => $i,
            'data_user' => $data_user,
            'tahun' => $tahun,
            'dataTahun' => $data_tahun,
            'data_induk' => $this->unitIndukTahunModel->getIndukUnit($unit_id, $tahun),
        ];

        return view('user/datainduk', $data);
    }

    // Standar Method 
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
    public function indikator($unit_id, $standar_id, $tahun)
    {
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        $unit = $this->unitsModel->getUnitId($unit_id);

        $tahun = (int)$tahun;
        $tahun_id = $this->tahunModel->getTahunAktif($tahun)['tahun_id'];
        $tahun_id = (int)$tahun_id;

        $standar = $this->standarModel->getStandarId($standar_id);

        $i = 1;


        $data = [
            'title' => 'Indikator | SIPMPP UNDIP 2022',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'unit_id' => $unit_id,
            'tab' => 'standar',
            'standar' => $standar,
            'i' => $i,
            'header' => 'header__mini header__indikator',
            'css' => 'styles-indikator.css',
            'tahun' => $tahun,
            'indikator' => $this->indikatorModel->getIndikatorStandarInduk($standar_id),
        ];

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
    public function indikatorForm($indikator_id)
    {
        $data_user = $this->data_user;

        $unitData = $this->unitData;

        // Data Indikator
        $indikator = $this->indikatorModel->getIndikatorStandar($indikator_id);

        // Data Standar
        $standar_id = (int)$indikator['standar_id'];
        $standar = $this->standarModel->getStandarId($standar_id);

        // Data Unit 
        $unit_id = (int)$standar['unit_id'];
        $unit = $this->unitsModel->getUnitId($unit_id);

        $data = [
            'title' => 'Form Indikator SPMI - ' . $unit['nama_unit'] . ' | SIPMPP UNDIP',
            'data_user' => $data_user,
            'unitData' => $unitData,
            'unit' => $unit,
            'unit_id' => $unit_id,
            'tab' => 'standar',
            'standar' => $standar,
            'header' => 'header__mini header__indikator',
            'css' => 'styles-form-indikator-spmi.css',
            'indikator' => $indikator,
        ];

        return view('user/indikatorform', $data);
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
            return redirect()->to('/home/standar/' . $unit_id . '/' . $tahun);
        } else {
            foreach ($standar as $s) {
                $this->standarModel->updateStatus($s['standar_id'], 'Dikirim');
            }
            $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Berhasil!</strong> Penilaian telah dikirim.
            </div>');
            return redirect()->to('/home/standar/' . $unit_id . '/' . $tahun);
        }
    }

    // Edit Data Induk Method 
    public function editDataInduk($unit_id, $tahun)
    {
        $induk_id = $this->request->getVar('induk_id');
        $tahun = (int)$tahun;
        $unit_id = $unit_id;
        $nilai = $this->request->getVar('nilai');

        // Update Data
        $this->unitIndukTahunModel->updateNilai($unit_id, $tahun, $induk_id, $nilai);

        return redirect()->to('/home/datainduk/' . $unit_id . '/' . $tahun);
    }

    // Save Indikator Method 
    public function saveIndikator($indikator_id)
    {
        $indikator_id = (int)$indikator_id;
        $hasil = $this->request->getVar('hasil');
        $keterangan = $this->request->getVar('keterangan');
        $status = "Diisi";

        // Dokumen handler
        $dokumen = $this->request->getFile('dokumen');
        if ($dokumen->getError() == 4) {
            return redirect()->to('/home/indikatorform/' . $indikator_id);
        } else {
            $namadokumen = 'dokumen-' . $indikator_id;
            $dokumen->move('dokumen/', $namadokumen);
        };

        // Ambil data dari database berdasarkan indikator_id
        $indikator = $this->indikatorModel->getIndikatorStandar($indikator_id);
        $indikator['indikator_id'] = (int)$indikator['indikator_id'];
        $indikator['standar_id'] = (int)$indikator['standar_id'];
        $indikator['induk_id'] = (int)$indikator['induk_id'];

        // Data Standar
        $standar_id = (int)$indikator['standar_id'];
        $standar = $this->standarModel->getStandarId($standar_id);

        // Tahun
        $tahun_id = (int)$standar['tahun_id'];
        $tahun = $this->tahunModel->getTahunId($tahun_id)['tahun'];

        // Data Unit 
        $unit_id = (int)$standar['unit_id'];
        $unit = $this->unitsModel->getUnitId($unit_id);

        // Update Data
        $this->indikatorModel->updateUser($indikator_id, $status, $hasil, $keterangan, $namadokumen);

        return redirect()->to('/home/indikator/' . $unit_id . '/' . $standar_id . '/' . $tahun);
    }
}

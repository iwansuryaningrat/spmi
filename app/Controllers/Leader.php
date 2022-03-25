<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UnitsModel;
use App\Models\KategoriModel;
use App\Models\TahunModel;
use App\Models\UsersModel;
use App\Models\DataIndukModel;
use App\Models\IndikatorModel;
use App\Models\StandarModel;

class Leader extends BaseController
{
    protected $unitsModel;
    protected $kategoriModel;
    protected $tahunModel;
    protected $usersModel;
    protected $dataIndukModel;
    protected $indikatorModel;
    protected $standarModel;

    public function __construct()
    {
        $this->unitsModel = new UnitsModel();
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

        // if (session()->get('role') != 'leader') {
        //     if (session()->get('role') == 'admin') {
        //         return redirect()->to('/admin');
        //     } elseif (session()->get('role') == 'auditor') {
        //         return redirect()->to('/auditor');
        //     } elseif (session()->get('role') == 'user') {
        //         return redirect()->to('/home');
        //     }
        // }

        $user = session()->get('email');
        dd($user);
    }
}

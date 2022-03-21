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
    }

    public function index()
    {
        // Check Login status
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('gagal', 'Anda harus login terlebih dahulu');
            return redirect()->to('auth/login');
        }

        if (session()->get('role') != 'auditor') {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin');
            } elseif (session()->get('role') == 'leader') {
                return redirect()->to('/leader');
            } elseif (session()->get('role') == 'user') {
                return redirect()->to('/user');
            }
        }
        $user = session()->get('email');
        dd($user);
    }
}

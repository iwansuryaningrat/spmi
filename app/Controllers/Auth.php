<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\TransaksiModel;
use App\Models\SupercodeModel;

class Auth extends BaseController
{
    protected $usersModel;
    protected $transaksiModel;
    protected $supercodeModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->transaksiModel = new TransaksiModel();
        $this->supercodeModel = new SupercodeModel();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        // Check Login status
        // if (session()->get('isLoggedIn')) {
        //     if (session()->get('role') == 'admin') {
        //         return redirect()->to('/admin');
        //     } elseif (session()->get('role') == 'auditor') {
        //         return redirect()->to('/auditor');
        //     } elseif (session()->get('role') == 'leader') {
        //         return redirect()->to('/leader');
        //     } elseif (session()->get('role') == 'user') {
        //         return redirect()->to('/home');
        //     }
        // }

        $data = [
            'title' => 'Login SIPMPP | SPMI UNDIP 2022',
        ];

        return view('auth/login', $data);
    }

    // Valid Login
    public function loginProcess()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->usersModel->getUserByUsername($username);
        // dd($user);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['user_id'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'foto' => $user['foto'],
                    'isLoggedIn' => true,
                ];

                $this->session->set($data);

                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin');
                } elseif ($user['role'] == 'user') {
                    return redirect()->to('/home');
                } elseif ($user['role'] == 'auditor') {
                    return redirect()->to('/auditor');
                } else {
                    return redirect()->to('/leader');
                }
            } else {
                session()->setFlashdata('gagal', 'Gagal melakukan proses autentikasi. Mohon maaf untuk mengisi email & password dengan benar.');

                return redirect()->to('/login');
            }
        } else {
            $data = [
                'title' => 'Login | SPMI UNDIP 2022',
                'validation' => [
                    'Email' => 'Email atau Password salah',
                ],
            ];

            return view('auth/login', $data);
        }
    }

    // Register Page
    public function register()
    {
        // Check Login status
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin');
            } elseif (session()->get('role') == 'auditor') {
                return redirect()->to('/auditor');
            } elseif (session()->get('role') == 'leader') {
                return redirect()->to('/leader');
            } elseif (session()->get('role') == 'user') {
                return redirect()->to('/home');
            }
        }
        $data = [
            'title' => 'Register SIPMPP | SPMI UNDIP 2022',
        ];

        return view('auth/register', $data);
    }

    // valid register
    public function registerProcess()
    {
        $supercode = $this->supercodeModel->findAll();
        $supercode = $supercode[0]['supercode'];
        $inputcode = $this->request->getVar('superpass');
        $verify = password_verify($inputcode, $supercode);

        if ($verify == false) {
            session()->setFlashdata('error', 'Gagal melakukan proses registrasi. Mohon maaf untuk mengisi supercode dengan benar.');

            return redirect()->to('auth/register');
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 'admin',
                'foto' => 'default.png',
            ];

            $this->usersModel->insert($data);

            $data = [
                'title' => 'Login | SPMI UNDIP 2022',
                'validation' => [
                    'message' => 'Akun berhasil dibuat, silahkan login',
                ],
            ];

            return view('/login', $data);
        }
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();

        return redirect()->to('/login');
    }

    // Generate User
    public function generateUser()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'foto' => 'default.png',
        ];
        $this->usersModel->insert($data);
    }

    // Form Generate User
    public function formGenerateUser()
    {
        $data = [
            'title' => 'Generate User | SPMI UNDIP 2022',
        ];

        return view('auth/generateUser', $data);
    }

    public function generatepassword($password)
    {
        $data = password_hash($password, PASSWORD_DEFAULT);
        dd($data);
    }
}

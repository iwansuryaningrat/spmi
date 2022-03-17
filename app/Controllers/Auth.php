<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\TransaksiModel;

class Auth extends BaseController
{
    protected $usersModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->transaksiModel = new TransaksiModel();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        $data = [
            'title' => 'Login | SPMI UNDIP 2022',
        ];

        return view('auth/login', $data);
    }

    // Valid Login
    public function validLogin()
    {
        if (!$this->validate([
            'email' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->to('/login')->withInput()->with('validation', $this->validation);
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = $this->usersModel->where('email', $email)->first();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'foto' => $user['foto'],
                        'is_login' => true,
                    ];

                    $this->session->set($data);

                    return redirect()->to('/');
                } else {
                    $data = [
                        'title' => 'Login | SPMI UNDIP 2022',
                        'validation' => [
                            'Email' => 'Email atau Password salah',
                        ],
                    ];

                    return view('auth/login', $data);
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
    }

    // Register Page
    public function register()
    {
        $data = [
            'title' => 'Register | SPMI UNDIP 2022',
        ];

        return view('auth/register', $data);
    }

    // valid register
    public function validRegister()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password2' => 'required|matches[password]',
        ])) {
            return redirect()->to('/register')->withInput()->with('validation', $this->validation);
        } else {
            $data = [
                'name' => $this->request->getVar('name'),
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

            return view('auth/login', $data);
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
            'name' => $this->getVar('name'),
            'email' => $this->getVar('email'),
            'password' => password_hash($this->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->getVar('role'),
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
}

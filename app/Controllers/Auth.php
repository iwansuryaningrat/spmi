<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
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
        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                ],
            ]);

            if ($validation) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $user = $this->usersModel->where('username', $username)->first();

                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'id' => $user['id'],
                            'username' => $user['username'],
                            'role_id' => $user['role_id'],
                            'unit_id' => $user['unit_id'],
                        ];

                        $this->session->set($data);
                        return redirect()->to('/');
                    } else {
                        $validation->setError('password', 'Password salah');
                        return redirect()->to('/auth/login')->withInput()->with('validation', $validation);
                    }
                } else {
                    $validation->setError('username', 'Username tidak ditemukan');
                    return redirect()->to('/auth/login')->withInput()->with('validation', $validation);
                }
            } else {
                return redirect()->to('/auth/login')->withInput()->with('validation', $validation);
            }
        } else {
            return redirect()->to('/auth/login');
        }
    }

    // valid register
    public function validRegister()
    {
        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[users.username]',
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                ],
                'password_confirm' => [
                    'label' => 'Password Confirm',
                    'rules' => 'required|matches[password]',
                ],
            ]);

            if ($validation) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $data = [
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role_id' => 2,
                ];

                $this->usersModel->insert($data);
                return redirect()->to('/auth/login');
            } else {
                return redirect()->to('/auth/register')->withInput()->with('validation', $validation);
            }
        } else {
            return redirect()->to('/auth/register');
        }
    }
}

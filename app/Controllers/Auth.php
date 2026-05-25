<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('auth/login');
    }

    public function register()
    {
        $model = new UserModel();
        
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($model->save($data)) {
            return redirect()->to(base_url('/auth'))->with('success', 'Registrasi berhasil. Silakan login.');
        }

        return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id'         => $user['id'],
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'email'      => $user['email']
            ]);

            return redirect()->to(base_url('/'))->with('success', 'Selamat datang!');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/auth'))->with('success', 'Anda telah keluar.');
    }
}
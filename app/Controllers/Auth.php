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
            session()->set([
                'isLoggedIn' => true, 
                'username'   => $data['username']
            ]);
            return redirect()->to(base_url('/'))->with('success', 'Registrasi berhasil. Selamat Datang!');
        }

        return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 1. Cari user berdasarkan username
        $user = $model->where('username', $username)->first();

        // 2. Cek apakah user ada dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            
            // 3. Set Session jika data valid
            session()->set([
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'email'      => $user['email']
            ]);

            return redirect()->to(base_url('/'))->with('success', 'Selamat datang kembali, ' . $user['username'] . '!');
        } else {
            // 4. Jika gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Username atau Password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/auth'))->with('success', 'Anda telah keluar.');
    }
}
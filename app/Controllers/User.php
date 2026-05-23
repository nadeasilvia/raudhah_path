<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $userId = session()->get('id'); // Menggunakan 'id'
        $profileModel = new \App\Models\ProfileModel();
        
        // Cari data profil berdasarkan user_id
        $profileData = $profileModel->where('user_id', $userId)->first();

        return view('user/edit_profile', ['profile' => $profileData]);
    }

    public function update()
    {
        // PERBAIKAN: Disamakan menggunakan 'id' sesuai session login kamu
        $userId = session()->get('id'); 
       // 2. MASUKKAN VALIDASINYA DI SINI
if (!$userId) {
    return redirect()->to(base_url('/'))->with('error', 'Silakan login terlebih dahulu.');
}
        $profileModel = new \App\Models\ProfileModel();
        
        $data = [
            'user_id'         => $userId,
            'full_name'       => $this->request->getPost('full_name'),
            'passport_number' => $this->request->getPost('passport_number'),
            'phone'           => $this->request->getPost('phone'),
            'address'         => $this->request->getPost('address'),
        ];

        // Cek apakah profil sudah ada atau belum
        $existingProfile = $profileModel->where('user_id', $userId)->first();

        if ($existingProfile) {
            $profileModel->update($existingProfile['id'], $data);
        } else {
            $profileModel->insert($data);
        }

        return redirect()->to(base_url('/'))->with('success', 'Profil travel berhasil diperbarui!');
    }
}
<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $userId = session()->get('id');
        $profileModel = new \App\Models\ProfileModel();

        // Cari data profil
        $profileData = $profileModel->where('user_id', $userId)->first();

        // Pastikan ini memanggil file 'user/edit_profile'
        return view('user/edit_profile', ['profile' => $profileData]);
    }

    public function update()
    {
        $model = new \App\Models\ProfileModel();
        $userId = session()->get('id');

        $data = [
            'nama_lengkap'    => $this->request->getPost('nama_lengkap'),
            'nomor_paspor'    => $this->request->getPost('nomor_paspor'),
            'nomor_whatsapp'  => $this->request->getPost('nomor_whatsapp'),
            'alamat_domisili' => $this->request->getPost('alamat_domisili'),
        ];

        $existing = $model->where('user_id', $userId)->first();

        if ($existing) {
            $model->update($existing['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $model->insert($data);
        }

        // Menambahkan pesan untuk pop-up
        return redirect()->to('/user/profile')->with('message', 'Data profil berhasil disimpan!');
    }
    public function profile() {
    $userId = session()->get('id');
    
    // Debugging: Cek apakah ID user terbaca
    echo "ID User di Session: " . $userId; 
    
    $profileModel = new \App\Models\ProfileModel();
    $data = $profileModel->where('user_id', $userId)->first();
    
    // Debugging: Cek apakah kueri menghasilkan data
    var_dump($data); die(); 

    return view('user/profile', ['profile' => $data]);
}
}
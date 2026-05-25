<?php

namespace App\Controllers;
use App\Models\ContactModel;

class Contact extends BaseController
{
    public function send()
    {
        $model = new ContactModel();

        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'topik'    => $this->request->getPost('topik'),
            'pesan'    => $this->request->getPost('pesan'),
        ];

        // Simpan ke database
        $model->save($data);

        // Berikan pesan sukses menggunakan flashdata
        return redirect()->to('/contact')->with('success', 'Pesan Anda telah terkirim!');
    }
}
<?php

namespace App\Controllers;

// Pastikan kamu memanggil Model jika ingin mengambil data dari database
// use App\Models\PackageModel;

class PackagesController extends BaseController
{
    public function index()
    {
        // 1. Inisialisasi Model (Contoh jika sudah ada PackageModel)
        // $packageModel = new \App\Models\PackageModel();
        // $airlineModel = new \App\Models\AirlineModel();

        // 2. Siapkan data untuk dikirim ke view
        $data = [
            'view'         => 'packages', // WAJIB agar if ($view == 'packages') di HTML jalan
            'title'        => 'Daftar Paket Umrah - Raudhah Path',
            
            // Mengambil data dari database (ini contoh, sesuaikan dengan nama modelmu)
            'packages'     => [], // Misal: $packageModel->findAll()
            'all_airlines' => [], // Misal: $airlineModel->findAll()
            
            // Menangkap keyword pencarian jika ada
            'keyword'      => $this->request->getGet('search')
        ];

        /** * 'nama_file_view_kamu' harus diganti dengan nama file asli 
         * tempat kamu menaruh kode HTML panjang yang tadi kamu kirim.
         * Contoh: Jika filenya bernama 'layout_utama.php', maka tulis 'layout_utama'
         */
        return view('umrah_list.php', $data);
    }
}
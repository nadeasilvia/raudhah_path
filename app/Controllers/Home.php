<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * HALAMAN UTAMA (HOME)
     */
    public function index()
{
    $db = \Config\Database::connect();
    
    // 1. Ambil data paket
    $builder = $db->table('packages p');
    $builder->select('p.*, a.nama_maskapai, t.nama_agent');
    $builder->join('airlines a', 'a.id = p.airline_id', 'left');
    $builder->join('travel_agents t', 't.id = p.agent_id', 'left');
    $builder->limit(4); 
    $data['packages'] = $builder->get()->getResult();
    $data['durasi'] = $db->table('packages')->select('durasi_hari')->distinct()->orderBy('durasi_hari', 'ASC')->get()->getResultArray();

    // TAMBAHKAN INI: Ambil Kategori (Jenis Paket)
    $data['kategori'] = $db->table('packages')->select('kategori')->distinct()->get()->getResultArray();
// 3. Ambil Semua Maskapai (untuk filter Maskapai)
    $data['all_airlines'] = $db->table('airlines')->get()->getResult();
    // 2. Ambil data agen
    $data['all_agents'] = $db->table('travel_agents')->get()->getResult();
    
    // 3. Ambil data durasi unik untuk filter (GABUNGAN BARU)
    // Jika cara builder tetap gagal, coba cara SQL murni:
    // 4. SAKLAR: Aktifkan tampilan Home
    $data['view'] = 'home'; 

    return view('umrah_list', $data);
}

    /**
     * HALAMAN PACKAGES (LIST & FILTER)
     */
    public function packages()
    {
        $db = \Config\Database::connect();
        
        $search     = $this->request->getGet('search');
        $paket_type = $this->request->getGet('paket_type');
        $durasi     = $this->request->getGet('durasi');
        $maskapai   = $this->request->getGet('maskapai');
        $sort_harga = $this->request->getGet('sort_harga');

        $builder = $db->table('packages p');
        $builder->select('p.*, a.nama_maskapai, t.nama_agent');
        $builder->join('airlines a', 'a.id = p.airline_id', 'left');
        $builder->join('travel_agents t', 't.id = p.agent_id', 'left');

        if (!empty($search)) $builder->like('p.nama_paket', $search);
        if (!empty($paket_type)) $builder->where('p.kategori', $paket_type);
        if (!empty($durasi)) $builder->where('p.durasi_hari', $durasi);
        if (!empty($maskapai)) $builder->where('p.airline_id', $maskapai);
        
        if ($sort_harga == 'ASC' || $sort_harga == 'DESC') {
            $builder->orderBy('p.harga_jual', $sort_harga);
        }

        $data['packages']     = $builder->get()->getResult();
        $data['all_airlines'] = $db->table('airlines')->get()->getResult();
        $data['all_agents']   = $db->table('travel_agents')->get()->getResult();
        $data['keyword']      = $search;

        $query = $db->query("SELECT DISTINCT durasi_hari FROM packages WHERE durasi_hari IS NOT NULL ORDER BY durasi_hari ASC");
        $data['durasi'] = $query->getResultArray();
        $data['durasi'] = $db->table('packages')->select('durasi_hari')->distinct()->orderBy('durasi_hari', 'ASC')->get()->getResultArray();
        $data['kategori'] = $db->table('packages')->select('kategori')->distinct()->get()->getResultArray();
        // Tambahkan ini di dalam fungsi index() dan packages()
        $data['all_airlines'] = $db->table('airlines')->orderBy('nama_maskapai', 'ASC')->get()->getResult();
        // SAKLAR: Aktifkan tampilan Packages
        $data['view'] = 'packages'; 

        return view('umrah_list', $data);
    }

    /**
     * HALAMAN DETAIL PAKET
     */
    public function detail($id)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('packages p');
        $builder->select('p.*, a.nama_maskapai, t.nama_agent');
        $builder->join('airlines a', 'a.id = p.airline_id', 'left');
        $builder->join('travel_agents t', 't.id = p.agent_id', 'left');
        $builder->where('p.id', $id);
        
        $data['package'] = $builder->get()->getRow();
        
        if (!$data['package']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // SAKLAR: Aktifkan tampilan Detail
        $data['view'] = 'detail'; 

        return view('umrah_list', $data);
    }

    /**
     * HALAMAN ABOUT US
     */
    public function about()
    {
        // SAKLAR: Aktifkan tampilan About
        $data['view'] = 'about'; 
        return view('umrah_list', $data);
    }

    /**
     * HALAMAN CONTACT US
     */
    public function contact()
    {
        // SAKLAR: Aktifkan tampilan Contact
        $data['view'] = 'contact'; 
        return view('umrah_list', $data);
    }
    public function travel_resmi()
{
    $data = [
        'title' => 'Travel Resmi - Raudhah Path',
        'view'  => 'travel_resmi' // Ini kunci untuk memanggil bagian HTML nanti
    ];
    return view('umrah_list', $data); 
}
public function perbandingan()
{
    $data = [
        'title' => 'Perbandingan Mudah - Raudhah Path',
        'view'  => 'perbandingan' // Kunci untuk menampilkan HTML perbandingan
    ];
    return view('umrah_list', $data);
}

}
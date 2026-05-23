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
        
        $builder = $db->table('packages p');
        $builder->select('p.*, a.nama_maskapai, t.nama_agent');
        $builder->join('airlines a', 'a.id = p.airline_id', 'left');
        $builder->join('travel_agents t', 't.id = p.agent_id', 'left');
        $builder->limit(4); // Hanya ambil 4 paket untuk preview di Home

        $data['packages']    = $builder->get()->getResult();
        $data['all_agents']  = $db->table('travel_agents')->get()->getResult();
        
        // SAKLAR: Aktifkan tampilan Home
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
        if (!empty($paket_type)) $builder->where('p.jenis_paket', $paket_type);
        if (!empty($durasi)) $builder->where('p.durasi_hari', $durasi);
        if (!empty($maskapai)) $builder->where('p.airline_id', $maskapai);
        
        if ($sort_harga == 'ASC' || $sort_harga == 'DESC') {
            $builder->orderBy('p.harga_jual', $sort_harga);
        }

        $data['packages']     = $builder->get()->getResult();
        $data['all_airlines'] = $db->table('airlines')->get()->getResult();
        $data['all_agents']   = $db->table('travel_agents')->get()->getResult();
        $data['keyword']      = $search;

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
}
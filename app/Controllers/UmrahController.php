<?php

namespace App\Controllers;

class UmrahController extends BaseController
{
    public function index()
    {
        // Data dummy ini nantinya bisa Anda ganti dengan data dari Database
        $data['packages'] = [
            [
                'name'    => 'Umrah Hemat',
                'agent'   => '6 Raudhah Tour',
                'reviews' => '12',
                'airline' => 'Saudi Airlines',
                'price'   => '25 Juta',
                'image'   => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=500'
            ],
            [
                'name'    => 'Umrah VIP',
                'agent'   => 'Raudhah Tour Exclusive',
                'reviews' => '45',
                'airline' => 'Garuda Indonesia',
                'price'   => '35 Juta',
                'image'   => 'https://images.unsplash.com/photo-1565552645632-d7c5f764f607?w=500'
            ],
            [
                'name'    => 'Umrah Ramadhan',
                'agent'   => '9 Raudhah Tour',
                'reviews' => '8',
                'airline' => 'Qatar Airways',
                'price'   => '29 Juta',
                'image'   => 'https://images.unsplash.com/photo-1542640244-7e672d6cef21?w=500'
            ],
            [
                'name'    => 'Umrah Plus Turki',
                'agent'   => '8 Raudhah Tour',
                'reviews' => '20',
                'airline' => 'Turkish Airlines',
                'price'   => '42 Juta',
                'image'   => 'https://images.unsplash.com/photo-1564769662533-4f00a87b4056?w=500'
            ],
        ];

        return view('umrah_list', $data);
    }
}
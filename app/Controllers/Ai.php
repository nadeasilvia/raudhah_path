<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Ai extends Controller
{
    public function proses()
    {
        $pesanUser = $this->request->getPost('pesan') ?? '';
        if (empty($pesanUser)) {
            return $this->response->setJSON(['jawaban' => 'Tanya sesuatu yuk!']);
        }

        $db = \Config\Database::connect();
        $paket = $db->table('packages')->get()->getResultArray();
        
        $context = "Daftar paket umroh kami: ";
        foreach($paket as $p) { 
            $context .= $p['nama_paket'] . " seharga Rp " . number_format($p['harga_jual'], 0, ',', '.') . ". "; 
        }

        $apiKey = "AIzaSyCISDFZDJ2TWHlFW37PMJPnhRHrDceL6KI"; 

        // PAKAI URL INI (Model gemini-1.5-flash standar)
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => "Kamu adalah asisten Raudhah Path. Data paket: $context. Jawab dengan ramah, islami, dan singkat: " . esc($pesanUser)]
                    ]
                ]
            ]
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true);

        if ($httpCode !== 200) {
            // Kita tampilin error aslinya buat debug
            $errorMsg = $result['error']['message'] ?? 'Koneksi gagal.';
            return $this->response->setJSON(['jawaban' => "Waduh, Google bilang: $errorMsg"]);
        }

        $jawabanAI = $result['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf kak, saya lagi loading. Bisa tanya lagi?";
        $jawabanAI = str_replace(['**', '#'], '', $jawabanAI);

        return $this->response->setJSON(['jawaban' => trim($jawabanAI)]);
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table      = 'paket_umrah'; // Sesuaikan dengan nama tabel di MySQL kamu
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['tanggal', 'nama_paket', 'maskapai', 'rute', 'harga'];
}
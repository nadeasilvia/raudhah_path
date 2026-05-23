<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Memastikan data yang diambil berbentuk array agar cocok dengan $user['username']
    
    // Pastikan kolom ini sesuai dengan migration/tabel di database kamu
    protected $allowedFields    = ['username', 'email', 'password'];

    // Menambahkan timestamps otomatis sangat membantu untuk tracking kapan user mendaftar
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    /**
     * Fungsi opsional untuk mendapatkan data user beserta profilnya
     */
    public function getUserWithProfile($id)
    {
        return $this->db->table('users')
                    ->join('user_profiles', 'user_profiles.user_id = users.id')
                    ->where('users.id', $id)
                    ->get()
                    ->getRowArray();
    }
}
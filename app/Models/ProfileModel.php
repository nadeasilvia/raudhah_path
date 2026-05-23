<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'full_name', 'passport_number', 'phone', 'address'];
}
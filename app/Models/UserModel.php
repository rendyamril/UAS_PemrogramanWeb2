<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Sesuaikan nama tabel dengan yang ada di gambar
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'username', 'password', 'created_at'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Sesuaikan dengan kolom di tabel categories Anda
    protected $allowedFields    = ['name', 'slug'];
    
    protected $useTimestamps    = false;
}
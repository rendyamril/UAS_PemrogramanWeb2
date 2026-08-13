<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Gunakan 'cover_image' sesuai struktur asli tabel database Anda
    protected $allowedFields    = [
        'title', 'slug', 'content', 'published_at', 
        'cover_image', 'category_id', 'author', 'views', 'created_at'
    ];
    
    protected $useTimestamps = false;

    // Fungsi baru untuk mengambil data artikel beserta nama kategorinya
    public function getArtikelDenganKategori()
    {
        return $this->select('articles.*, categories.name AS category_name')
                    ->join('categories', 'categories.id = articles.category_id', 'left')
                    ->orderBy('articles.created_at', 'DESC')
                    ->findAll();
    }
}
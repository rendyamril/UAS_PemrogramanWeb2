<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel();
        $keyword = $this->request->getGet('keyword');
        
        // MENGUNCI QUERY JOIN SECARA LANGSUNG KE MODEL
        $articleModel->select('articles.*, categories.name as category_name');
        $articleModel->join('categories', 'categories.id = articles.category_id', 'left');
        
        // Mempertahankan fitur pencarian dengan urutan yang benar
        if (!empty($keyword)) {
            $articleModel->groupStart();
            $articleModel->like('articles.title', $keyword);
            $articleModel->orLike('articles.content', $keyword);
            $articleModel->groupEnd();
        }
        
        $data['artikel'] = $articleModel->orderBy('articles.created_at', 'DESC')->findAll();

        // Ambil 5 artikel terbaru khusus untuk slider di halaman utama (hanya jika tidak sedang mencari)
        if (empty($keyword)) {
            $sliderModel = new ArticleModel();
            $sliderModel->select('articles.*, categories.name as category_name');
            $sliderModel->join('categories', 'categories.id = articles.category_id', 'left');
            $data['slider_artikel'] = $sliderModel->orderBy('articles.created_at', 'DESC')->findAll(5);
        }

        return view('home', $data);
    }

    public function detail($id)
    {
        $articleModel = new ArticleModel();
        
        // Tambah 1 ke kolom views setiap kali artikel dibuka
        $articleModel->where('id', $id)->set('views', 'views + 1', false)->update();

        $articleModel->select('articles.*, categories.name as category_name');
        $articleModel->join('categories', 'categories.id = articles.category_id', 'left');
        $data['artikel'] = $articleModel->find($id);

        if (empty($data['artikel'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan.');
        }

        return view('detail', $data);
    }

    // Method untuk halaman daftar kategori
    public function category()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('category', $data);
    }

    // Method untuk menampilkan artikel berdasarkan kategori tertentu (Mendukung Search)
    public function artikelPerKategori($id)
    {
        $categoryModel = new CategoryModel();
        $articleModel = new ArticleModel();
        $keyword = $this->request->getGet('keyword');

        // Validasi apakah kategori tersebut ada
        $category = $categoryModel->find($id);
        if (empty($category)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan.');
        }

        // Ambil artikel yang sesuai dengan category_id menggunakan JOIN
        $articleModel->select('articles.*, categories.name as category_name');
        $articleModel->join('categories', 'categories.id = articles.category_id', 'left');
        $articleModel->where('articles.category_id', $id);

        // Jika ada input pencarian di dalam halaman kategori
        if (!empty($keyword)) {
            $articleModel->groupStart();
            $articleModel->like('articles.title', $keyword);
            $articleModel->orLike('articles.content', $keyword);
            $articleModel->groupEnd();
        }
        
        $data['artikel'] = $articleModel->orderBy('articles.created_at', 'DESC')->findAll();
        $data['current_category'] = $category['name'];

        return view('home', $data);
    }

    // Method untuk menampilkan seluruh artikel (tanpa slider)
    public function semua()
    {
        $articleModel = new ArticleModel();
        $keyword = $this->request->getGet('keyword');
        
        // MENGUNCI QUERY JOIN SECARA LANGSUNG KE MODEL
        $articleModel->select('articles.*, categories.name as category_name');
        $articleModel->join('categories', 'categories.id = articles.category_id', 'left');
        
        // Mendukung fitur pencarian di halaman semua artikel
        if (!empty($keyword)) {
            $articleModel->groupStart();
            $articleModel->like('articles.title', $keyword);
            $articleModel->orLike('articles.content', $keyword);
            $articleModel->groupEnd();
        }
        
        $data['artikel'] = $articleModel->orderBy('articles.created_at', 'DESC')->findAll();
        $data['current_category'] = 'Semua Artikel';

        return view('home', $data);
    }

    // Method untuk halaman Tentang Kami
    public function tentang()
    {
        $data['current_category'] = 'Tentang Kami';
        return view('tentang', $data);
    }
}
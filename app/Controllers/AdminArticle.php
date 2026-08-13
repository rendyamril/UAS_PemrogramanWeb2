<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class AdminArticle extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel();
        
        // Menggabungkan tabel articles dengan categories untuk mendapatkan nama kategori
        $data['artikel'] = $articleModel->select('articles.*, categories.name as category_name')
                                        ->join('categories', 'categories.id = articles.category_id', 'left')
                                        ->orderBy('articles.created_at', 'DESC')
                                        ->paginate(10, 'artikel');
                                        
        $data['pager']   = $articleModel->pager;

        return view('admin/artikel/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        
        // Mengambil data kategori untuk dropdown form
        $data['kategori'] = $categoryModel->findAll();
        
        return view('admin/artikel/create', $data);
    }

    public function store()
    {
        $articleModel = new ArticleModel();

        // Validasi form sederhana
        $rules = [
            'title'       => 'required',
            'category_id' => 'required',
            'content'     => 'required'
        ];

        if (!$this->validate($rules)) {
            // Jika tidak valid, kembalikan ke form beserta input sebelumnya
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Membuat slug otomatis dari judul
        $slug = url_title($this->request->getPost('title'), '-', true);

        // --- Logika Upload Gambar Baru ---
        $fileGambar = $this->request->getFile('cover_image');
        $namaGambar = ''; // Default kosong

        if ($fileGambar && $fileGambar->isValid() && ! $fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads', $namaGambar);
        }

        // Mengambil waktu saat ini untuk dicatat di database
        $waktuSekarang = date('Y-m-d H:i:s');

        // Menyimpan data ke database (Menggunakan cover_image)
        $articleModel->save([
            'title'        => $this->request->getPost('title'),
            'slug'         => $slug,
            'category_id'  => $this->request->getPost('category_id'),
            'content'      => $this->request->getPost('content'),
            'cover_image'  => $namaGambar, // Disesuaikan dengan kolom database
            'author'       => $this->request->getPost('author') ?? 'Admin', 
            'views'        => 0,
            'published_at' => $this->request->getPost('published_at') ?? $waktuSekarang,
            'created_at'   => $waktuSekarang  
        ]);

        return redirect()->to('admin/artikel')->with('success', 'Sinyal transmisi baru berhasil diluncurkan!');
    }

    public function edit($slug)
    {
        $articleModel = new ArticleModel();
        $categoryModel = new CategoryModel();
        
        // Ambil data artikel berdasarkan slug
        $data['artikel'] = $articleModel->where('slug', $slug)->first();
        
        // Jika artikel tidak ditemukan, kembalikan ke daftar
        if (empty($data['artikel'])) {
            return redirect()->to('admin/artikel')->with('error', 'Data transmisi tidak ditemukan.');
        }

        // Ambil data kategori untuk dropdown
        $data['kategori'] = $categoryModel->findAll();
        
        return view('admin/artikel/edit', $data);
    }

    public function update($slug)
    {
        $articleModel = new ArticleModel();

        // Cari artikel lama berdasarkan slug
        $artikelLama = $articleModel->where('slug', $slug)->first();

        if (!$artikelLama) {
            return redirect()->to('admin/artikel')->with('error', 'Data transmisi tidak ditemukan.');
        }

        // Validasi form sederhana
        $rules = [
            'title'       => 'required',
            'category_id' => 'required',
            'content'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $newSlug = url_title($this->request->getPost('title'), '-', true);

        // --- Logika Update Gambar ---
        $fileGambar = $this->request->getFile('cover_image');
        
        // Menggunakan cover_image sesuai kolom database
        $gambarLama = $artikelLama['cover_image'] ?? ''; 
        $namaGambar = $gambarLama; 

        if ($fileGambar && $fileGambar->isValid() && ! $fileGambar->hasMoved()) {
            // Generate nama baru dan pindahkan
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads', $namaGambar);

            // Hapus file gambar lama jika ada di server
            if (!empty($gambarLama) && file_exists(FCPATH . 'uploads/' . $gambarLama)) {
                unlink(FCPATH . 'uploads/' . $gambarLama);
            }
        }

        // Update data ke database menggunakan ID dari $artikelLama (Menggunakan cover_image)
        $articleModel->update($artikelLama['id'], [
            'title'        => $this->request->getPost('title'),
            'slug'         => $newSlug,
            'category_id'  => $this->request->getPost('category_id'),
            'content'      => $this->request->getPost('content'),
            'author'       => $this->request->getPost('author'),
            'published_at' => $this->request->getPost('published_at'),
            'cover_image'  => $namaGambar // Disesuaikan dengan kolom database
        ]);

        return redirect()->to('admin/artikel')->with('success', 'Data transmisi berhasil diperbarui!');
    }

    public function delete($slug)
    {
        $articleModel = new ArticleModel();
        
        $artikel = $articleModel->where('slug', $slug)->first();

        if ($artikel) {
            // Menggunakan cover_image untuk pengecekan file fisik
            $gambarUntukDihapus = $artikel['cover_image'] ?? '';
            
            // Hapus gambar fisiknya dari server sebelum datanya dihapus
            if (!empty($gambarUntukDihapus) && file_exists(FCPATH . 'uploads/' . $gambarUntukDihapus)) {
                unlink(FCPATH . 'uploads/' . $gambarUntukDihapus);
            }
            
            $articleModel->delete($artikel['id']);
        }
        
        return redirect()->to('admin/artikel')->with('success', 'Transmisi berhasil dihapus dari radar.');
    }
}
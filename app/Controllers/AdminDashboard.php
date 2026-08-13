<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $articleModel = new ArticleModel();
        $categoryModel = new CategoryModel();
        $db = \Config\Database::connect();

        // 1. Mengambil Total Artikel
        $data['total_artikel'] = $articleModel->countAll();

        // 2. Mengambil Total Kategori
        $data['total_kategori'] = $categoryModel->countAll();

        // 3. Mengambil Total Views
        $queryViews = $db->query("SELECT SUM(views) as total_views FROM articles");
        $data['total_views'] = $queryViews->getRow()->total_views ?? 0;

        // 4. Mengambil 5 Artikel Terbaru
        $data['artikel_terbaru'] = $articleModel->orderBy('created_at', 'DESC')->findAll(5);

        return view('admin/dashboard', $data);
    }
}
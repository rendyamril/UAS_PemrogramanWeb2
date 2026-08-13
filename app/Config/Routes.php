<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Rute Halaman Utama & Kategori (Public)
$routes->get('/', 'Home::index');
$routes->get('artikel/semua', 'Home::semua');
$routes->get('tentang', 'Home::tentang');
$routes->get('kategori', 'Home::category');
$routes->get('category', 'Home::category'); // Fallback pengaman jika ada link yang menggunakan bahasa Inggris

// Rute Kategori Berdasarkan ID
$routes->get('kategori/(:num)', 'Home::artikelPerKategori/$1');
$routes->get('category/(:num)', 'Home::artikelPerKategori/$1');

// Dikembalikan menggunakan (:num) agar sesuai dengan pencarian berdasarkan ID
$routes->get('artikel/detail/(:num)', 'Home::detail/$1');

// Rute Autentikasi (Login & Logout)
$routes->get('login', 'Auth::index');
$routes->post('login/process', 'Auth::process');
$routes->get('logout', 'Auth::logout');

// Rute Admin (Dilindungi oleh AuthFilter)
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    
    // Default Admin & Dashboard
    $routes->get('/', 'AdminDashboard::index');
    $routes->get('dashboard', 'AdminDashboard::index');

    // ==========================================
    // MANAJEMEN PUBLIKASI / ARTIKEL
    // ==========================================
    $routes->get('artikel', 'AdminArticle::index');
    $routes->get('artikel/create', 'AdminArticle::create');
    $routes->post('artikel/store', 'AdminArticle::store');
    
    // Menggunakan parameter 'segment' untuk menangkap slug
    $routes->get('artikel/edit/(:segment)', 'AdminArticle::edit/$1');
    $routes->post('artikel/update/(:segment)', 'AdminArticle::update/$1');
    $routes->get('artikel/delete/(:segment)', 'AdminArticle::delete/$1');

    // --- RUTE FALLBACK (Penyelamat) ---
    $routes->post('article/update/(:segment)', 'AdminArticle::update/$1');

    // ==========================================
    // MANAJEMEN KATEGORI
    // ==========================================
    $routes->get('kategori', 'AdminCategory::index');
    $routes->post('kategori/store', 'AdminCategory::store');
    $routes->get('kategori/delete/(:num)', 'AdminCategory::delete/$1');

    // ==========================================
    // MANAJEMEN PROFIL ADMIN
    // ==========================================
    $routes->get('profil', 'AdminProfile::edit');
    $routes->post('profil/update', 'AdminProfile::update');
    
});
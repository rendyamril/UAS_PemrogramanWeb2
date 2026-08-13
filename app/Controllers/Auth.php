<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, langsung arahkan ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        
        return view('auth/login');
    }

    public function process()
    {
        $session = session();
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari data user di database berdasarkan username
        $dataUser = $userModel->where('username', $username)->first();

        if ($dataUser) {
            // Pengecekan langsung untuk password teks biasa di database
            if ($password === $dataUser['password']) {
                
                // Set data sesi jika login berhasil
                $ses_data = [
                    'admin_id'  => $dataUser['id'],
                    'user_name' => $dataUser['name'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                
                return redirect()->to('/admin/dashboard');
            } else {
                // Jika password salah
                $session->setFlashdata('error', 'Akses Ditolak: Kode Akses tidak valid!');
                return redirect()->to('/login');
            }
        } else {
            // Jika username tidak ditemukan
            $session->setFlashdata('error', 'Akses Ditolak: Identitas Komandan tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Hapus semua data sesi
        return redirect()->to('/login');
    }
}
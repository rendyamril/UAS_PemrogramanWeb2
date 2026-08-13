<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class AdminCategory extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        
        $data['kategori'] = $categoryModel->orderBy('id', 'DESC')->findAll();
        
        return view('admin/kategori/index', $data);
    }

    public function store()
    {
        $categoryModel = new CategoryModel();

        $rules = [
            'name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Nama kategori tidak boleh kosong.');
        }

        $categoryModel->save([
            'name' => $this->request->getPost('name'),
            'slug' => url_title($this->request->getPost('name'), '-', true)
        ]);

        return redirect()->to('admin/kategori')->with('success', 'Kategori baru berhasil ditambahkan ke sistem!');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        
        $categoryModel->delete($id);
        
        return redirect()->to('admin/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
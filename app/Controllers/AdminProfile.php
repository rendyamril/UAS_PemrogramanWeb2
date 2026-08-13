<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminProfile extends BaseController
{
    public function edit()
    {
        $userModel = new UserModel();
        $adminId = session()->get('admin_id');

        $data['user'] = $userModel->find($adminId);

        // Langsung memanggil view profil yang menyatu dengan folder admin
        return view('admin/profile_edit', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $adminId = session()->get('admin_id');

        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $updateData = [
            'name'     => $name,
            'username' => $username,
        ];

        if (!empty($password)) {
            $updateData['password'] = $password;
        }

        $userModel->update($adminId, $updateData);
        session()->set('user_name', $name);

        return redirect()->to('/admin/profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
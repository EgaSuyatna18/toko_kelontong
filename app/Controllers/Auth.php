<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{

    public function login()
    {
        return view('auth/login');
    }

    function tryLogin() {
        $adminModel = new \App\Models\AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $adminModel->where('username', $username)->first();

        if($user && password_verify($password, $user['password'])) {
            session()->set($user);
            return redirect()->to('/dashboard');
        }
        session()->setFlashdata('error', 'Username atau Password salah!');
        return redirect()->to('/');
    }

    function logout() {
        session()->destroy();

        return redirect()->to('/');
    }
}

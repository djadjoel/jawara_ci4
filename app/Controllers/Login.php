<?php

namespace App\Controllers;

use App\Models\MLogin;

class Login extends BaseController
{
  public function index()
  {
      $data = [
          'title' => 'Aplikasi Jawara CI 4'
      ];
      echo view('v_login', $data);
  }

  public function auth()
  {
    $MLogin = new MLogin();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $MLogin->where(['username' => $username])->first();
    $passhash = $user['password'];

    if($user['blokir'] == 'Y'){
      session()->setFlashdata('message', 'Akun anda diblokir!');
      return redirect()->to('login');
    }elseif(password_verify($password, $passhash)){
      //jika password ditemukan
      if($user){
        session()->set('username', $username);
        return redirect()->to('home');
      }
    }else{
      session()->setFlashdata('message', 'Gagal login!');
      return redirect()->to('login');
    }

  }

  public function logout()
  {
    session()->remove('username');
    session()->setFlashdata('message', 'Berhasil logout!');
    return redirect()->to('login');
  }
}

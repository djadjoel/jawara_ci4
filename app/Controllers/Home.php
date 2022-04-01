<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        if(!session()->has('username')){
            session()->setFlashdata('message', 'Login terlebih dahulu');
            return redirect()->to('login');
        }


        $data = [
            'title' => 'Aplikasi Jawara CI 4',
            'isi' => 'v_home'
        ];
        return view('layout/v_wrapper', $data);
    }
}

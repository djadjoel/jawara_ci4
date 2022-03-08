<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Aplikasi Jawara CI 4',
            'isi' => 'v_home'
        ];
        return view('layout/v_wrapper', $data);
    }
}

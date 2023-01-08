<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function informasi()
    {
        return view('frontend.informasi.index')->with([
            'title' => 'Informasi'
        ]);
    }
}
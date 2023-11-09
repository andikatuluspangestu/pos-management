<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman admin
    public function index()
    {
        return view('admin.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = Barang::get();
        return view('superadmin.beranda', compact('data'));
    }
}

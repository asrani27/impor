<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('superadmin.laporan.index');
    }

    public function pdf(Request $req)
    {
        $bulan = $req->bulan;
        $tahun = $req->tahun;
        $data = Penjualan::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_penjualan', compact('bulan', 'tahun', 'data'))->setPaper('legal');
        return $pdf->stream();
    }
}

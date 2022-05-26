<?php

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\BarangToko;

function satuan()
{
    return Satuan::get();
}

function barang()
{
    return Barang::orderBy('id', 'DESC')->get();
}

function barangToko($id)
{
    $data = Barang::orderBy('id', 'DESC')->get()->map(function ($item) use ($id) {
        $harga = BarangToko::where('barang_id', $item->id)->where('toko_id', $id)->first();
        $item->harga = $harga == null ? 0 : $harga->harga;
        return $item;
    });
    return $data;
}

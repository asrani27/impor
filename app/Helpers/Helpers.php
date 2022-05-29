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
        $item->harga_modal = $harga == null ? 0 : $harga->harga_modal;
        $item->diskon = $harga == null ? 0 : $harga->diskon;
        $item->harga_jual = $harga == null ? 0 : $harga->harga_jual;
        return $item;
    });
    return $data;
}

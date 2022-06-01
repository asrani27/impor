<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PenjualanController;

Route::get('/', [LoginController::class, 'showlogin']);
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/beranda', [BerandaController::class, 'index']);
    Route::get('/logout', [LogoutController::class, 'logout']);

    Route::get('/satuan', [SatuanController::class, 'satuan']);
    Route::get('/satuan/create', [SatuanController::class, 'satuancreate']);
    Route::post('/satuan/create', [SatuanController::class, 'satuanstore']);
    Route::get('/satuan/edit/{id}', [SatuanController::class, 'satuanedit']);
    Route::post('/satuan/edit/{id}', [SatuanController::class, 'satuanupdate']);
    Route::get('/satuan/delete/{id}', [SatuanController::class, 'satuandelete']);

    Route::get('/barang', [BarangController::class, 'barang']);
    Route::get('/barang/create', [BarangController::class, 'barangcreate']);
    Route::post('/barang/create', [BarangController::class, 'barangstore']);
    Route::get('/barang/edit/{id}', [BarangController::class, 'barangedit']);
    Route::post('/barang/edit/{id}', [BarangController::class, 'barangupdate']);
    Route::get('/barang/delete/{id}', [BarangController::class, 'barangdelete']);

    Route::get('/toko', [TokoController::class, 'toko']);
    Route::get('/toko/barang/editharga/{barang_id}/{toko_id}', [TokoController::class, 'editharga']);
    Route::post('/toko/barang/editharga/{barang_id}/{toko_id}', [TokoController::class, 'updateharga']);
    Route::get('/toko/barang/{id}', [TokoController::class, 'tokobarang']);
    Route::get('/toko/create', [TokoController::class, 'tokocreate']);
    Route::post('/toko/create', [TokoController::class, 'tokostore']);
    Route::get('/toko/edit/{id}', [TokoController::class, 'tokoedit']);
    Route::post('/toko/edit/{id}', [TokoController::class, 'tokoupdate']);
    Route::get('/toko/delete/{id}', [TokoController::class, 'tokodelete']);


    Route::get('/penjualan', [PenjualanController::class, 'penjualan']);
    Route::get('/penjualan/toko/{id}', [PenjualanController::class, 'penjualantoko']);
    Route::get('/penjualan/toko/{id}/create', [PenjualanController::class, 'transaksi']);
    Route::post('/penjualan/toko/{id}/create', [PenjualanController::class, 'transaksisimpan']);
    Route::get('/penjualan/toko/{id}/batal', [PenjualanController::class, 'transaksibatal']);
    Route::get('/penjualan/toko/{id}/delete/{penjualan_id}', [PenjualanController::class, 'transaksidelete']);
    Route::get('/penjualan/toko/{id}/print/{penjualan_id}', [PenjualanController::class, 'transaksiprint']);

    Route::get('/keranjang/delete/{id}', [KeranjangController::class, 'delete']);
});

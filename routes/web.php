<?php

use App\Http\Controllers\Akun\ProfilSayaController;
use App\Http\Controllers\Akun\UsersController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Laporan\RekapController;
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Transaksi\BarangKeluarController;
use App\Http\Controllers\Transaksi\BarangMasukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => ["guest"]], function() {
    Route::get("/", [LoginController::class, "login"]);
    Route::post("/", [LoginController::class, "post_login"]);
});

Route::group(["middleware" => ["autentikasi"]], function() {
    Route::get("/dashboard", [AppController::class, "dashboard"]);

    Route::prefix("master")->group(function() {
        Route::resource("barang", BarangController::class);
    });

    Route::prefix("transaksi")->group(function() {
        Route::prefix("barang")->group(function() {
            Route::resource("masuk", BarangMasukController::class);
            Route::resource("keluar", BarangKeluarController::class);
        });
    });

    Route::prefix("laporan")->group(function() {
        Route::resource("rekap", RekapController::class);
    });

    Route::prefix("akun")->group(function() {
        Route::resource("users", UsersController::class);
        Route::resource("profil_saya", ProfilSayaController::class);
    });
    Route::get("/logout", [LoginController::class, "logout"]);
    Route::put("/ganti_password", [LoginController::class, "ganti_password"]);
});


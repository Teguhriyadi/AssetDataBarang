<?php

use App\Http\Controllers\Akun\ProfilSayaController;
use App\Http\Controllers\Akun\UsersController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
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

Route::get("/", [LoginController::class, "login"]);
Route::post("/", [LoginController::class, "post_login"]);

Route::get("/dashboard", [AppController::class, "dashboard"]);

Route::get("/template", function() {
    return view("layouts/v_main");
});

Route::prefix("akun")->group(function() {
    Route::resource("users", UsersController::class);
    Route::resource("profil_saya", ProfilSayaController::class);
});

<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilSayaController extends Controller
{
    public function index()
    {
        return view("akun.profil_saya.v_index");
    }
}

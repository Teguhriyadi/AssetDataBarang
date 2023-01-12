<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view("autentikasi.v_login");
    }

    public function post_login(Request $request)
    {
        echo "ada";
    }
}

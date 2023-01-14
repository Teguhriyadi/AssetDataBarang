<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("autentikasi.v_login");
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password]))
        {
            $request->session()->regenerate();

            return redirect("/dashboard");
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}

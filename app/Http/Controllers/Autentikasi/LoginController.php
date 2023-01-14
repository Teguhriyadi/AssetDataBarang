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

    public function ganti_password(Request $request)
    {
        if ($request->password_baru != $request->konfirmasi_password) {
            return redirect()->back()->with([
                "message" => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oopss!</strong> Konfirmasi Password Tidak Sesuai.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            ]);
        } else {
            User::where("id_users", Auth::user()->id_users)->update([
                "password" => bcrypt($request->password_baru)
            ]);

            return back()->with([
                "message" => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Password Anda Telah di Ganti.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            ]);
        }
    }
}

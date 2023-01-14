<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilSayaController extends Controller
{
    public function index()
    {
        return view("akun.profil_saya.v_index");
    }

    public function update(Request $request, $id)
    {
        User::where("id_users", $id)->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "nomor_hp" => $request->nomor_hp,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat
        ]);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data["users"] = User::orderBy("created_at", "DESC")->get();

        return view("akun.users.v_index", $data);
    }

    public function create()
    {
        return view("akun.users.v_create");
    }

    public function store(Request $request)
    {
        User::create([
            "id_users" => "US-" .  date("YmdHis"),
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt("password"),
            "nomor_hp" => $request->nomor_hp,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat
        ]);

        return redirect("/akun/users");
    }

    public function edit($id)
    {
        $data["edit"] = User::where("id_users", $id)->first();

        return view("akun.users.v_edit", $data);
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

        return redirect("/akun/users");
    }

    public function destroy($id)
    {
        User::where("id_users", $id)->delete();

        return back();
    }
}

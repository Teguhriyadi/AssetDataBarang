<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\BarangTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data["barang_masuk"] = BarangTransaksi::where("status", "1")->orderBy("kode_transaksi", "DESC")->get();

        return view("transaksi.barang.masuk.v_index", $data);
    }

    public function store(Request $request)
    {
        BarangTransaksi::create([
            "kode_transaksi" => "TRN-" . date("YmdHis"),
            "kode_barang" => $request->kode_barang,
            "tanggal" => $request->tanggal,
            "qty" => $request->qty,
            "asal_barang" => $request->asal_barang,
            "id_users" => Auth::user()->id_users,
            "status" => "1"
        ]);

        return redirect("/transaksi/barang/masuk")->with([
            "message" => '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Barang Masuk Telah Tercatat.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        ]);
    }
}

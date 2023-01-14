<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data["barang"] = Barang::orderBy("kode_barang", "DESC")->get();

        return view("master.barang.v_index", $data);
    }

    public function store(Request $request)
    {
        Barang::create([
            "kode_barang" => "BRG-" . date("YmdHis"),
            "nama" => $request->nama,
            "satuan" => $request->satuan,
            "berat" => $request->berat,
            "harga" => $request->harga
        ]);

        return back()->with(["message" => '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Berhasil di Tambahkan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>']);
    }

    public function update(Request $request, $kode_barang)
    {
        Barang::where("kode_barang", $kode_barang)->update([
            "nama" => $request->nama,
            "satuan" => $request->satuan,
            "berat" => $request->berat,
            "harga" => $request->harga
        ]);

        return back()->with(["message" => '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Berhasil di Simpan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>']);
    }

    public function destroy($kode_barang)
    {
        Barang::where("kode_barang", $kode_barang)->delete();

        return back()->with(["message" => '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Berhasil di Hapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>']);
    }
}

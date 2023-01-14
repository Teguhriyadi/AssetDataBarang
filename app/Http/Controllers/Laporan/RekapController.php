<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\BarangTransaksi;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        return view("laporan.v_rekap");
    }

    public function store(Request $request)
    {
        if (strtotime($request->tanggal_mulai) > strtotime($request->tanggal_akhir)) {
            return back()->with([
                "message" => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oopss!</strong> Tanggal Mulai Harus Lebih Kecil Daripada Tanggal Akhir.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            ]);
        } else {
            $data["barang"] = BarangTransaksi::whereBetween("tanggal", [$request->tanggal_mulai, $request->tanggal_akhir])->get();
            $data["tanggal_mulai"] = $request->tanggal_mulai;
            $data["tanggal_akhir"] = $request->tanggal_akhir;

            return view("laporan.v_rekap", $data);
        }
    }
}

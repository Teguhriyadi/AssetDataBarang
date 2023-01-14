@extends("layouts.v_main")

@section("title", "Barang Masuk")

@section("css")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

@endsection

@section("content")

@php
    use Carbon\Carbon;
    use App\Models\Transaksi\BarangTransaksi;
@endphp

<h3>Data Barang Masuk</h3>

@if (session('message'))
{!! session('message') !!}
@endif

<div class="card">
    <div class="card-header">
        <div class="pull-right">

        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered" style="width: 100%;" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode Barang</th>
                    <th>Nama</th>
                    <th class="text-center">Tanggal</th>
                    <th>User</th>
                    <th class="text-center">QTY</th>
                    <th>Asal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomer = 0;
                @endphp
                @foreach ($barang_masuk as $data)
                <tr>
                    <td class="text-center">{{ ++$nomer }}.</td>
                    <td class="text-center">{{ $data["kode_barang"] }}</td>
                    <td>{{ $data["getBarang"]["nama"] }}</td>
                    <td class="text-center">
                        {{ Carbon::createFromFormat('Y-m-d', $data["tanggal"])->isoFormat('LLLL') }}
                    </td>
                    <td>{{ $data["getUser"]["nama"] }}</td>
                    <td class="text-center">{{ $data["qty"] }}</td>
                    <td>{{ $data["asal_barang"] }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#buttonEdit-{{ $data["kode_transaksi"] }}">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Transaksi Masuk -->
@foreach ($barang_masuk as $brg)

@php
$barang_masuk = BarangTransaksi::where("kode_barang", $brg->kode_barang)->where("status", "1")->sum("qty");

$barang_keluar = BarangTransaksi::where("kode_barang", $brg["kode_barang"])->where("status", "0")->sum("qty");

$stok = $barang_masuk - $barang_keluar;
@endphp

<div class="modal fade" id="buttonEdit-{{ $brg["kode_transaksi"] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> Edit Barang Masuk
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/transaksi/barang/masuk/'.$brg["kode_transaksi"]) }}" method="POST">
                @method("PUT")
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_barang"> Kode Barang </label>
                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="{{ $brg["kode_barang"] }}" readonly>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal"> Tanggal </label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required value="{{ $brg["tanggal"] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty"> QTY </label>
                                <input type="number" class="form-control" name="qty" id="qty" placeholder="0" min="{{ $stok }}" required value="{{ $brg["qty"] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <label for="asal_barang"> Asal Barang </label>
                        <input type="text" class="form-control" name="asal_barang" id="asal_barang" placeholder="Masukkan Asal Barang" required value="{{ $brg["asal_barang"] }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach
<!-- END -->

@endsection

@section("js")

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>

@endsection

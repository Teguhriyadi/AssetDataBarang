@extends("layouts.v_main")

@section("css")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

@endsection

@section("content")

<h3>Data Barang</h3>

@if (session('message'))
{!! session('message') !!}
@endif

<div class="card">
    <div class="card-header">
        <div class="pull-right">
            <button type="button" class="btn btn-primary btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i> Tambah
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered" style="width: 100%;" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode Barang</th>
                    <th>Nama</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Berat</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomer = 0;
                @endphp
                @foreach ($barang as $data)
                <tr>
                    <td class="text-center">{{ ++$nomer }}.</td>
                    <td class="text-center">{{ $data["kode_barang"] }}</td>
                    <td>{{ $data["nama"] }}</td>
                    <td class="text-center">{{ $data["satuan"] }}</td>
                    <td class="text-center">{{ $data["berat"] }}</td>
                    <td class="text-center">Rp. {{ number_format($data["harga"]) }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#buttonEdit-{{ $data["kode_barang"] }}">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <form action="{{ url('/master/barang/'.$data["kode_barang"]) }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini? ')" type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fa fa-plus"></i> Tambah Data
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/master/barang') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan"> Satuan </label>
                                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan Satuan Barang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berat"> Berat </label>
                                <input type="text" class="form-control" name="berat" id="berat" placeholder="Masukkan Berat Barang">
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <label for="harga"> Harga </label>
                        <input type="number" class="form-control" name="harga" id="harga" min="1" placeholder="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
@foreach ($barang as $brg)
<div class="modal fade" id="buttonEdit-{{ $brg["kode_barang"] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> Edit Data
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/master/barang/'.$brg["kode_barang"]) }}" method="POST">
                @method("PUT")
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $brg["nama"] }}">
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan"> Satuan </label>
                                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan Satuan Barang" value="{{ $brg["satuan"] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berat"> Berat </label>
                                <input type="text" class="form-control" name="berat" id="berat" placeholder="Masukkan Berat Barang" value="{{ $brg["berat"] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <label for="harga"> Harga </label>
                        <input type="number" class="form-control" name="harga" id="harga" min="1" placeholder="0" value="{{ $brg["harga"] }}">
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

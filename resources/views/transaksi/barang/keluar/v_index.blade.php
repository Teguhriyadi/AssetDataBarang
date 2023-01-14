@extends("layouts.v_main")

@section("css")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

@endsection

@section("content")

@php
    use Carbon\Carbon;
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
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomer = 0;
                @endphp
                @foreach ($barang_keluar as $data)
                <tr>
                    <td class="text-center">{{ ++$nomer }}.</td>
                    <td class="text-center">{{ $data["kode_barang"] }}</td>
                    <td>{{ $data["getBarang"]["nama"] }}</td>
                    <td class="text-center">
                        {{ Carbon::createFromFormat('Y-m-d', $data["tanggal"])->isoFormat('LLLL') }}
                    </td>
                    <td class="text-center">{{ $data["getUser"]["nama"] }}</td>
                    <td class="text-center">{{ $data["qty"] }}</td>
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

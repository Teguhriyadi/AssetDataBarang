@extends("layouts.v_main")

@section("title", "Barang Keluar")

@section("content")

@php
    use Carbon\Carbon;
@endphp

<h3>Rekap Laporan</h3>

@if (session('message'))
{!! session('message') !!}
@endif

<hr>

<form action="{{ url('/laporan/rekap') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="tanggal_mulai" class="pb-2"> Tanggal Mulai </label>
                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" required value="{{ empty($tanggal_mulai) ? '' : $tanggal_mulai }}">
            </div>
        </div>
        <div class="col-md-5">
            <label for="tanggal_akhir" class="pb-2"> Tanggal Akhir </label>
            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required value="{{ empty($tanggal_akhir) ? '' : $tanggal_akhir }}">
        </div>
        <div class="col-md-2" style="padding-top: 30px;">
            <button type="submit" class="btn btn-primary btn-sm" style="width: 100%;padding-top: 7px; padding-bottom: 7px;">
                <i class="fa fa-search"></i> Filter
            </button>
        </div>
    </div>
</form>

<hr>

<div class="card">
    <div class="card-header">
        Rekap Laporan Keseluruhan
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered" style="width: 100%;" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode Barang</th>
                    <th>Nama</th>
                    <th class="text-center">QTY</th>
                    <th>Asal</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomer = 0;
                @endphp
                @if (empty($barang))
                <tr>
                    <td class="text-center" colspan="6">
                        <strong>
                            <i>
                                Data Tidak Ada
                            </i>
                        </strong>
                    </td>
                </tr>
                @else
                @forelse ($barang as $data)
                <tr>
                    <td class="text-center">{{ ++$nomer }}.</td>
                    <td class="text-center">{{ $data["kode_barang"] }}</td>
                    <td>{{ $data["getBarang"]["nama"] }}</td>
                    <td class="text-center">{{ $data["qty"] }}</td>
                    <td>{{ $data["asal_barang"] }}</td>
                    <td class="text-center">
                        @if ($data["status"] == 1)
                            Masuk
                        @elseif($data["status"] == 0)
                            Keluar
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="6">
                        <strong>
                            <i>
                                Maaf, Data Tidak Ditemukan
                            </i>
                        </strong>
                    </td>
                </tr>
                @endforelse
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

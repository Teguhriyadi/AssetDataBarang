@extends("layouts.v_main")

@section("title", "Users")

@section("css")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

@endsection

@section("content")

<h3>Data Users</h3>

<div class="card">
    <div class="card-header">
        <div class="pull-right">
            <a href="{{ url('/akun/users/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered" style="width: 100%;" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Nomor HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomer = 0;
                @endphp
                @foreach ($users as $data)
                <tr>
                    <td class="text-center">{{ ++$nomer }}.</td>
                    <td>{{ $data["nama"] }}</td>
                    <td>{{ $data["email"] }}</td>
                    <td class="text-center">
                        @if ($data["jenis_kelamin"] == "L")
                        Laki - Laki
                        @elseif($data["jenis_kelamin"] == "P")
                        Perempuan
                        @endif
                    </td>
                    <td class="text-center">{{ $data["nomor_hp"] }}</td>
                    <td class="text-center">
                        <a href="{{ url('/akun/users/'.$data["id_users"]. '/edit') }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ url('/akun/users/'.$data["id_users"]) }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ? ')" type="submit" class="btn btn-danger btn-sm">
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

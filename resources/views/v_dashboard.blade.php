@extends("layouts.v_main")

@section("title", "Dashboard")

@section("content")

<h3>Dashboard</h3>

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Berhasil Login!</h4>
    <p>
        Selamat Datang <strong>{{ Auth::user()->nama }}</strong> di Aplikasi {{ env("APP_NAME") }}.
    </p>
    <hr>
    <p class="mb-0">
        Silahkan Pilih Menu Untuk Memulai Program.
    </p>
</div>

<div class="row">
    <div class="col-md-3">
        <a href="{{ url('/akun/users') }}" style="text-decoration: none;">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3>
                        5
                        <div class="pull-right">
                            <i class="fa fa-users"></i>
                        </div>
                    </h3>
                    <hr>
                    Users
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ url('/akun/users') }}" style="text-decoration: none;">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3>
                        5
                        <div class="pull-right">
                            <i class="fa fa-users"></i>
                        </div>
                    </h3>
                    <hr>
                    Users
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ url('/akun/users') }}" style="text-decoration: none;">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h3>
                        5
                        <div class="pull-right">
                            <i class="fa fa-users"></i>
                        </div>
                    </h3>
                    <hr>
                    Users
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ url('/akun/users') }}" style="text-decoration: none;">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h3>
                        5
                        <div class="pull-right">
                            <i class="fa fa-users"></i>
                        </div>
                    </h3>
                    <hr>
                    Users
                </div>
            </div>
        </a>
    </div>
</div>

@endsection

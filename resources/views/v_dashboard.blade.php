@extends("layouts.v_main")

@section("content")

<h3>Dashboard</h3>

<div class="alert alert-success" role="alert">
    Selamat Datang <strong>{{ Auth::user()->nama }}</strong> di Aplikasi {{ env("APP_NAME") }}. Silahkan Pilih Menu Untuk Memulai Program.
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

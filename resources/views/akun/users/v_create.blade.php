@extends("layouts.v_main")

@section("title", "Tambah Users")

@section("content")

<h3>Tambah Users</h3>

<div class="card">
    <div class="card-header">
        <div class="pull-right">
            <a href="{{ url('/akun/users') }}" class="btn btn-info btn-sm">
                <i class="fa fa-sign-out"></i> Kembali Ke Halaman Sebelumnya
            </a>
        </div>
    </div>
    <form action="{{ url('/akun/users') }}" method="POST">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_hp"> Nomor HP </label>
                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Masukkan Nomor HP" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin"> Jenis Kelamin </label>
                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                            <option value="">- Pilih -</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group pt-2">
                <label for="alamat"> Alamat </label>
                <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat" required></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah
            </button>
        </div>
    </form>
</div>

@endsection

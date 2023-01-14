@extends("layouts.v_main")

@section("title", "Profil Saya")

@section("content")

<h3>Profil {{ Auth::user()->nama }} </h3>

@if (session('message'))
{!! session('message') !!}
@endif

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-info btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-key"></i> Ganti Password
        </button>
    </div>
    <form action="{{ url('/akun/profil_saya/' . Auth::user()->id_users) }}" method="POST">
        @method("PUT")
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required value="{{ Auth::user()->nama }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required value="{{ Auth::user()->email }}">
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_hp"> Nomor HP </label>
                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Masukkan Nomor HP" required value="{{ Auth::user()->nomor_hp }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin"> Jenis Kelamin </label>
                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                            <option value="">- Pilih -</option>
                            <option value="L" {{ Auth::user()->jenis_kelamin == "L" ? 'selected' : '' }} >Laki - Laki</option>
                            <option value="P" {{ Auth::user()->jenis_kelamin == "P" ? 'selected' : '' }} >Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group pt-2">
                <label for="alamat"> Alamat </label>
                <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat" required>{{ Auth::user()->alamat }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

<!-- Ganti Password -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> Ganti Password
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/ganti_password') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password_lama"> Password Lama </label>
                        <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama">
                    </div>
                    <div class="form-group pt-2">
                        <label for="password_baru"> Password Baru </label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="form-group pt-2">
                        <label for="konfirmasi_password"> Konfirmasi Password </label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukkan Konfirmasi Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

@endsection

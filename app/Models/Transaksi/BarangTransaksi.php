<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangTransaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi_barang";

    protected $guarded = [''];

    public $primaryKey = "kode_transaksi";

    protected $keyType = "string";

    public function getBarang()
    {
        return $this->belongsTo("App\Models\Master\Barang", "kode_barang", "kode_barang");
    }

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id_users", "id_users");
    }
}

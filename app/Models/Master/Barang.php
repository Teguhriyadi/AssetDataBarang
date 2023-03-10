<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";

    protected $guarded = [''];

    public $primaryKey = "kode_barang";

    protected $keyType = "string";
}

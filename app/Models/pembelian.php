<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang; 


class Pembelian extends Model
{
    protected $table = 'pembelian';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_barang', 
        'Nama_barang', 
        'Id_jenis', 
        'jumlah', 
        'harga', 
        'total'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'Kode_barang');
    }
}
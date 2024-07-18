<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang; 

class Pemakaian extends Model
{
    protected $table = 'pemakaian';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'kode_barang', 
        'Nama_barang', 
        'jumlah_pakai', 
        'tanggal_pakai', 
        'Id_ruang', 
        'keterangan'
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'Id_ruang', 'Id_ruang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $primaryKey = 'kode_barang';
    
    public $timestamps = false; 

    public $incrementing = false; 
    
    protected $fillable = [
        'kode_barang', 
        'Nama_barang', 
        'Id_jenis', 
        'jumlah', 
        'harga',
        'tanggal_beli'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function pemakaian()
    {
        return $this->hasMany(Pemakaian::class, 'Kode_barang', 'Kode_barang');
    }
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'Id_jenis', 'Id_jenis');
    }
}
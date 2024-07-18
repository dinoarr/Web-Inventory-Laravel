<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ruang; 
use App\Models\jenisBarang;


class InventarisBarang extends Model
{
    protected $table = 'inventaris_barang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_barang', 
        'Nama_barang', 
        'Id_jenis', 
        'tanggal_beli', 
        'tanggal_pemakaian', 
        'Id_ruang', 
        'pemakaian', 
        'keterangan',
    ];

    protected $dates = [
        'tanggal_pembelian',
        'tanggal_pemakaian',
    ];

    public $timestamps = false;

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'Id_jenis', 'Id_jenis');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'Id_ruang', 'Id_ruang');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{

    protected $table = 'jenis_barang';

    protected $primaryKey = 'Id_jenis';

    protected $keyType = 'integer';

    protected $fillable = [
        'Nama_jenis_barang',
    ];

    public $timestamps = false;
    
    public function barang()
    {
        return $this->hasMany(Barang::class, 'Id_jenis', 'Id_jenis');
    }
}
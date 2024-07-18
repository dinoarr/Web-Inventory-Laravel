<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pemakaian; 


class Ruang extends Model
{
    protected $table = 'ruang';

    protected $primaryKey = 'Id_ruang';

    protected $keyType = 'integer';


    protected $fillable = [
        'Nama_ruang',
    ];

    public $timestamps = false;

    public function pemakaian()
    {
        return $this->hasMany(Pemakaian::class, 'Id_ruang', 'Id_ruang');
    }
}
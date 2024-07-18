<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvenController extends Controller
{
    public function index(){
        $data = DB::table('pemakaian')
        ->join('barang', 'pemakaian.kode_barang', '=', 'barang.kode_barang')
        ->join('jenis_barang', 'barang.Id_jenis', '=', 'jenis_barang.Id_jenis')
        ->join('ruang', 'pemakaian.Id_ruang', '=', 'ruang.Id_ruang')
        ->select(
            'barang.kode_barang', 
            'barang.Nama_barang', 
            'barang.jumlah', 
            'barang.tanggal_beli as tanggal_pembelian', 
            'jenis_barang.Nama_jenis_barang as Id_jenis', 
            'ruang.nama_ruang as Id_ruang', 
            'pemakaian.keterangan', 
            'pemakaian.jumlah_pakai', 
            'pemakaian.tanggal_pakai as tanggal_pemakaian' 
        )
        ->get();
        return view('inventaris.index')->with('data', $data);

    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('jenisBarang')->orderBy('kode_barang', 'asc')->paginate(10);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $barangTerakhir = Barang::orderByDesc('kode_barang')->first();
        $kodeTerakhir = $barangTerakhir ? $barangTerakhir->kode_barang : 'BRG0';
        $kodeNext = 'BRG' . (intval(substr($kodeTerakhir, 3)) + 1);

        $jenisBarang = JenisBarang::all();
        return view('barang.create', compact('kodeNext', 'jenisBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'Nama_barang' => 'required',
            'Id_jenis' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal_beli' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        $jenisBarang = $barang->jenisBarang; 
        return view('barang.show', compact('barang', 'jenisBarang'));
    
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $jenisBarang = JenisBarang::all();
        return view('barang.edit', compact('barang', 'jenisBarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_barang' => 'required',
            'Id_jenis' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal_beli' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
    public function cetak()
    {
        $barang = Barang::orderBy('kode_barang', 'DESC')->get();
        $pdf = Pdf::loadView('barang.cetak', ['barang' => $barang])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_barang.pdf');
    }
}
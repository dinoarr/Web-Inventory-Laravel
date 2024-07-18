<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemakaian;
use App\Models\Barang;
use App\Models\Ruang;
use Barryvdh\DomPDF\Facade\Pdf;

class PemakaianController extends Controller
{
    public function index()
    {
        $pemakaian = Pemakaian::with('barang')->get();
        return view('pemakaian.index', compact('pemakaian'));
    }

    public function create()
    {
        $barang = Barang::whereNotIn('kode_barang', Pemakaian::pluck('kode_barang')->toArray())->get();
        $ruang = Ruang::all();
        return view('pemakaian.create', compact('barang', 'ruang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barang,kode_barang',
            'Nama_barang' => 'required|exists:barang,Nama_barang',
            'jumlah_pakai' => 'required|integer|min:1', 
            'tanggal_pakai' => 'required|date', 
            'Id_ruang' => 'required|exists:ruang,Id_ruang',
            'keterangan' => 'required',
        ]);

        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        if ($barang->jumlah < $request->jumlah_pakai) {
            return redirect()->back()->withErrors(['jumlah_pakai' => 'Jumlah pemakaian melebihi jumlah barang yang tersedia.']);
        }

        $barang->jumlah -= $request->jumlah_pakai;
        $barang->save();

        Pemakaian::create($request->all());

        return redirect()->route('pemakaian.index')->with('success', 'Pemakaian Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        
        $pemakaian = Pemakaian::with('barang')->findOrFail($id);
        return view('pemakaian.show', compact('pemakaian'));
    }

    public function edit($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        $barang = Barang::all();
        $ruang = Ruang::all();
        return view('pemakaian.edit', compact('pemakaian', 'barang', 'ruang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'Nama_barang' => 'required',
            'jumlah_pakai' => 'required|integer|min:1', 
            'tanggal_pakai' => 'required|date', 
            'Id_ruang' => 'required', 
            'keterangan' => 'required',
        ]);

        $pemakaian = Pemakaian::findOrFail($id);
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        $barang->jumlah += $pemakaian->jumlah_pakai;

        if ($barang->jumlah < $request->jumlah_pakai) {
            return redirect()->back()->withErrors(['jumlah_pakai' => 'Jumlah pemakaian melebihi jumlah barang yang tersedia.']);
        }

        // Kurangi jumlah baru dari stok barang
        $barang->jumlah -= $request->jumlah_pakai;
        $barang->save();

        $pemakaian->update($request->all());

        return redirect()->route('pemakaian.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        $barang = Barang::where('kode_barang', $pemakaian->kode_barang)->first();

        $barang->jumlah += $pemakaian->jumlah_pakai;
        $barang->save();

        $pemakaian->delete();

        return redirect()->route('pemakaian.index')->with('success', 'Data Pemakaian Berhasil Dihapus');
    }
    public function cetak()
    {
        $pemakaian = Pemakaian::orderBy('kode_barang', 'DESC')->get();
        $pdf = Pdf::loadView('pemakaian.cetak', ['barang' => $pemakaian])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_barang.pdf');
    }
}
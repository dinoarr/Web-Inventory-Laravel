<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisController extends Controller
{
    public function index(){
        $jenisBarang = JenisBarang::all();
        return view('jenisBarang.index', compact('jenisBarang'));
    }

    public function create(){
        return view('jenisBarang.create');
    }

    public function store(Request $request){
        $request->validate([
            'Nama_jenis_barang' => 'required',
        ]);

        JenisBarang::create($request->all());
        return redirect()->route('jenisBarang.index')->with('success', 'Jenis Barang Berhasil Ditambah');
    }

    public function show($id){
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('jenisBarang.show', compact('jenisBarang'));
    }

    public function edit($id){
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('jenisBarang.edit', compact('jenisBarang'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'Nama_jenis_barang' => 'required',
        ]);

        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->update($request->all());

        return redirect()->route('jenisBarang.index')->with('success', 'Jenis Barang berhasil diupdate.');
    }

    public function destroy($id){
        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->delete();

        return redirect()->route('jenisBarang.index')->with('success', 'Jenis Barang Berhasil Dihapus');
    }
}
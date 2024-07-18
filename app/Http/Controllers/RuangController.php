<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(){
        $ruang = Ruang::all();
        return view('ruang.index',compact('ruang'));
    }
    public function create(){
        return view('ruang.create');
    }
    public function store(Request $request){
        $request->validate([
            'Nama_ruang'=>'required',
        ]);

        Ruang::create($request->all());
        return redirect()->route('ruang.index')
        ->with('success','Ruang berhasil ditambah');
    }
    public function show($id){
        $ruang = Ruang::findOrFail($id);

        return view('ruang.show', compact('ruang'));
    }
    public function edit($id){
        $ruang = Ruang::findOrFail($id);
        return view('ruang.edit', compact('ruang'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'Nama_ruang'=>'required',
        ]);

        $ruang = Ruang::findOrFail($id);
        $ruang->update($request->all());

        return redirect()->route('ruang.index')
        ->with('success','Ruang berhasil diupdate');
    }
    public function destroy($id){
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();

        return redirect()->route('ruang.index')
        ->with('success','Ruang Berhasil dihapus');
    }
}
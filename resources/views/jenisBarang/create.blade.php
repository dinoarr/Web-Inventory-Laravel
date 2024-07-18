@extends('layouts.form')
@section('content')
    <h1>Tambah Jenis Barang</h1>
    <form action="{{ route('jenisBarang.store') }}" method="POST">
        @csrf
        <div class="form-floating">
            <input type="text" name="Nama_jenis_barang" class="form-control mb-3" placeholder="" required>
            <label>Nama Jenis Barang</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route ('jenisBarang.index')}} " class="btn btn-danger">Back</a>
    </form>
@endsection

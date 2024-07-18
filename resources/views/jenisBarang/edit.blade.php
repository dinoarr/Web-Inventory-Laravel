@extends('layouts.form')
@section('content')
    <h1>Edit Jenis Barang</h1>
    <form action="{{ route('jenisBarang.update', $jenisBarang->Id_jenis) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" name="Nama_jenis_barang" class="form-control" value="{{ $jenisBarang->Nama_jenis_barang }}" required>
            <label>Nama Jenis Barang</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route ('jenisBarang.index')}}" class="btn btn-danger ">Back</a>
    </form>
@endsection

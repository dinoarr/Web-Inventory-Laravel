@extends('layouts.form')
@section('content')
    <h1>Tambah ruang</h1>
    <form action="{{ route('ruang.store') }}" method="POST">
        @csrf
        <div class="form-floating">
            <input type="text" name="Nama_ruang" class="form-control mb-3" placeholder="" required>
            <label>Nama Ruang</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route ('ruang.index')}} " class="btn btn-danger">Back</a>
    </form>
@endsection


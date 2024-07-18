@extends('layouts.form')
@section('content')
    <h1>Edit Ruang</h1>
    <form action="{{ route('ruang.update',  $ruang->Id_ruang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" name="Nama_ruang" class="form-control" value="{{ $ruang->Nama_ruang}}" required>
            <label>Nama ruang</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route ('ruang.index')}}" class="btn btn-danger ">Back</a>
    </form>
@endsection
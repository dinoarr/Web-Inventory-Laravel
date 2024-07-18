@extends('layouts.form')
@section('content')
    <div class="container">
        <h1>Detail Ruang</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" value="{{  $ruang->Id_ruang }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Jenis Barang</label>
                    <input type="text" class="form-control" id="ruang" value="{{ $ruang->Nama_ruang  }}" readonly>
                </div>
            </div>
        </div>
        <a href="{{ route('ruang.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
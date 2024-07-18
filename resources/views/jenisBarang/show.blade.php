@extends('layouts.form')
@section('content')
    <div class="container">
        <h1>Detail Jenis Barang</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" value="{{ $jenisBarang->Id_jenis }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Jenis Barang</label>
                    <input type="text" class="form-control" id="nama" value="{{ $jenisBarang->Nama_jenis_barang }}" readonly>
                </div>
            </div>
        </div>
        <a href="{{ route('jenisBarang.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection

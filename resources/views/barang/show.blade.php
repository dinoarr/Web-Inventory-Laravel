@extends('layouts.form')
@section('content')
    <div class="container">
        <h1>Detail Barang</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $barang->kode_barang }}" readonly>
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="Nama_barang" name="Nama_barang" value="{{ $barang->Nama_barang }}" readonly>
                    <label for="Nama_barang" class="form-label">Nama Barang</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="Id_jenis" name="Id_jenis" value="{{ $jenisBarang->Nama_jenis_barang }}" readonly>
                    <label for="Id_jenis" class="form-label">Jenis Barang</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $barang->jumlah }}" readonly>
                    <label for="jumlah" class="form-label">Jumlah</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" readonly>
                    <label for="harga" class="form-label">Harga</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="{{ $barang->tanggal_beli }}" readonly>
                    <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                </div>
            </div>
        </div>
        <a href="{{ route('barang.index') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection

@extends('layouts.form')
@section('content')
    <div class="container">
        <h1>Edit Barang</h1>
        <form action="{{ route('barang.update', $barang->kode_barang) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $barang->kode_barang }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="Nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="Nama_barang" name="Nama_barang" value="{{ $barang->Nama_barang }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="Id_jenis">Jenis Barang</label>
                        <select class="form-select" id="Id_jenis" name="Id_jenis" required>
                            @foreach ($jenisBarang as $jenis)
                                <option value="{{ $jenis->Id_jenis }}" {{ $barang->Id_jenis == $jenis->Id_jenis ? 'selected' : '' }}>{{ $jenis->Nama_jenis_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $barang->jumlah }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="tanggal_beli">Tanggal Beli</label>
                        <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="{{ $barang->tanggal_beli }}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

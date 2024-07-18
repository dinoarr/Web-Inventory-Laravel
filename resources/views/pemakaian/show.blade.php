@extends('layouts.form')
@section('content')
    <div class="container">
        <h1>Edit Barang</h1>
        <form action="{{ route('pemakaian.update', $pemakaian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="kode_barang" value="{{ $pemakaian->kode_barang }}" readonly>
                        <label for="kode_barang">Kode Barang</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Nama_barang" value="{{ $pemakaian->Nama_barang }}" readonly>
                        <label for="Nama_barang">Nama Barang</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="jumlah_pakai" value="{{ $pemakaian->jumlah_pakai }}" required>
                        <label for="jumlah_pakai">Jumlah Pemakaian</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="tanggal_pakai" value="{{ $pemakaian->tanggal_pakai }}" required>
                        <label for="tanggal_pakai">Tanggal Pemakaian</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="keterangan" value="{{ $pemakaian->keterangan }}" required>
                        <label for="keterangan">Keterangan</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route ('pemakaian.index')}}" class="btn btn-danger">Kembali</a>
        </form>
    </div>
@endsection

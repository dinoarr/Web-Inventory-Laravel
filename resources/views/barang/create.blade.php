@extends('layouts.form')
@section('content')
<h1>Tambah Barang</h1>
<form action="{{ route('barang.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $kodeNext }}" readonly>
                <label for="kode_barang">Kode Barang</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="Nama_barang" name="Nama_barang" placeholder="Nama Barang" required>
                <label for="Nama_barang">Nama Barang</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <select class="form-select" id="Id_jenis" name="Id_jenis" required>
                    @foreach ($jenisBarang as $jenis)
                        <option value="{{ $jenis->Id_jenis }}">{{ $jenis->Nama_jenis_barang }}</option>
                    @endforeach
                </select>
                <label for="Id_jenis">Jenis Barang</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
                <label for="jumlah">Jumlah</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                <label for="harga">Harga</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" required>
                <label for="tanggal_beli">Tanggal Beli</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{route ('barang.index')}}" class="btn  btn-simpan" style="background-color: #233047;color: #fff">Kembali</a>
</form>
@endsection

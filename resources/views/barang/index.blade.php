@extends('layouts.app')
@section('page_title', 'Data Barang')
@section('content')

    <a href="{{ route('barang.create') }}" class="btn btn-tambah mb-3" style="background-color: #233047;color: #fff">Tambah Barang</a>
<a href="{{ route('barang.cetak') }}" class="btn btn-tambah mb-3" style="background-color: #233047;color: #fff">Generate Barang</a>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif     
<table class="table table-striped ">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal Beli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->Nama_barang }}</td>
                <td>{{ $item->jenisBarang->Nama_jenis_barang ?? 'Tidak ada jenis' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->tanggal_beli }}</td>
                <td>
                    <a href="{{ route('barang.show', $item->kode_barang) }}" class="btn btn-ubah btn-sm" style="background-color: #233047; color: #fff"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('barang.edit', $item->kode_barang) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('barang.destroy', $item->kode_barang) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

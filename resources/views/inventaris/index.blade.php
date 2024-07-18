@extends('layouts.inven')

@section('page_title', 'Data Inventaris')

@section('content')
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pembelian</th>
            <th>Jenis Barang</th>
            <th>Ruang</th>
            <th>Keterangan</th>
            <th>Penggunaan</th>
            <th>Tanggal Pemakaian</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->Nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->tanggal_pembelian }}</td>
            <td>{{ $item->Id_jenis }}</td>
            <td>{{ $item->Id_ruang }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ $item->jumlah_pakai }}</td>
            <td>{{ $item->tanggal_pemakaian }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

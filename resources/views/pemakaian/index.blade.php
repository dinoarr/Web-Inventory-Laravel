@extends('layouts.app')
@section('page_title', 'Data Pemakaian')
@section('content')
    <a href="{{ route('pemakaian.create') }}"class="btn btn-tambah mb-3" style="background-color: #233047;color: #fff">Tambah Pemakaian</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Pakai</th>
                <th>Tanggal Pakai</th>
                <th>Ruang</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemakaian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->Nama_barang }}</td>
                    <td>{{ $item->jumlah_pakai }}</td>
                    <td>{{ $item->tanggal_pakai }}</td>
                    <td>{{ $item->ruang->Nama_ruang }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('pemakaian.show', $item->id) }}" class="btn btn-ubah btn-sm" style="background-color: #233047; color: #fff"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('pemakaian.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('pemakaian.destroy', $item->id) }}" method="POST" style="display:inline;">
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

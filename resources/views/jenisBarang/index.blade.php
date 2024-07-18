@extends('layouts.app')
@section('page_title', 'Data Jenis Barang')
@section('content')
    <a href="{{ route('jenisBarang.create') }}" class="btn btn-tambah mb-3" style="background-color: #233047;color: #fff">Tambah Jenis Barang</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif     
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Jenis Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisBarang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->Nama_jenis_barang }}</td>
                    <td>
                        <a href="{{ route('jenisBarang.show', $item->Id_jenis) }}" class="btn btn-ubah btn-sm" style="background-color: #233047; color: #fff"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('jenisBarang.edit', $item->Id_jenis) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('jenisBarang.destroy', $item->Id_jenis) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

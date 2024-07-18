@extends('layouts.app')
@section('page_title', 'Data Ruang')
@section('content')
    <a href="{{ route('ruang.create') }}"class="btn btn-tambah mb-3" style="background-color: #233047;color: #fff">Tambah Ruang</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->Nama_ruang }}</td>
                    <td>
                        <a href="{{ route('ruang.show', $item->Id_ruang) }}" class="btn btn-ubah btn-sm" style="background-color: #233047; color: #fff"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('ruang.edit', $item->Id_ruang) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('ruang.destroy', $item->Id_ruang) }}" method="POST" style="display:inline;">
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

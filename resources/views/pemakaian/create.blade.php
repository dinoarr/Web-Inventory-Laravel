@extends('layouts.form')
@section('content')
    <h1>Tambah Jenis Barang</h1>
    <form id="pemakaianForm" action="{{ route('pemakaian.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="kode_barang" name="kode_barang" required>
                        @foreach ($barang as $item)
                            <option value="{{ $item->kode_barang }}" data-nama="{{ $item->Nama_barang }}" data-jumlah="{{ $item->jumlah }}">{{ $item->kode_barang }} - {{ $item->Nama_barang }}</option>
                        @endforeach
                    </select>
                    <label for="kode_barang">Kode Barang</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="Nama_barang" name="Nama_barang">
                    <label for="Nama_barang">Nama Barang</label>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="jumlah_pakai" name="jumlah_pakai" required>
                    <label for="jumlah_pakai">Jumlah Pakai</label>
                    <span id="jumlahPakaiError" class="error-message" style="display: none;">Jumlah pakai melebihi jumlah barang yang tersedia.</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tanggal_pakai" name="tanggal_pakai" required>
                    <label for="tanggal_pakai">Tanggal Pakai</label>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="Id_ruang" name="Id_ruang" required>
                        @foreach($ruang as $r)
                            <option value="{{ $r->Id_ruang }}">{{ $r->Nama_ruang }}</option>
                        @endforeach
                    </select>
                    <label for="Id_ruang">Ruang</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="keterangan" name="keterangan" required>
                        <option value="" disabled selected hidden>Pilih Keterangan</option>
                        <option value="Dipakai">Dipakai</option>
                        <option value="Tidak Dipakai">Tidak Dipakai</option>
                    </select>
                    <label for="keterangan">Keterangan</label>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pemakaian.index') }}" class="btn btn-simpan" style="background-color: #233047; color: #fff">Kembali</a>
            </div>
        </div>
    </form>
@endsection

<script>

    document.getElementById('pemakaianForm').addEventListener('submit', function (event) {
        const jumlahPakaiInput = document.getElementById('jumlah_pakai');
        const jumlahPakai = parseInt(jumlahPakaiInput.value);
        const kodeBarangSelect = document.getElementById('kode_barang');
        const selectedOption = kodeBarangSelect.options[kodeBarangSelect.selectedIndex];
        const jumlahTersedia = parseInt(selectedOption.getAttribute('data-jumlah'));

        if (jumlahPakai > jumlahTersedia) {
            event.preventDefault();
            document.getElementById('jumlahPakaiError').style.display = 'inline';
        } else {
            document.getElementById('jumlahPakaiError').style.display = 'none';
        }
    });
</script>

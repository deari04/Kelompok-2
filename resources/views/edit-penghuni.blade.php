@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Penghuni</h2>
    <form method="POST" action="{{ route('penghuni.update', $penghuni->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Pelatihan:</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ $penghuni->nama }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $penghuni->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('detaildatapenghuni') }}" class="btn btn-secondary">Batal</a>

        <!-- Note kecil di bawah -->
        <div class="mt-3">
            <small class="text-muted">
                * Untuk mengedit data penghuni, harap buat acara baru terlebih dahulu. lalu upload baru excel.
            </small>
        </div>
    </form>
</div>
@endsection

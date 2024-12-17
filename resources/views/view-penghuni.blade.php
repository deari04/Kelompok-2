@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Penghuni: {{ $penghuni->nama }}</h2>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($penghuni->tanggal)->format('d-m-Y') }}</p>

    <h4>Data Excel Terkait</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->tgllhr }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->telp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('detaildatapenghuni') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

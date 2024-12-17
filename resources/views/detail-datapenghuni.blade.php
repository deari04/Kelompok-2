@extends('layouts.app')

@section('content')
    @php
        $title = "Detail data Penghuni";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => route ('dashboard')],
            ['name' => $title, 'link' => route ('detaildatapenghuni')],
        ];
    @endphp
    <div class="container mt-4">
    <x-content :title="$title" :breadcrumbs="$breadcrumbs" />
    <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Form Penghuni</h3>
        <a href="{{ route('dataPenghuni') }}" class="btn btn-secondary ml-auto">Data Penghuni</a>
    </div>
    <!-- /.card-header -->

    <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- Tombol Export dan Import Berdekatan -->
        <div class="d-flex">
            <a href="{{ route('exportpenghuni') }}" class="btn btn-success mr-2">
                <i class="fas fa-file-export"></i> Export Data
            </a>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-file-import"></i> Import Data
            </button>
        </div>

        <!-- Search Box di sebelah kanan -->
        <a href="{{ asset('templates/Template_data_penghuni_InDorm.xlsx') }}" class="btn btn-info ml-auto" download>
                <i class="fas fa-download"></i> Download Template Excel
            </a></div>
            <div class="card-footer bg-light text-muted">
        <small class="d-block">
            <i class="fas fa-info-circle"></i>  
            <span class="ml-1">Pastikan data penghuni sudah benar. Jika ada perubahan, harap buat acara baru lalu upload file Excel yang baru.</span>
        </small>
    </div>
</div>
    <!-- /.card-header -->

    <div class="card-body">
        <!-- DataTable -->
        <table id="example1" class="table table-bordered table-striped">
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
            <tfoot></tfoot>
        </table>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Penghuni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Pastikan form berada di luar div modal-body -->
            <form action="{{ route('importpenghuni') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_penghuni" value="{{$penghuni->id}}">
                <div class="modal-body">
                    <!-- Form Import -->
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control-file" id="file" name="file" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

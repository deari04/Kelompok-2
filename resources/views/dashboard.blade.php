@extends('layouts.app')

@section('content')
    @php
        $title = "Dashboard";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => route ('dashboard')],
            ['name' => $title, 'link' => route ('dashboard')],
        ];
          
    @endphp

    <x-content :title="$title" :breadcrumbs="$breadcrumbs" />
    <div class="container mt-4">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $kamarTerpakai }}</h3>
                        <p>Kamar Terpakai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bed"></i> <!-- Ikon kamar -->
                    </div>
                   </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $penghuniAktif }}</h3>
                        <p>Penghuni aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i> <!-- Ikon orang -->
                    </div>
                      </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- ./row -->

        <!-- Kegiatan yang sedang berlangsung -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kegiatan yang sedang berlangsung</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 10%">No</th>
                            <th style="width: 40%">Tanggal Pelatihan</th>
                            <th style="width: 50%">Nama Pelatihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatan as $index => $event)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</a>
                                <br/>
                                <small>{{ \Carbon\Carbon::parse($event->tanggal)->diffForHumans() }}</small>
                            </td>
                            <td>
                                <a>{{ $event->name }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

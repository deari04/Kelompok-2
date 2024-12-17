@extends('layouts.app')

@section('content')
    @php
        $title = "Data Penghuni";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => route ('dashboard')],
            ['name' => $title, 'link' => route ('dataPenghuni')],
        ];
    @endphp

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="container mt-4">
        <x-content :title="$title" :breadcrumbs="$breadcrumbs" />
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Penghuni</h3>
                <div class="card-tools">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-file-import"></i> Create Acara
                    </button>
                </div>
            </div>
            
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">No</th>
                            <th style="width: 20%">Tanggal</th>
                            <th style="width: 30%">Nama Pelatihan</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penghuni as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="project-actions text-right">
                                    <!-- View Button -->
                                    <a class="btn btn-primary btn-sm" href="{{ route('penghuni.show', $item->id) }}">
                                        <i class="fas fa-folder"></i> View
                                    </a>
                                    <!-- Edit Button -->
                                    <a class="btn btn-info btn-sm" href="{{ route('penghuniedit', $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <!-- Delete Form -->
                                    <form id="delete-{{ $item->id }}" action="{{ route('penghuni.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" 
                                            onclick="if (confirm('Are you sure want to delete this item?')) {
                                                document.getElementById('delete-{{ $item->id }}').submit();
                                            }">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </td> 




                        {{-- <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="project-actions text-right">
                                <!-- View Button -->
                                <a class="btn btn-primary btn-sm" href="{{ route('penghuni.show', $item->id) }}">
                                    <i class="fas fa-folder"></i> View
                                </a>
                                <!-- Edit Button -->
                                <a class="btn btn-info btn-sm" href="{{ route('penghuniedit', $item->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <!-- Delete Form -->
                                <form id="delete-{{ $item->id }}" action="{{ route('penghuni.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" 
                                        onclick="if (confirm('Are you sure want to delete this item?')) {
                                            document.getElementById('delete-{{ $item->id }}').submit();
                                        }">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr> --}}
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('penghuni.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="acara" class="col-form-label">Acara</label>
                            <input type="text" class="form-control" id="acara" name="nama" placeholder="Masukkan nama acara" required>
                        </div>
                        <div class="form-group">
                            <label for="checkin" class="col-form-label">Tanggal</label>
                            <input type="date" class="form-control" id="checkin" name="tanggal" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

                                                                    

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
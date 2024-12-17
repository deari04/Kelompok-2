@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-weight-bold">Data Kamar</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKamarModal">Tambah Kamar</button>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Status Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamars as $index => $kamar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kamar->nomor_kamar }}</td>
                    <td>
                        <span class="badge {{ $kamar->status_kamar == 'ON' ? 'bg-success' : 'bg-danger' }}">
                            {{ $kamar->status_kamar }}
                        </span>
                    </td>
                    <td>
                        {{-- <button class="btn btn-warning btn-sm edit-kamar" data-id="{{ $kamar->id }}" data-bs-toggle="modal" data-bs-target="#editKamarModal">Edit</button>
                        <form action="{{ route('kamars.destroy', $kamar->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form> --}}
                        <button class="btn btn-warning btn-sm edit-kamar" data-id="{{ $kamar->id }}" data-bs-toggle="modal" data-bs-target="#editKamarModal">Edit</button> 
                        <form action="{{ route('kamars.destroy', $kamar->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');"> 
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kamars->links() }}

    <!-- Modal Tambah -->
    <div class="modal fade" id="addKamarModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('kamars.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nomor Kamar</label>
                            <input type="text" name="nomor_kamar" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Status Kamar</label>
                            <select name="status_kamar" class="form-select" required>
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editKamarModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="editKamarForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editKamarID">
                        <div class="mb-3">
                            <label>Nomor Kamar</label>
                            <input type="text" name="nomor_kamar" id="edit_nomor_kamar" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Status Kamar</label>
                            <select name="status_kamar" id="edit_status_kamar" class="form-select" required>
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-kamar').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            fetch(`/kamars/${id}/edit`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('edit_nomor_kamar').value = data.nomor_kamar;
                    document.getElementById('edit_status_kamar').value = data.status_kamar;
                    document.getElementById('editKamarForm').action = `/kamars/${id}`;
                })
                .catch(err => console.error(err));
        });
    });
</script>
@endsection

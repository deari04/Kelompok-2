@extends('layouts.app')

@section('content')
    @php
        $title = "Kelola-akun";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => route ('dashboard')],
            ['name' => $title, 'link' => route ('kelolaAkun')],
        ];
    @endphp
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 mb-2">Kelola Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Akun</li>
                    </ol>
                </div>
            </div>
        </div>

        <hr>

        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center pb-2">
                        <h4 class="mr-2">Akun</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-xs" title="Create new account">
                            <i class="fas fa-plus"> Add</i>
                        </a>
                    </div>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-fixed p-0">
                            <table class="table table-hover text-nowrap">
                                <thead class="table-gray text-center">
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>ID</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning" role="button">Edit</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

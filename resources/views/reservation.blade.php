@extends('layouts.app')

@section('content')
    <div class="d-flex flex-lg-row flex-column justify-content-lg-between align-items-center my-3">
        <h3>Pemesanan</h3>
        {{-- <form class="form-inline">
            <div class="form-group mb-0">
                <label for="Search" class="sr-only">Search</label>
                <input type="password" class="form-control" id="Search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-primary ml-1"><i class="bi bi-search"></i></button>
        </form> --}}
    </div>
    <hr/>
    <x-reservation.reservation-form />
@endsection

@extends('layouts.app')

@section('content')
    @php
        $title = "Pemesanan";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => route ('dashboard')],
            ['name' => $title, 'link' => route ('pemesanan')],
        ];
        $rooms = [
            (object)['id' => 1, 'number' => '101'],
            (object)['id' => 2, 'number' => '102'],
            // Add more room objects as needed
        ];
    @endphp

    <x-content :title="$title" :breadcrumbs="$breadcrumbs" />
    <div class="container mt-4">
        <x-reservation-form :rooms="$rooms" />
        <x-reservation-table />
    </div>
@endsection
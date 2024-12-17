@extends('layouts.app')

@section('content')
    @php
        $title = "Riwayat";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => route('dashboard')],
            ['name' => $title, 'link' => route('riwayat')],
        ];
    @endphp
    <div class="container mt-4">
    <x-content :title="'Riwayat Pemesanan'" :breadcrumbs="$breadcrumbs" />
    <pre>
</pre>

    <div class="list-group mb-3">
    @foreach ($reservations as $reservation)
        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $loop->iteration }}. {{ optional($reservation->penghuni)->nama ?? 'Acara Tidak Tersedia' }}</strong>
                <p class="mb-0 d-flex">
                    <span>{{ $reservation->total ?: 'Jumlah Orang Tidak Tersedia' }} orang</span> &nbsp;|&nbsp; 
                    <span>{{ $reservation->total_room ?? 'Nama Kamar Tidak Tersedia' }}</span>
                </p>
            </div>
            <div class="text-right">
                <span>{{ $reservation->check_in }}</span> &nbsp;-&nbsp; <span>{{ $reservation->check_out }}</span>
            </div>
        </a>
    @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $reservations->links() }}
    </div>
</div>

    <!-- <div class="container mt-4">
        <x-content :title="$title" :breadcrumbs="$breadcrumbs" />

        <div class="list-group mb-3">
            @foreach ($reservations as $reservation)
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $loop->iteration }}. {{ optional($reservation->event)->name ?? 'Acara Tidak Tersedia' }}</strong>
                        <p class="mb-0 d-flex">
                            <span>{{ optional($reservation->penghuni)->count() ?: 'Jumlah Orang Tidak Tersedia' }} orang</span> &nbsp;|&nbsp; 
                            <span>{{ optional($reservation->room)->count() ?: 'Jumlah Kamar Tidak Tersedia' }} Kamar</span>
                        </p>
                    </div>
                    <div class="text-right">
                        <span>{{ $reservation->check_in }}</span> &nbsp;-&nbsp; <span>{{ $reservation->check_out }}</span>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $reservations->links() }}
        </div>
    </div> -->
@endsection



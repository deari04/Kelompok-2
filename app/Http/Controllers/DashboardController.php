<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Penghuni; // Jika ada model penghuni
use App\Models\DetailPenghuni; // Model untuk kegiatan yang sedang berlangsung
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah kamar terpakai
        $kamarTerpakai = Reservation::where('check_out', '>=', Carbon::now())->count(); // Menghitung kamar yang check-out nya setelah tanggal sekarang

        // Menghitung jumlah penghuni aktif
        $penghuniAktif = DetailPenghuni::whereHas('reservations', function ($query) {
            $query->where('check_out', '>=', Carbon::now()); // Menghitung penghuni yang masih aktif (check-out nya belum lewat)
        })->count();

        // Mengambil kegiatan yang sedang berlangsung
        $kegiatan = Penghuni::where('tanggal', '<=', Carbon::now()->toDateString())
            // ->where('end_date', '>=', Carbon::now())
            ->orderBy('tanggal', 'desc') 
            ->limit(5) // Mengambil 5 kegiatan terakhir
            ->get();

        // Mengirimkan data ke view dashboard
        return view('dashboard', [
            'kamarTerpakai' => $kamarTerpakai,
            'penghuniAktif' => $penghuniAktif,
            'kegiatan' => $kegiatan,
        ]);
    }

    
}


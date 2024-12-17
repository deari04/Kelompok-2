<?php

namespace App\Http\Controllers;
use App\Models\Penghuni;
use App\Models\DetailPenghuni;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation');
    }

    public function save(Request $request)
    {
        $request->validate([
            "penghuni_id" => "required",
            "check_in" => "required",
            // "check_out" => "required",
            "room_id" => "required",
            "reservation_gender" => "required",
            "penghuni_detail_id" => "array",
        ]);

        // Membuat model Reservation dan menyimpannya
        $model = new Reservation;
        $model->fill($request->except('penghuni_detail_id')); // Mengisi data model selain penghuni_detail_id
        $model->save();

        // Menyimpan data detail penghuni ke tabel reservations_detail
        foreach ($request->penghuni_detail_id ?? [] as $penghuniDetailId) {
            ReservationDetail::create([
                'reservation_id' => $model->id, // ID reservasi yang baru saja disimpan
                'penghuni_detail_id' => $penghuniDetailId["penghuni_detail_id"], // ID penghuni yang dipilih
            ]);
        }

        return redirect()->route("pemesanan.index");
    }

    public function detailPenghuni($id) {
        $penghuni = DetailPenghuni::where("penghuni_id", $id)->get();
        
        $html = view('components.forms.dropdown-penghuni', [
            "penghuni" => $penghuni,
        ])->render();

        return response()->json(["html" => $html]);
    }

    public function showHistory()
    {
        // Ambil data reservation yang sudah ada, dengan eager loading yang benar
        $reservations = Reservation::with([
            'penghuni', // Relasi penghuni
        ])
        ->leftJoin("reservations_detail", "reservations_detail.reservation_id", "reservations.id")
        ->selectRaw("
            penghuni_id,
            check_in,
            check_out,
            count(reservations_detail.id) as total,
            count(distinct room_id) as total_room
        ")
        ->groupBy("penghuni_id", "check_in", "check_out")
        ->orderBy('check_in', 'desc') // Mengurutkan berdasarkan waktu pemesanan terbaru
        ->paginate(5); // Menampilkan 10 data per halaman

        // Mengirim data ke view 'riwayat'
        return view('riwayat', compact('reservations'));
    }

    
//     public function showHistory()
// {
//     // Ambil data reservation yang sudah ada, bisa ditambahkan filter sesuai kebutuhan
//     $reservations = Reservation::with(['penghuni->nama', 'penghuni_detail', 'room'])
//         ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan waktu pemesanan terbaru
//         ->paginate(10); // Menampilkan 10 data per halaman
        
//     return view('riwayat', compact('reservations'));

// }


    // public function showHistory()
    // {
    //     $reservations = Reservation::with(['penghuni', 'room', 'event'])
    //                                 ->orderBy('created_at', 'desc')
    //                                 ->paginate(10); // Menggunakan pagination
    
    //     return view('riwayat', compact('reservations'));
    // }
    

  
}

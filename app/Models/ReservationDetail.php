<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'reservations_detail';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'reservation_id',
        'penghuni_detail_id',
    ];

    // Relasi dengan model Reservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    // Relasi dengan model DetailPenghuni
    public function penghuniDetail()
    {
        return $this->belongsTo(DetailPenghuni::class, 'penghuni_detail_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenghuni extends Model
{
    use HasFactory;
    protected $table = 'detail_penghuni'; // Pastikan sesuai nama tabel
    protected $fillable = ['penghuni_id', 'nama', 'alamat', 'jenis_kelamin','tgllhr', 'telp']; // Field yang bisa diisi

    public function reservationDetails()
    {
        return $this->hasMany(ReservationDetail::class, 'penghuni_detail_id');
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservations_detail', 'penghuni_detail_id', "reservation_id");
    }

}

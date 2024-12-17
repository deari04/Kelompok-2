<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "penghuni_id",
        "check_in",
        "check_out",
        'room_id',
        'reservation_gender',
        'penghuni_detail_id',
       
    ];

    public function details()
    {
        return $this->hasMany(ReservationDetail::class);
    }

    public function room()
    {
        return $this->hasOne(Kamar::class, "id", "room_id");
    }

    public function penghuni()
{
    return $this->belongsTo(Penghuni::class);
}

// Jika ingin mendapatkan data nama penghuni
public function penghuni_detail()
{
    return $this->hasMany(DetailPenghuni::class); 
}

}

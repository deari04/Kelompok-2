<?php

namespace App\View\Components\Reservation;

use App\Models\Kamar;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ReservationTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = Reservation::query()
            ->with(["room", "details" => function($query) {
                $query->select(
                    DB::raw("CONCAT(ROW_NUMBER() OVER (ORDER BY detail_penghuni.id ASC), '. ', nama) AS nama"),
                    'reservation_id'
                )->join("detail_penghuni", "reservations_detail.penghuni_detail_id", "detail_penghuni.id");
            }])
            ->paginate(10);
        return view('components.reservation.reservation-table', [
            "data" => $data
        ]);
    }
}

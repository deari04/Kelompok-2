<?php

namespace App\View\Components\Forms;

use App\Models\DetailPenghuni;
use App\Models\Kamar;
use App\Models\Room;
use Illuminate\View\Component;

class DropdownPenghuni extends Component
{
    protected $idPenghuni;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idPenghuni)
    {
        $this->idPenghuni = $idPenghuni;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $penghuni = DetailPenghuni::where("penghuni_id", $this->idPenghuni)->get();
        
        return view('components.forms.dropdown-penghuni', [
            "penghuni" => $penghuni,
        ]);
    }
}

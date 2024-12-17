<?php

namespace App\View\Components\Forms;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Room;
use Illuminate\View\Component;

class DropdownAcara extends Component
{
    protected $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status = null)
    {
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = Penghuni::query()->select("id", "nama AS name")->get();
        
        return view('components.forms.dropdown-acara', [
            "data" => $data,
        ]);
    }
}

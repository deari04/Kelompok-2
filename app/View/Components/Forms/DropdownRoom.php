<?php

namespace App\View\Components\Forms;

use App\Models\Kamar;
use App\Models\Room;
use Illuminate\View\Component;

class DropdownRoom extends Component
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
        $data = Kamar::query()->when($this->status, function ($query, $status) {
            $query->where('status_kamar', $status);
        })->select("id", "nomor_kamar AS name")->get();
        
        return view('components.forms.dropdown-room', [
            "data" => $data,
        ]);
    }
}

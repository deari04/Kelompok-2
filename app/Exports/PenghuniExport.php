<?php

namespace App\Exports;

use App\Models\DetailPenghuni; 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenghuniExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailPenghuni::query()->select("nama", "alamat", "tgllhr", "telp")->get();
    }

    /**
     * @return array
     */
    public function headings(): array 
    {
        return [
            "Nama",
            "Alamat",
            "Tgl. Lahir",
            "No. Telp",
        ];
    }
}


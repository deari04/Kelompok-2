<?php

namespace App\Imports;

use App\Models\DetailPenghuni;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenghuniImport implements ToModel, WithHeadingRow
{
    private $idPenghuni;

    public function __construct($idPenghuni) {
        $this->idPenghuni = $idPenghuni;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row): DetailPenghuni
    {
        $model = new DetailPenghuni([
            'penghuni_id'=>$this->idPenghuni,
            'nama'=>$row["nama"],
            'alamat'=>$row["alamat"],
            'tgllhr'=> Carbon::parse($row["tgl_lahir"] ?? null)->toDateString(),
            'telp'=>$row["no_telp"],
        ]);

        return $model;
    }
}

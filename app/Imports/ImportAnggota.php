<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAnggota implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Anggota([
            'name' => $row[0],
            'email' => $row[1],
            'whatsapp' => $row[2],
            'alamat' => $row[3],
            'status' => $row[4],
        ]);
    }
}

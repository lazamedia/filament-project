<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodeSertif extends Model
{
    protected $fillable = [
        'name',
        'kode',
    ];

    public function sertifikats()
    {
        return $this->hasMany(Sertifikat::class);
    }
}

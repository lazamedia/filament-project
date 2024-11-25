<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'alamat',
        'status',
    ];
}

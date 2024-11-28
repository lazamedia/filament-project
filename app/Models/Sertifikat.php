<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $fillable = [
        'name',
        'kegiatan',
        'kode_sertifikat',
        'tanggal',
        'keterangan',
        'detail',
        'kode_sertifs_id', // Relasi dengan KodeSertif
    ];
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (empty($model->kode_sertifikat)) {
    //             $lastKode = self::where('kode_sertifs_id', $model->kode_sertifs_id)
    //                 ->latest('created_at')
    //                 ->first();
    //             $nomor = $lastKode ? (intval(substr($lastKode->kode_sertifikat, 0, strpos($lastKode->kode_sertifikat, '/'))) + 1) : 1;
    //             $nomorFormatted = str_pad($nomor, 3, '0', STR_PAD_LEFT);
    //             $kodeSertif = $model->kodeSertif; // Relationship to get kodeSertif

    //             $model->kode_sertifikat = "{$nomorFormatted}/{$kodeSertif->kode}/UKMCYBER/" . now()->year;
    //         }
    //     });
    // }
    // Relasi ke KodeSertif
    public function kodeSertif()
    {
        return $this->belongsTo(KodeSertif::class, 'kode_sertifs_id');
    }

    
}

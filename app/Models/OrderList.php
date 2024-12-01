<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $table = 'orderlist'; 

    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'total_price', 'status', 'payment_proof',
    ];

    // Relasi ke tabel Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

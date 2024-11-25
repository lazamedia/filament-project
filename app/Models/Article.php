<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'short_description',
        'photo',
        'content',
        'link',
        'user_id',
    ];

    /**
     * Relasi dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Booted method untuk menangani event model
     */

    protected static function booted()
    {
        static::deleting(function ($article) {
            if ($article->photo) {
                Storage::disk('public')->delete($article->photo);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('photo')) {
                $oldPhoto = $article->getOriginal('photo');
                if ($oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }
        });
    }

}

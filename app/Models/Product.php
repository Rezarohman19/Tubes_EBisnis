<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            // Coba kedua path — ada yang simpan nama file saja, ada yang simpan full path
            $path = 'products/' . $this->image;
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
                return asset('storage/' . $path);
            }
            // Fallback: mungkin sudah path lengkap
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
                return asset('storage/' . $this->image);
            }
        }

        return asset('images/no-image.png');
    }
}
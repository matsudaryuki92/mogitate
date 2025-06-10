<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'product_season');
    }

    public function scopeSearchByName($query, $keyword)
    {
        if($keyword) {
            return $query->where('name', 'LIKE', "%$keyword%");
        }

        return $query;
    }

    public function scopeSearchByPrice($query, $order)
    {
        if ($order === 'desc') {
            return $query->orderBy('price', 'desc');
        } elseif ($order === 'asc') {
            return $query->orderBy('price', 'asc');
        }

        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSeason extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'season_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}

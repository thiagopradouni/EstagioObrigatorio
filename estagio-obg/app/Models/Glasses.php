<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'product_type',
        'fantasy_code',
        'description',
        'quantity',
        'unit_cost',
        'sale_price',
        'brand',
        'line_material',
        'color'
    ];

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_glass')->withPivot('quantity');
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'glasses_id',
        'description',
        'quantity',
        'customer_name',
        'discount',
        'payment_method',
        'gross_value',
        'net_value',
    ];

    public function glasses()
    {
        return $this->belongsTo(Glasses::class);
    }
}

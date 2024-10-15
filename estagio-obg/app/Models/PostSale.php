<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'scheduled_date',
        'actual_date',
        'completed',
        'comments'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}

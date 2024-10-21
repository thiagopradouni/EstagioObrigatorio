<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LensRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'lens_type',
        'quantity',
        'prescription_details',
        'additional_notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Cliente::class);
    }
}

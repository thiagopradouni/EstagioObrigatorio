<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'glasses_id',
        'cliente_id',  // Adicionei o campo cliente_id
        'description',
        'quantity',
        'discount',
        'payment_method',
        'gross_value',
        'net_value',
    ];

    public function glasses()
    {
        return $this->belongsTo(Glasses::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);  // Relacionamento com o modelo Cliente
    }

    // Calcula o valor bruto automaticamente
    public static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            $glass = Glasses::find($sale->product_id);
            $sale->gross_value = $sale->quantity * $glass->sale_price;
        });

        static::updating(function ($sale) {
            $glass = Glasses::find($sale->product_id);
            $sale->gross_value = $sale->quantity * $glass->sale_price;
        });
    }
}

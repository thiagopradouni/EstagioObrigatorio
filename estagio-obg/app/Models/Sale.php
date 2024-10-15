<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'description',
        'discount',
        'payment_method',
        'gross_value',
        'net_value',
    ];

    public function glasses()
    {
        return $this->belongsToMany(Glasses::class, 'sale_glass', 'sale_id', 'glass_id')->withPivot('quantity');
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function postSales()
    {
        return $this->hasMany(PostSale::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            $totalGrossValue = 0;

            foreach ($sale->glasses as $glass) {
                $pivotQuantity = $glass->pivot->quantity;

                // Verifica se a quantidade vendida excede a quantidade em estoque
                if ($pivotQuantity > $glass->quantity) {
                    throw new \Exception('A quantidade vendida excede a quantidade disponível em estoque para o produto: ' . $glass->fantasy_code);
                }

                $totalGrossValue += $pivotQuantity * $glass->sale_price;
            }

            $sale->gross_value = $totalGrossValue;

            // Define o valor de discount como 0.00 se estiver nulo
            if (is_null($sale->discount)) {
                $sale->discount = 0.00;
            }
        });

        static::updating(function ($sale) {
            $totalGrossValue = 0;

            foreach ($sale->glasses as $glass) {
                $pivotQuantity = $glass->pivot->quantity;

                // Verifica se a quantidade vendida excede a quantidade em estoque
                if ($pivotQuantity > $glass->quantity) {
                    throw new \Exception('A quantidade vendida excede a quantidade disponível em estoque para o produto: ' . $glass->fantasy_code);
                }

                $totalGrossValue += $pivotQuantity * $glass->sale_price;
            }

            $sale->gross_value = $totalGrossValue;

            // Define o valor de discount como 0.00 se estiver nulo
            if (is_null($sale->discount)) {
                $sale->discount = 0.00;
            }
        });

        static::deleting(function ($sale) {
            // Excluir todos os registros de pós-venda relacionados
            $sale->postSales()->delete();
        });
    }
}

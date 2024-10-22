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

    // Relacionamento com óculos (Glasses)
    public function glasses()
    {
        return $this->belongsToMany(Glasses::class, 'sale_glass', 'sale_id', 'glass_id')->withPivot('quantity');
    }

    // Relacionamento com cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento com pós-vendas
    public function postSales()
    {
        return $this->hasMany(PostSale::class);
    }

    // Removido o cálculo de valor bruto do método creating/updating, 
    // já que isso deve ser tratado no controller antes da criação ou atualização da venda.
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sale) {
            // Excluir todos os registros de pós-venda relacionados
            $sale->postSales()->delete();

            // Reverter o estoque ao deletar a venda
            foreach ($sale->glasses as $glass) {
                $glass->quantity += $glass->pivot->quantity;
                $glass->save();
            }
        });
    }
}

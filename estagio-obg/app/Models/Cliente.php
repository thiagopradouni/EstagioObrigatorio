<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'data_nascimento',
        'endereco',
        'telefone'
    ];

    // Accessor para formatar o CPF
    public function getCpfFormattedAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    // Accessor para calcular a idade
    public function getIdadeAttribute()
    {
        return Carbon::parse($this->attributes['data_nascimento'])->age;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    protected $fillable = [
        "contato_id",
        "desconto",
        "observacoes",
        "observacaointerna",
        "data",
        "numero",
        "numeroOrdemCompra",
        "vendedor",
        "valorfrete",
        "outrasdespesas",
        "totalprodutos",
        "totalvenda",
        "situacao",
        "dataSaida",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}

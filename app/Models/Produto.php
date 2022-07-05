<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descricao',
        'quantidade',
        'valorunidade',
        'precocusto',
        'descontoItem',
        'un',
        'pesoBruto',
        'largura',
        'altura',
        'profundidade',
        'descricaoDetalhada',
        'unidadeMedida',
        'gtin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_bling',
        'codigo',
        'nome',
        'fantasia',
        'tipo',
        'cnpj',
        'ie_rg',
        'endereco',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'complemento',
        'uf',
        'fone',
        'email',
        'situacao',
        'contribuinte',
        'site',
        'celular',
        'dataAlteracao',
        'dataInclusao',
        'sexo',
        'clienteDesde',
        'limiteCredito',
        'nomeVendedor'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}

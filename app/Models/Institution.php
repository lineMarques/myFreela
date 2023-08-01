<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_da_ies',
        'filantropica',
        'organizacao_academica',
        'codigo_municipio_ibge',
        'municipio',
        'uf',
        'situacao_ies',
        'nome_da_ies',
        'sigla',
        'categoria_da_ies',
        'comunitaria',
        'confessional'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freela extends Model
{
    use HasFactory;

    protected $fillable = [
        'dataInicial',
        'horaInicial',
        'horaFinal',
        'cargo',
        'observacao',
        'valorFreela',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}

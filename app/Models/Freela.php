<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freela extends Model
{
    use HasFactory;

    protected $fillable = [
        'dataFreela',
        'horaInicio',
        'horaFinal',
        'cargo',
        'observacao',
        'valorFreela',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function invites(){

        return $this->hasMany(Invite::class);
    }

    public function starRating(){
        return $this->hasOne(starRating::class);
    }

}

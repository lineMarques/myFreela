<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [

        'cnpj',
        'contact',
        'email',
        'companyName',
        'cep',
        'road',
        'number',
        'neighborhood',
        'city',
        'state'
    ];

    public function user()
    {
        return $this->belogsTo(User::class);
    }

    public function image(){

        return $this->morphOne(Image::class,'imageable');
    }

    public function freelas()
    {
        return $this->hasMany(Freela::class);
    }

    public function invites()
    {
        return $this->hasMany(invite::class);
    }
}



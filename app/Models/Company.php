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
    ];

    public function user()
    {
        return $this->belogsTo(User::class);
    }

    public function address(){

        return $this->morphOne(Address::class,'addressable');
    }

    public function image(){

        return $this->morphOne(Image::class,'imageable');
    }

}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $fillable = [
       'aboutMe',
       'skills',
       'schooling',
       'institution'
    ];

    protected $casts = [
        'skills' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}
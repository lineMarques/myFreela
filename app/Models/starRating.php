<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class starRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'star',
        'reviwe',
    ];

    public function stellar()
    {
        return $this->morphTo();
    }
}

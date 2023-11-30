<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class starRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluator_user_id',
        'star',
        'reviwe',
        'freela_id'

    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function userEvaluator()
    {
        return $this->belongsToMany(User::class);
    }

    public function freela(){
        return $this->belongsTo(Freela::class);
    }
}

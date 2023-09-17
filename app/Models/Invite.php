<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'confirmacao',
    ];

    protected $casts = [
        'confirmacao' => 'boolean',
    ];

    public function company()
    {
        return $this->belogsTo(Company::class);
    }

    public function user()
    {
        return $this->belogsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobTitle',
        'company',
        'companyEmail',
        'companyContact',
        'xp',
        'assignments'
    ];

    public function user()
    {
        return $this->belogsTo(User::class);
    }
}

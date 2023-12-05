<?php

namespace App\Models;

use App\Enums\InviteStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    protected $fillable = [
        'freela_id',
        'user_id',
        'company_id',
        'confirmacao',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function freela()
    {
        return $this->belongsTo(Freela::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

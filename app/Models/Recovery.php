<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Recovery extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'year',
        'date',
        'bet',
        'refund'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

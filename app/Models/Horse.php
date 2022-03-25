<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Horse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'race',
        'name',
        'mark',
        'opinion'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

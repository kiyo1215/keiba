<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

class Horse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'race',
        'horse_name',
        'mark',
        'opinion'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

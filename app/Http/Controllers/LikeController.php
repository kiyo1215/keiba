<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horse;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id){
        Like::create([
            'user_id' => Auth::id(),
            'horse_id' => $id
        ]);
        return back();
    }
    public function notLike($id){
        Like::where('user_id', Auth::id())->where('horse_id', $id)->delete();
        return back();
    }
}
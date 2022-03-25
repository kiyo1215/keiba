<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Horse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HorseController extends Controller
{
    public function home(){
        $my_datas = Horse::where('user_id', Auth::id())->latest('date')->get();
        $all_datas = Horse::latest('date')->get();
        return view('keiba.main', compact('my_datas', 'all_datas'));
    }
    public function predict(){
        return view('keiba.predict');
    }
    public function predictCreate(Request $request){
        Horse::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'race' => $request->race,
            'name' => $request->name,
            'mark' => $request->mark,
            'opinion' => $request->opinion,
        ]);
        return back()->with('msg', '登録しました');
    }
    public function history(){
        $datas = Horse::where('user_id', Auth::id())->latest('date')->get();
        return view('keiba.history', compact('datas'));
    }
    public function search_histrory(Request $request){
        if(empty($request->date)){
            $datas = Horse::where('user_id', Auth::id())->where('race', 'like', "%$request->race%")->where('name', 'like', "%$request->name%")->latest('date')->get();
            if(empty($request->race)){
                $datas = Horse::where('user_id', Auth::id())->where('name', 'like', "%$request->name%")->latest('date')->get();
                if(empty($request->name)){
                    $datas = Horse::where('user_id', Auth::id())->latest('date')->get();
                }
            }
            if(empty($request->name)){
                $datas = Horse::where('user_id', Auth::id())->where('race', 'like', "%$request->race%")->latest('date')->get();
            }
        }
        if(!empty($request->date)){
            $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->where('race', 'like', "%$request->race%")->where('name', 'like', "%$request->name%")->latest('date')->get();
            if(empty($request->race)){
                $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->where('name', 'like', "%$request->name%")->latest('date')->get();
                if(empty($request->name)){
                    $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->latest('date')->get();
                }
            }
            if(empty($request->name)){
                $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->where('race', 'like', "%$request->race%")->latest('date')->get();
            }
        }
        return view('keiba.history', compact('datas'));
    }
    public function look(){
        $datas = Horse::all();
        return view('keiba.look', compact('datas'));
    }
    public function search_look(Request $request)
    {
        if (empty($request->date)) {
            $datas = Horse::where('race', 'like', "%$request->race%")->where('name', 'like', "%$request->name%")->latest('date')->get();
            if (empty($request->race)) {
                $datas = Horse::where('name', 'like', "%$request->name%")->latest('date')->get();
                if (empty($request->name)) {
                    $datas = Horse::latest('date')->get();
                }
            }
            if (empty($request->name)) {
                $datas = Horse::where('race', 'like', "%$request->race%")->latest('date')->get();
            }
        }
        if (!empty($request->date)) {
            $datas = Horse::where('date', $request->date)->where('race', 'like', "%$request->race%")->where('name', 'like', "%$request->name%")->latest('date')->get();
            if (empty($request->race)) {
                $datas = Horse::where('date', $request->date)->where('name', 'like', "%$request->name%")->latest('date')->get();
                if (empty($request->name)) {
                    $datas = Horse::where('date', $request->date)->latest('date')->get();
                }
            }
            if (empty($request->name)) {
                $datas = Horse::where('date', $request->date)->where('race', 'like', "%$request->race%")->latest('date')->get();
            }
        }
        return view('keiba.look', compact('datas'));
    }
    
}

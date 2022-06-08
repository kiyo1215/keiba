<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HorseRequest;
use App\Models\User;
use App\Models\Horse;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HorseController extends Controller
{
    public function home(){
        return view('keiba.top');
    }
    public function predict(){
        return view('keiba.predict');
    }
    public function predictCreate(HorseRequest $request){
        Horse::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'race' => $request->race,
            'horse_name' => $request->horse_name,
            'mark' => $request->mark,
            'opinion' => $request->opinion,
        ]);
        return back()->with('msg', '登録しました');
    }
    public function history(){
        $datas = Horse::where('user_id', Auth::id())->latest('date')->paginate(10);;
        return view('keiba.history', compact('datas'));
    }
    public function search_histrory(Request $request){
        if(empty($request->date)){
            $datas = Horse::where('user_id', Auth::id())->where('race', 'like', "%$request->race%")->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
            if(empty($request->race)){
                $datas = Horse::where('user_id', Auth::id())->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
                if(empty($request->horse_name)){
                    $datas = Horse::where('user_id', Auth::id())->latest('date')->paginate(10);
                }
            }
            if(empty($request->horse_name)){
                $datas = Horse::where('user_id', Auth::id())->where('race', 'like', "%$request->race%")->latest('date')->paginate(10);
            }
        }
        if(!empty($request->date)){
            $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->where('race', 'like', "%$request->race%")->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
            if(empty($request->race)){
                $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
                if(empty($request->horse_name)){
                    $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->latest('date')->paginate(10);
                }
            }
            if(empty($request->horse_name)){
                $datas = Horse::where('user_id', Auth::id())->where('date', $request->date)->where('race', 'like', "%$request->race%")->latest('date')->paginate(10);
            }
        }
        return view('keiba.history', compact('datas'));
    }
    public function showUpdate($id){
        $datas = Horse::find($id);
        return view('keiba.update', compact('datas'));
    }
    public function storeUpdate(Request $request){
        Horse::where('id', $request->id)->update([
            'date' => $request->date,
            'race' => $request->race,
            'horse_name' => $request->horse_name,
            'mark' => $request->mark,
            'opinion' => $request->opinion
        ]);
        $datas = Horse::where('user_id', Auth::id())->paginate(10);
        return view('keiba.history', compact('datas'));
        // return view('keiba.history');
    }
    public function look(){
        $horses = Horse::latest('date')->paginate(10);
        return view('keiba.look', compact('horses'));
    }
    public function show($id){
        $datas = Horse::find($id);
        $likes = Like::where('user_id', Auth::id())->where('horse_id', $id)->first();
        return view('keiba.show', compact('datas', 'likes'));
    }
    public function search_look(Request $request)
    {
        if (empty($request->date)) {
            $horses = Horse::where('race', 'like', "%$request->race%")->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
            if (empty($request->race)) {
                $horses = Horse::where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
                if (empty($request->horse_name)) {
                    $horses = Horse::latest('date')->paginate(10);
                }
            }
            if (empty($request->horse_name)) {
                $horses = Horse::where('race', 'like', "%$request->race%")->latest('date')->paginate(10);
            }
        }
        if (!empty($request->date)) {
            $horses = Horse::where('date', $request->date)->where('race', 'like', "%$request->race%")->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
            if (empty($request->race)) {
                $horses = Horse::where('date', $request->date)->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
                if (empty($request->horse_name)) {
                    $horses = Horse::where('date', $request->date)->latest('date')->paginate(10);
                }
            }
            if (empty($request->horse_name)) {
                $horses = Horse::where('date', $request->date)->where('race', 'like', "%$request->race%")->latest('date')->paginate(10);
            }
        }
        return view('keiba.look', compact('horses'));
    }
    public function search_history(Request $request)
    {
        if (empty($request->date)) {
            $datas = Horse::where('race', 'like', "%$request->race%")->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
            if (empty($request->race)) {
                $datas = Horse::where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
                if (empty($request->horse_name)) {
                    $datas = Horse::latest('date')->paginate(10);
                }
            }
            if (empty($request->horse_name)) {
                $datas = Horse::where('race', 'like', "%$request->race%")->latest('date')->paginate(10);
            }
        }
        if (!empty($request->date)) {
            $datas = Horse::where('date', $request->date)->where('race', 'like', "%$request->race%")->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
            if (empty($request->race)) {
                $datas = Horse::where('date', $request->date)->where('horse_name', 'like', "%$request->horse_name%")->latest('date')->paginate(10);
                if (empty($request->horse_name)) {
                    $datas = Horse::where('date', $request->date)->latest('date')->paginate(10);
                }
            }
            if (empty($request->horse_name)) {
                $datas = Horse::where('date', $request->date)->where('race', 'like', "%$request->race%")->latest('date')->paginate(10);
            }
        }
        return view('keiba.history', compact('datas'));
    }
    
}

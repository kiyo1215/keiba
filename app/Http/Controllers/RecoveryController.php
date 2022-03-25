<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recovery;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RecoveryController extends Controller
{
    public function achievement()
    {
        $datas = Recovery::where('user_id', Auth::id())
                ->select('date')
                ->selectRaw('SUM(bet) as bet')
                ->selectRaw('SUM(refund) as refund')
                ->groupBy('date')
                ->latest('date')->get();
        $years = Recovery::where('user_id', Auth::id())
                ->select('year')
                ->selectRaw('SUM(bet) as bet')
                ->selectRaw('SUM(refund) as refund')
                ->groupBy('year')
                ->latest('year')->get();
        return view('keiba.achievement', compact('datas', 'years'));
    }
    public function achieveCreate(Request $request)
    {
        Recovery::create([
            'user_id' => Auth::id(),
            'year' => Carbon::now()->format('Y'),
            'date' => Carbon::now()->format('Y-m'),
            'bet' => $request->bet,
            'refund' => $request->refund
        ]);
        return back();
    }
}

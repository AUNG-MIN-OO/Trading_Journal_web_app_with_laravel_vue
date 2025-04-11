<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TradeController extends Controller
{
    public function show(){
        return inertia::render('Trades/Show',[
            'trades' => Trade::with('strategyRules')->get()
        ]);
    }
}

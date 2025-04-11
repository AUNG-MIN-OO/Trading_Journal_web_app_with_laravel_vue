<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $initialBalance = (float) $user->balance;

        // Group trades by date and sum profit
        $dailyProfits = $user->trades()
            ->selectRaw('DATE(date) as trade_date, SUM(profit) as daily_profit')
            ->groupBy('trade_date')
            ->orderBy('trade_date')
            ->get();

        $runningBalance = $initialBalance;
        $balanceHistory = [];

        // Optional: show starting balance before any trades
        if ($dailyProfits->count() > 0) {
            $firstDate = $dailyProfits->first()->trade_date;
            $balanceHistory[] = [
                'date' => date('Y-m-d', strtotime($firstDate . ' -1 day')),
                'balance' => round($runningBalance, 2),
            ];
        }

        // Accumulate profit over time
        foreach ($dailyProfits as $daily) {
            $runningBalance += (float) $daily->daily_profit;
            $balanceHistory[] = [
                'date' => $daily->trade_date,
                'balance' => round($runningBalance, 2),
            ];
        }

        //Getting monthly profits
        // Group trades by month and sum profits
        $monthlyProfits = $user->trades()
            ->selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(profit) as total_profit")
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(fn ($item) => [
                'month' => $item->month,
                'profit' => round($item->total_profit, 2),
            ]);


        return Inertia::render('Dashboard', [
            'balanceHistory' => $balanceHistory,
            'monthlyProfits' => $monthlyProfits,
            'stats' => [
                'balance' => ($user->trades()->sum('profit')+$user->balance),
                'profit' => $user->trades()->sum('profit'),
                'winRate' => $user->trades()->count() > 0
                    ? round($user->trades()->where('outcome', 'win')->count() / $user->trades()->count() * 100, 2)
                    : 0,
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\StrategyRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class StrategySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $strategies = [
            'Bollinger Band Breakout',
            'Big shadow candle',
            'Band direction',
            'Not narrow band',
            'Stop hunt'
        ];

        foreach ($strategies as $name) {
            StrategyRule::firstOrCreate(['name' => $name, 'user_id' => 1]);
        }
    }
}

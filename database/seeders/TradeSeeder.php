<?php

namespace Database\Seeders;

use App\Models\StrategyRule;
use App\Models\Trade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $strategyRules = StrategyRule::all();

        $trades = [
            [
                'date' => now()->subDays(2),
                'symbol' => 'XAUUSD',
                'entry_price' => 3000,
                'stop_loss_price' => 2995,
                'profit_target_price' => 3035,
                'type' => 'buy',
                'outcome' => 'win',
                'profit' => 10000
            ],
            [
                'date' => now()->subDays(2),
                'symbol' => 'EURUSD',
                'entry_price' => 3000,
                'stop_loss_price' => 2995,
                'profit_target_price' => 3035,
                'type' => 'buy',
                'outcome' => 'lose',
                'profit' => 8000
            ],
            [
                'date' => now()->subDays(2),
                'symbol' => 'CADUSD',
                'entry_price' => 3000,
                'stop_loss_price' => 2995,
                'profit_target_price' => 3035,
                'type' => 'buy',
                'outcome' => 'win',
                'profit' => 10000
            ],
        ];
        foreach ($trades as $trade) {
            $trade = Trade::create(array_merge($trade, ['user_id' => 1]));

            $strategyRules->shuffle()->take(rand(3, 5))->each(function ($rule) use ($trade) {
                $trade->strategyRules()->attach($rule->id, [
                    'followed' => (bool)random_int(0, 1),
                ]);
            });
        }
    }
}

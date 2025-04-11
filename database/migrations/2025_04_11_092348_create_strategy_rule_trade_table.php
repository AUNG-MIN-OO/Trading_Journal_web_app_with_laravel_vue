<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('strategy_rule_trade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trade_id')->constrained('trades');
            $table->foreignId('strategy_rule_id')->constrained('strategy_rules');
            $table->boolean('followed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strategy_rule_trade');
    }
};

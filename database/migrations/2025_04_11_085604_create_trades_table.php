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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('date');
            $table->string('symbol');
            $table->decimal('entry_price');
            $table->decimal('stop_loss_price');
            $table->decimal('profit_target_price');
            $table->enum('type', ['buy', 'sell']);
            $table->enum('outcome', ['win', 'lose', 'breakeven']);
            $table->decimal('profit')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};

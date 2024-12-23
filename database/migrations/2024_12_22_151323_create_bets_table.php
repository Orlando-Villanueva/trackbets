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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bet_slip_id')->constrained()->onDelete('cascade');
            $table->string('match');
            $table->string('bet_type');        // 1X2, over/under, etc
            $table->string('selection');        // home, away, draw, over 2.5, etc
            $table->decimal('odds', 10, 2);
            $table->string('status')->default('pending');  // pending, won, lost
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('bets');
    }
};

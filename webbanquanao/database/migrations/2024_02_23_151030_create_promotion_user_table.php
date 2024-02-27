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
        Schema::create('promotion_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::table('promotion_user',function (Blueprint $table){
            $table->foreignId('promotion_id')->constrained('promotion');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_user');
    }
};

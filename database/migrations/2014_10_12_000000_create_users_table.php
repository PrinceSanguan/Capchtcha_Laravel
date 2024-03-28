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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('work');
            $table->string('address');
            $table->string('gender');
            $table->string('password');
            $table->string('number');
            $table->string('image');
            $table->integer('point')->default(0);
            $table->integer('trial')->default(5);
            $table->integer('trialLevel')->nullable();
            $table->enum('status', [0, 1])->default(0);
            $table->enum('type', ['programmer', 'player'])->nullable();
            $table->enum('promo1', ['activate', 'deactivate', 'pending'])->default('deactivate');
            $table->enum('promo2', ['activate', 'deactivate', 'pending'])->default('deactivate');
            $table->enum('promo3', ['activate', 'deactivate', 'pending'])->default('deactivate');
            $table->enum('promo4', ['activate', 'deactivate', 'pending'])->default('deactivate');
            $table->enum('promo5', ['activate', 'deactivate', 'pending'])->default('deactivate');
            $table->enum('promo6', ['activate', 'deactivate', 'pending'])->default('deactivate');
            $table->enum('level', ['easy', 'hard'])->default('easy');
            $table->unsignedBigInteger('referral_id')->nullable();
            $table->timestamps();

            // Add foreign key constraint for referral_id
            $table->foreign('referral_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

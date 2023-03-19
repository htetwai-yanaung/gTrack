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
            $table->string('company_name')->nullable();

            $table->string('company_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('license')->nullable();
            $table->enum('status',['0','1'])->default('0');

            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'client', 'driver'])->default('driver');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
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

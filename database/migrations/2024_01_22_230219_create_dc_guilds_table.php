<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dc_guilds', function (Blueprint $table) {
            $table->id();

            $table->text('guild_id')->unique();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dc_guilds');
    }
};

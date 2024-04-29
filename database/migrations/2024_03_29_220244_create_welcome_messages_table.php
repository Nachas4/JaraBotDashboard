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
        Schema::create('welcome_messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dc_guild_id')->constrained()->onDelete('cascade');
            $table->tinyText('channel_id');
            $table->tinyText('message');
            $table->tinyText('bg_image')->default('WM_placeholder.png');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_messages');
    }
};

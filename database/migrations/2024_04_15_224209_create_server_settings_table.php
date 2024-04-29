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
        Schema::create('server_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dc_guild_id')->constrained()->onDelete('cascade');
            $table->boolean('auto_responses_enabled')->default(false);
            $table->boolean('quotes_enabled')->default(true);
            $table->boolean('pickups_enabled')->default(true);
            $table->boolean('welcome_messages_enabled')->default(false);
            $table->boolean('mod_message_channels_enabled')->default(false);
            $table->boolean('blacklist_enabled')->default(true);
            $table->boolean('auto_roles_enabled')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_settings');
    }
};

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
            $table->boolean('auto_responses_enabled');
            $table->boolean('auto_messages_enabled');
            $table->boolean('quotes_enabled');
            $table->boolean('welcome_messages_enabled');
            $table->boolean('mod_message_channels_enabled');
            $table->boolean('mod_roles_enabled');
            $table->boolean('moderators_enabled');
            $table->boolean('blacklist_enabled');

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

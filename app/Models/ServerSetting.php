<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerSetting extends Model
{
    use HasFactory, SoftDeletes;

    public function dc_guild(): BelongsTo
    {
        return $this->belongsTo(DcGuild::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dc_guild_id',
        'auto_responses_enabled',
        'quotes_enabled',
        'welcome_messages_enabled',
        'mod_message_channels_enabled',
        'quarantine_enabled',
        'moderators_enabled',
        'blacklist_enabled',
        'auto_roles_enabled'
    ];
}

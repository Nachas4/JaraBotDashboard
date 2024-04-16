<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class DcGuild extends Model
{
    use HasFactory, SoftDeletes;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function modmessagechannels(): HasOne
    {
        return $this->hasOne(ModMessageChannel::class);
    }

    public function modroles(): HasOne
    {
        return $this->hasOne(ModRole::class);
    }

    public function welcomemessage(): HasOne
    {
        return $this->hasOne(WelcomeMessage::class);
    }

    public function serversetting(): HasOne
    {
        return $this->hasOne(ServerSetting::class);
    }

    public function blacklist(): HasOne
    {
        return $this->hasOne(Blacklist::class);
    }

    public function autoresponses(): HasMany
    {
        return $this->hasMany(AutoResponse::class);
    }

    public function automessages(): HasMany
    {
        return $this->hasMany(AutoMessage::class);
    }

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function moderators(): HasMany
    {
        return $this->hasMany(Moderator::class);
    }

    public function autoroles(): HasMany
    {
        return $this->hasMany(AutoRole::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'guild_id',
        'name',
        'icon',
        'owner_id'
    ];
}

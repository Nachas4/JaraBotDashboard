<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DcGuild extends Model
{
    use HasFactory, SoftDeletes;

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, 'owner_id');
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

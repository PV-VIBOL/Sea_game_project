<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Event;


class competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_a',
        'team_b',
        'event_id',
    ];

    // public function event(){
    //     return $this->hasMany(Event::class);
    // }
    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

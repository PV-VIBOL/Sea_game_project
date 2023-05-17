<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Event;


class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'zone',
        'event_id',
    ];

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

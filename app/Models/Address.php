<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Event;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_address',
        'zone_a',
        'zone_b',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

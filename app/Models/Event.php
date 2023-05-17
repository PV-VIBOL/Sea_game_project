<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Sport;
use App\Models\Ticket;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'sport_id',
        'address_id',
    ];

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function sports()
    {
        return $this->belongsTo(Sport::class);
    }

    public function addresses()
    {
        return $this->belongsTo(Address::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Event;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'name_sport',
    ];

    public function events()
    {
        return $this->hasOne(Event::class);
    }
}

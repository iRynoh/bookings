<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $casts = [
        'date'       => 'datetime',
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    public function unavailabilities(): HasMany
    {
        return $this->hasMany(ScheduleUnavailability::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pokemon extends Model
{
    protected $fillable = [
        'name',
        'type',
        'power',
        'coach_id'
    ];

    public function coach():BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title', 'start_day', 'end_day','start_time','end_time'
    ];
    public function group(): BelongsTo
    {
        return $this->belongsTo('Group::class','group_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo('User::class','owner_id');
    }

}

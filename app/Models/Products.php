<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Products extends Model
{
    use HasFactory,HasApiTokens;
    public $timestamps = false;

    protected $table= 'products';
    protected $fillable = [
        'name',
        'amount',
        'status'
    ];
    protected $casts = [
        'id' => 'integer',
        'group_id' => 'integer',

    ];
    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Group', 'group_id');
    }


}

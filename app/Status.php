<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Status extends Model
{
    protected $fillable = [
        'status', 'changeDate'
    ];

    //status belongs to order
    public function order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }

}

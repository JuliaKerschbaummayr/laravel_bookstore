<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'userId', 'orderDate', 'price'
    ];

    //many books for one order
    public function books() : BelongsToMany {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}

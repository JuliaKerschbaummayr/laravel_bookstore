<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'orderDate', 'price'
    ];

    //many books for one order
    public function books() : BelongsToMany {
        return $this->belongsToMany(Book::class)->withPivot('amount')->withTimestamps();
    }

    //order has many statuses
    public function statuses() : HasMany {
        return $this->hasMany(Status::class);
    }

    //order belongs to user
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    protected $fillable = [
        'firstName', 'lastName'
    ];

    //many books for one author
    public function books() : BelongsToMany {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}

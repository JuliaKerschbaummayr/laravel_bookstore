<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    /*public function isFavourite() {
        return $this->rating >= 8;
    }*/

    //welche Felder geändert werden dürfen
    protected $fillable = ['isbn', 'title', 'subtitle', 'price', 'published', 'rating', 'description', 'user_id'];

    //QueryScopes
    public function scopeFavourite($query) {
        return $query->where('rating', '>=', 8);
    }

    //book has many images
    public function images() : HasMany {
        return $this->hasMany(Image::class);
    }

    //book is assigned to user
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    //many authors for book
    public function authors() : BelongsToMany {
        return $this->belongsToMany(Author::class);
    }

    //many orders for book
    public function orders() : BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
}

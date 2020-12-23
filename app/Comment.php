<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    //

    # One-to-Many inverse relation with User model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    # One-to-Many inverse relation with Post model.
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}

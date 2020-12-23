<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $table = 'votes';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->belongsTo(User::class);
    }

}

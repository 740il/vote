<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'answers';

//    protected $fillable = ['question_id', 'answer_id', 'ansone','anstwo'];

    protected $guarded = [];



    public function user() {
        return $this->hasMany(User::class);
    }




    public function questions() {
        return $this->belongsTo(Question::class);
    }



}

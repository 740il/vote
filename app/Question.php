<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';

//    protected $fillable = [
//        'answerone', 'question' ,'answertwo','answerthree' ,'user_id'
//    ];

    protected $guarded = [];

//    public function answers() {
//
//        return $this->belongsToMany(Answer::class,'question_answer');
//    }





//    public function answers() {
//
//        return $this->belongsToMany(Answer::class,'question_answer');
//    }



    public function user() {
        return $this->belongsTo(User::class);
    }



    public function answers() {

        return $this->hasMany(Answer::class);

    }



}

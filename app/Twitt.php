<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitt extends Model {


    protected $table = 'twitts';
    protected $fillable = ['twitt', 'user_id'];



    public function likes() {
        return $this->hasMany('App\TwittLike');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}

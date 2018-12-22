<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwittLike extends Model {


    protected $table = 'twitt_likes';
    protected $fillable = ['twitt_id', 'user_id'];


}

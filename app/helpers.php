<?php

use App\Twitt;
use App\TwittLike;

function likeDislikeIcon($twitt_id,$user_id)
{
    $TwittLike = TwittLike::where('user_id', $user_id)->where('twitt_id', $twitt_id)->first();
    if ($TwittLike) {
        return '<span style="color:#FF0000" class="glyphicon glyphicon-heart"></span>' ;

    } else {
        return '<span style="color:#000000" class="glyphicon glyphicon-heart-empty"></span>' ;
    }


}

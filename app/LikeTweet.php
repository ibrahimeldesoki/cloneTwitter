<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeTweet extends Model
{
    protected $fillable = ['tweet_id', 'user_id'];
}

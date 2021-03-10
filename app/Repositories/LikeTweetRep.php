<?php

namespace App\repositories;

use App\Entities\LikeTweetEntity;
use App\LikeTweet;

class LikeTweetRep
{
    private $likeTweet;

    public function __construct(LikeTweet $likeTweet)
    {
        $this->likeTweet = $likeTweet;
    }

    public function create(LikeTweetEntity $likeTweetEntity)
    {
        $attributes = [];
        $attributes['user_id'] = $likeTweetEntity->getUser()->getId();
        $attributes['tweet_id'] = $likeTweetEntity->getTweet()->getId();
        $like = $this->likeTweet->create($attributes);
        $likeTweetEntity->setId($like->id);
        // dd($likeTweetEntity);
        return $likeTweetEntity;
    }

    public function liked(LikeTweetEntity $likeTweetEntity)
    {
        return $this->likeTweet->where('user_id', $likeTweetEntity->getUser()->getId())->where('tweet_id', $likeTweetEntity->getTweet()->getId())->exists();
    }

    public function countLikes($tweetId)
    {
        return $this->likeTweet->where('tweet_id', $tweetId)->get()->count();
    }
}

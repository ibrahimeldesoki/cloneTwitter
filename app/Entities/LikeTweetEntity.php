<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class LikeTweetEntity implements Arrayable, JsonSerializable
{
    private $id;
    private $user_id;
    private $tweet_id;

    public function toArray()
    {
        $array = [];
        $array['id'] = $this->id;
        $array['tweet_id'] = $this->getTweetId();
        $array['user_id'] = $this->getUserId();

        return $array;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUserId(UserEntity $userEntity)
    {
        $this->user_id = $userEntity;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setTweetId(TweetEntity $tweetEntity)
    {
        $this->tweet_id = $tweetEntity;
    }

    public function getTweetId()
    {
        return $this->tweet_id;
    }
}

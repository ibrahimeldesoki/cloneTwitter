<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class LikeTweetEntity implements Arrayable, JsonSerializable
{
    private $id;
    private $userEntity;
    private $tweetEntity;

    public function toArray()
    {
        $array = [];
        $array['id'] = $this->id;
        $array['tweet'] = $this->getTweet();
        $array['user'] = $this->getUser();

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

    public function setUser(UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    public function getUser()
    {
        return $this->userEntity;
    }

    public function setTweet(TweetEntity $tweetEntity)
    {
        $this->tweetEntity = $tweetEntity;
    }

    public function getTweet()
    {
        return $this->tweetEntity;
    }
}

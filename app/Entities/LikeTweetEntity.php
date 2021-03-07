<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class LikeTweetEntity implements Arrayable, JsonSerializable
{
    private $id;
    private $UserEntity;
    private $tweetEntity;

    public function toArray()
    {
        $array = [];
        $array['id'] = $this->id;
        $array['tweetEntity'] = $this->getTweetEntity();
        $array['UserEntity'] = $this->getUserEntity();

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

    public function setUserEntity(UserEntity $userEntity)
    {
        $this->UserEntity = $userEntity;
    }

    public function getUserEntity()
    {
        return $this->UserEntity;
    }

    public function setTweetId(TweetEntity $tweetEntity)
    {
        $this->tweetEntity = $tweetEntity;
    }

    public function getTweetEntity()
    {
        return $this->tweetEntity;
    }
}

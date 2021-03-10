<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class SearchTweetEntity implements Arrayable, JsonSerializable
{
    private $id;
    private $searchTweet;

    public function toArray()
    {
        $array = [];
        $array['id'] = $this->getId();
        $array['search_tweet'] = $this->getSearchTweet();

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

    public function setSearchTweet(TweetEntity $tweetEntity)
    {
        $this->searchTweet = $tweetEntity;
    }

    public function getSearchTweet()
    {
        return $this->searchTweet;
    }
}

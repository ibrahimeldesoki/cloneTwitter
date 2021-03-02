<?php
namespace App\repositories;

use App\Entities\TweetEntity;
use App\Tweet;

class TweetRepository
{
    private $tweet ;
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }
    public function store(TweetEntity $tweetEntity)
    {
        $attributes = [];
        $attributes['content'] = $tweetEntity->getContent();
        $attributes['image'] = $tweetEntity->getImage();
        $attributes['user_id'] = $tweetEntity->getUserId();
        $tweet = $this->tweet->create($attributes);
        $tweetEntity->setId($tweet->id);
        return $tweetEntity;
    }
}

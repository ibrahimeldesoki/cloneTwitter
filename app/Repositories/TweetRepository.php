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
    public function find($tweet_id)
    {
        $tweet = $this->tweet->find($tweet_id);
        $tweetEntity = new TweetEntity ;
        $tweetEntity->setId($tweet->id);
        $tweetEntity->setImage($tweet->image);
        $tweetEntity->setContent($tweet->content);
        $tweetEntity->setUserId($tweet->user_id);

        return $tweetEntity;
    }
}

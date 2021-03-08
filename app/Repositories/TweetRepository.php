<?php

namespace App\repositories;

use App\Entities\TweetEntity;
use App\Services\UserService;
use App\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetRepository
{
    private $tweet;
    private $userService;

    public function __construct(Tweet $tweet, UserService $userService)
    {
        $this->tweet = $tweet;
        $this->userService = $userService;
    }

    public function store(TweetEntity $tweetEntity)
    {
        $attributes = [];
        $attributes['content'] = $tweetEntity->getContent();
        $attributes['image'] = $tweetEntity->getImage();
        $attributes['user_id'] = $tweetEntity->getUser();
        $tweet = $this->tweet->create($attributes);
        $tweetEntity->setId($tweet->id);

        return $tweetEntity;
    }

    public function find($tweet_id)
    {
        $tweet = $this->tweet->find($tweet_id);
        $tweetEntity = new TweetEntity();
        $tweetEntity->setId($tweet->id);
        $tweetEntity->setImage($tweet->image);
        $tweetEntity->setContent($tweet->content);
        $tweetEntity->setUser($this->userService->find($tweet->user_id));

        return $tweetEntity;
    }
}

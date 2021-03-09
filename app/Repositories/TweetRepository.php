<?php

namespace App\repositories;

use App\Entities\SearchTweetEntity;
use App\Entities\TweetEntity;
use App\Services\TweetService;
use App\Services\UserService;
use App\Tweet;

class TweetRepository
{
    private $tweet;
    private $userService;
    private $tweetService;

    public function __construct(Tweet $tweet, UserService $userService, TweetService $tweetService)
    {
        $this->tweet = $tweet;
        $this->userService = $userService;
        $this->tweetService = $tweetService;
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

    public function search(string $searchTweet)
    {
        $tweet = $this->tweet->whereLike('content', $searchTweet)->get();
        $searchTweetEntity = new SearchTweetEntity();
        $searchTweetEntity->setId($tweet->id);
        $searchTweetEntity->setSearchTweet($this->tweetService->find($tweet->id));

        return  $searchTweetEntity;
    }
}

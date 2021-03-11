<?php

namespace App\repositories;

use App\Entities\SearchTweetEntity;
use App\Entities\TweetEntity;
use App\Repositories\UserRepository;
use App\Tweet;
use Illuminate\Support\Facades\Cache;

class TweetRepository
{
    private $tweet;
    private $userRepository;

    public function __construct(Tweet $tweet, userRepository $userRepository)
    {
        $this->tweet = $tweet;
        $this->userRepository = $userRepository;
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
        $tweet = Cache::remember('find_tweet', 60 * 60 * 24, function () use ($tweet_id) {
            return $this->tweet->find($tweet_id);
        });
        $tweet = $this->tweet->find($tweet_id);
        $tweetEntity = new TweetEntity();
        $tweetEntity->setId($tweet->id);
        $tweetEntity->setImage($tweet->image);
        $tweetEntity->setContent($tweet->content);
        $tweetEntity->setUser($this->userRepository->find($tweet->user_id));

        return $tweetEntity;
    }

    public function search(string $searchTweet)
    {
        $tweets = $this->tweet->where('content', 'LIKE', '%'.$searchTweet.'%')->get();
        $entities = [];
        foreach ($tweets as $tweet) {
            $searchTweetEntity = new SearchTweetEntity();
            $searchTweetEntity->setId($tweet->id);
            $searchTweetEntity->setSearchTweet($this->find($tweet->id));
            $entities[] = $searchTweetEntity;
        }

        return  $entities;
    }

    public function timeline($followingUsers)
    {
        $tweets = Cache::remember('tweets', 60 * 60 * 24, function () use ($followingUsers) {
            return   $this->tweet->withCount('likes')->whereIn('user_id', $followingUsers)->orderBy('created_at', 'desc')->get();
        });
        $tweetEntities = [];
        foreach ($tweets as $tweet) {
            $tweetEntity = new TweetEntity();
            $tweetEntity->setId($tweet->id);
            $tweetEntity->setContent($tweet->content);
            $tweetEntity->setImage($tweet->image);
            $tweetEntity->setUser($this->userRepository->find($tweet->user_id));
            $tweetEntity->setLikeCount($tweet->likes_count);
            $tweetEntities[] = $tweetEntity;
        }

        return $tweetEntities;
    }
}

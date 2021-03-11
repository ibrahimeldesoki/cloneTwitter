<?php

namespace App\Repositories;

use App\Entities\SearchTweetEntity;
use App\Entities\TweetEntity;
use App\Tweet;

class TweetRepository implements TweetRepositoryInterface
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

    protected function findOne(int $id) {
        return $this->tweet->findOrFail($id);
    }

    public function find(int $tweet_id)
    {
        $tweet = $this->findOne($tweet_id);
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

    protected function getTimeLineTweets(array $ids) {
        return $this->tweet->withCount('likes')->whereIn('user_id', $ids)->orderBy('created_at', 'desc')->get();
    }

    public function timeline(array $ids)
    {
        $tweets = $this->getTimeLineTweets($ids);
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

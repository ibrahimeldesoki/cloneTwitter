<?php

namespace App\Repositories;

use App\Entities\TweetEntity;

interface TweetRepositoryInterface
{
    public function store(TweetEntity $tweetEntity);

    public function find(int $tweetId);

    public function search(string $searchTweet);

    public function timeline(array $ids);
}

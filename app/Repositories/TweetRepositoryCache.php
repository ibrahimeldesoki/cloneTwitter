<?php

namespace App\Repositories;

use App\Tweet;
use Illuminate\Cache\CacheManager;

class TweetRepositoryCache extends TweetRepository
{

    /**
     * @var CacheManagerInterface
     */
    private $cacheManager;

    public function __construct(CacheManager $cacheManager, Tweet $tweet, userRepository $userRepository)
    {
        parent::__construct($tweet, $userRepository);

        $this->cacheManager = $cacheManager;
    }

    protected function findOne(int $id)
    {
        return $this->cacheManager->remember('tweet.'.$id, 60 * 60 * 24, function () use ($id) {
            return parent::findOne($id);
        });
    }

    protected function getTimeLineTweets(array $ids)
    {
        return $this->cacheManager->remember('tweet.'.implode('_', $ids), 60 * 60 * 24, function () use ($ids) {
            return parent::getTimeLineTweets($ids);
        });
    }
}

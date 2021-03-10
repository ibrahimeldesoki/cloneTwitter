<?php

namespace  App\Services;

use App\Entities\TweetEntity;
use App\repositories\LikeTweetRep;
use App\repositories\TweetRepository;

class TweetService
{
    private $tweetRep;
    private $likeTweetRep;
    public function __construct(TweetRepository $tweetRep , LikeTweetRep $likeTweetRep)
    {
        $this->tweetRep = $tweetRep;
        $this->likeTweetRep = $likeTweetRep;
    }

    public function create(TweetEntity $tweetEntity)
    {
        if ($tweetEntity->getImage() != null) {
            $imageName = time().'.'.$tweetEntity->getImage()->getClientOriginalExtension();
            $destinationPath = 'upload/images';
            $imagePath = $destinationPath.'/'.$imageName;
            $tweetEntity->getImage()->move(public_path($destinationPath), $imageName);
            $tweetEntity->setImage($imagePath);
        }

        return $this->tweetRep->store($tweetEntity);
    }

    public function find($tweet_id)
    {
        return $this->tweetRep->find($tweet_id);
    }

    public function search(string $searchTweet)
    {
        return $this->tweetRep->search($searchTweet);
    }
    public function timeline($followingUsers)
    {
        return $this->tweetRep->timeline($followingUsers);
    }
}

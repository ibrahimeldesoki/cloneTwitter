<?php

namespace  App\Services;

use App\Entities\LikeTweetEntity;
use App\repositories\LikeTweetRep;

class LikeTweetService
{
    private $likeTweetRep;

    public function __construct(LikeTweetRep $likeTweetRep)
    {
        $this->likeTweetRep = $likeTweetRep;
    }

    public function create(LikeTweetEntity $likeTweetEntity)
    {
        $likedTweet = $this->likeTweetRep->liked($likeTweetEntity);
        if ($likedTweet != null) {
            return 'U liked this tweet before';
        }

        return $this->likeTweetRep->create($likeTweetEntity);
    }
}

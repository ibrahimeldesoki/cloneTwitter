<?php

namespace App\repositories;

use App\Entities\FollowEntity;
use App\Follow;

class FollowRepository
{
    private $follow;

    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }

    public function follow(FollowEntity $followEntity)
    {
        $attributes = [];
        $attributes['follower_user_id'] = $followEntity->getFollowerUserId()->getId();
        $attributes['following_user_id'] = $followEntity->getFollowingUserId()->getId();
        $follow = $this->follow->create($attributes);
        $followEntity->setId($follow->id);

        return $followEntity;
    }
}

<?php
namespace App\repositories;

use App\Entities\FollowEntity;
use App\Follow;

class FollowRepository
{
    private $follow ;
    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }
    public function follow(FollowEntity $followEntity)
    {
        $follow = $this->follow->create($followEntity->toArray());
        $followEntity->setId($follow->id);
        return $followEntity ;
    }
}

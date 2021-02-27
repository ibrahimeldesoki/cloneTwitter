<?php
namespace  App\Services;

use App\Entities\FollowEntity;
use App\repositories\FollowRepository;

class FollowService
{
    private $followRepository ;
    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
    }
    public function follow(FollowEntity $followEntity)
    {
        // dd("gdf");
        return $this->followRepository->follow($followEntity);
    }
}

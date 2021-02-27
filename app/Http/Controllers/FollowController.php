<?php
namespace App\Http\Controllers;

use App\Entities\FollowEntity;
use App\Http\Requests\FollowRequest;
use App\Services\FollowService;

class FollowController extends Controller
{
    private $followService ;
    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }
    public function follow(FollowRequest $followRequest)
    {
        $followEntity = new FollowEntity;
        $followEntity->setFollowingUserId($followRequest->follower_user_id);
        $followEntity->setFollowerUserId($followRequest->following_user_id);
        return $this->followService->follow($followEntity);
    }
}

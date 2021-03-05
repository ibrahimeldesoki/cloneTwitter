<?php

namespace App\Http\Controllers;

use App\Entities\FollowEntity;
use App\Http\Requests\FollowRequest;
use App\Services\FollowService;
use App\Services\UserService;

class FollowController extends Controller
{
    private $followService;
    private $userService;

    public function __construct(FollowService $followService, UserService $userService)
    {
        $this->followService = $followService;
        $this->userService = $userService;
    }

    public function follow(FollowRequest $followRequest)
    {
        $followEntity = new FollowEntity();
        $followEntity->setFollowingUserId($this->userService->find($followRequest->follower_user_id));
        $followEntity->setFollowerUserId($this->userService->find($followRequest->following_user_id));

        return $this->followService->follow($followEntity);
    }
}

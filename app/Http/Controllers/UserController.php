<?php

namespace App\Http\Controllers;

use App\Entities\UserEntity;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService =  $userService;
    }

    public function store(UserRequest $userRequest)
    {
        $userEntity =  new UserEntity;

        $userEntity->setName($userRequest->name);
        $userEntity->setEmail($userRequest->email);
        $userEntity->setPassword($userRequest->password);
        return $this->userService->create($userEntity);
    }
}

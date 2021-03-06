<?php

namespace App\Services;

use App\Entities\UserEntity;
use App\repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->userRepository = $UserRepository;
    }

    public function create(UserEntity $userEntity)
    {
        $userEntity->setPassword(Hash::make($userEntity->getPassword()));

        return $this->userRepository->register($userEntity);
    }

    public function find($user_id)
    {
        return $this->userRepository->find($user_id);
    }

    public function followingUsers($userId)
    {
        return $this->userRepository->followingUsers($userId);
    }
}

<?php
namespace App\repositories;

use App\Entities\UserEntity;
use App\User;

class UserRepository
{
    private $user ;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function register(UserEntity $userEntity)
    {
        $user = $this->user->create($userEntity->toArray());
        $userEntity->setId($user->id) ;
        return $userEntity;

    }
}

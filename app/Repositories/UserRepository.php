<?php
namespace App\repositories;

use App\User;

class UserRepository
{
    private $user ;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function register($userEntity)
    {
        $attributes = [];
        $attributes['name'] = $userEntity->getName();
        $attributes['password'] = $userEntity->getPassword();
        $attributes['email'] = $userEntity->getEmail();
        $user = $this->user->create($attributes);
        $userEntity->setId($user->id) ;
        return $userEntity;

    }
}

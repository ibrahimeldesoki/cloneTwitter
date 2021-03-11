<?php

namespace App\repositories;

use App\Entities\UserEntity;
use App\User;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(UserEntity $userEntity)
    {
        $user = $this->user->create($userEntity->toArray());
        $userEntity->setId($user->id);

        return $userEntity;
    }

    public function find($user_id)
    {
        $user = Cache::remember('find_tweet', 60 * 60 * 24, function() use($user_id){
            return $this->user->find($user_id);
       });
        $userEntity = new UserEntity();
        $userEntity->setId($user->id);
        $userEntity->setName($user->name);
        $userEntity->setEmail($user->email);

        return $userEntity;
    }

    public function followingUsers($user_id)
    {
        return   $this->user->find($user_id)->following()->pluck('following_user_id');
    }
}

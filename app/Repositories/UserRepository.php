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
    public function register($attributes)
    {
     $user =   $this->user->create($attributes);
     dd($user);
    }
}

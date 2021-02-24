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
    public  function create(UserEntity $userEntity)
    {
        $attributes = [];
        $attributes['name'] = $userEntity->getName();
        $attributes['password'] = Hash::make($userEntity->getPassword());
        $attributes['email'] = $userEntity->getEmail();

        return $this->userRepository->register($attributes);
    }

}

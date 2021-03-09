<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class FollowEntity implements Arrayable, JsonSerializable
{
    private $follower_user_id ;
    private $following_user_id;
    public function toArray()
    {
        $array = [];
        $array['follower_user_id'] = $this->getFollowerUserId();
        $array['following_user_id'] = $this->getFollowingUserId();
        return $array;
    }
    public function jsonSerialize()
    {
        return $this->toArray();
    }
    public function setId($id)
    {
        $this->id = $id ;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setFollowerUserId(UserEntity $userEntity)
    {
        $this->follower_user_id = $userEntity;
    }
    public function getFollowingUserId()
    {
        return  $this->follower_user_id;
    }
    public function setFollowingUserId(UserEntity $userEntity)
    {
        $this->following_user_id = $userEntity;
    }
    public function getFollowerUserId()
    {
        return  $this->following_user_id;
    }
}

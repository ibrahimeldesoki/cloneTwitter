<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class FollowEntity implements Arrayable
{
    private $follower_user_id ;
    private $following_user_id;
    public function toArray()
    {
        $array = [];
        $array['follower_user_id'] = $this->follower_user_id;
        $array['following_user_id'] = $this->following_user_id;
        return $array;
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
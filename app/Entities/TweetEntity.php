<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class TweetEntity implements Arrayable, JsonSerializable
{
    private $id;
    private $content;
    private $image;
    private $user;
    private $likeCount;
    public function toArray()
    {
        $array = [];
        $array['id'] = $this->getId();
        $array['content'] = $this->getContent();
        $array['image'] = $this->getImage();
        $array['user'] = $this->getUser();
        $array['like_count'] = $this->getLikeCount();
        return $array;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setUser(UserEntity $userEntity)
    {
        $this->user = $userEntity;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function setLikeCount($likeCount)
    {
        $this->likeCount =$likeCount;
    }
    public function getLikeCount()
    {
        return $this->likeCount;
    }
}

<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class TweetEntity implements Arrayable, JsonSerializable
{
    private $id;
    private $content;
    private $image;
    private $userId;

    public function toArray()
    {
        $array = [];
        $array['id'] = $this->getId();
        $array['content'] = $this->getContent();
        $array['image'] = $this->getImage();
        $array['user_id'] = $this->getUserId();

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

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}

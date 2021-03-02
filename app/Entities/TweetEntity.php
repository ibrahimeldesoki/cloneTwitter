<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class TweetEntity implements Arrayable
{
    private $id ;
    private $content ;
    private $image ;
    private $userId;
    public function toArray()
    {
        $array = [];
        $array['id'] = $this->id;
        $array['content'] = $this->content;
        $array['image'] = $this->image;
        $array['userId'] = $this->userId;
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
    public function setContent($content)
    {
        $this->content = $content ;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setImage($image)
    {
        $this->image = $image ;
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

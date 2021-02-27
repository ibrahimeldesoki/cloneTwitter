<?php
namespace App\Entities;

class TweetEntity
{
    private $id , $content , $image , $userId;
    public function setId($id)
    {
        $this->id = $id ;
    }
    public function  getId()
    {
        return $this->id;
    }
    public function setContent($content)
    {
        $this->content = $content ;
    }
    public function  getContent()
    {
        return $this->content;
    }
    public function setImage($image)
    {
        $this->image = $image ;
    }
    public function  getImage()
    {
        return $this->image;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function  getUserId()
    {
        return $this->userId;
    }

}

<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class UserEntity implements Arrayable
{
    private $id ;
    private $name ;
    private $email ;
    private $password;
    public function toArray()
    {
        $array = [];
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['email'] = $this->email;
        $array['password'] = $this->password;
        return $array;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
}

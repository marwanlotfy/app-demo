<?php
namespace Mocked\Domain\Users;

class User
{
    private $id;
    private $name;
    private $age;
    private $email;
    private $password;

    public function getId() { return $this->id; }

    public function getName() { return $this->name; }

    public function getAge() { return $this->age; }

    public function getEmail() { return $this->email; }

    public function getPassword() { return $this->password; }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}

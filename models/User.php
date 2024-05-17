<?php
class User
{
    private $id;
    private $name;
    private $lastname;
    private $password;
    private $email;
    private $rol;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

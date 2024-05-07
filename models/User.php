<?php
class User
{
    private $username;
    private $password;
    private $email;
    private $identity;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

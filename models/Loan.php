<?php
class Loan
{
    private $username;
    private $password;
    private $email;
    private $token;
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return null;
        }
    }
    public function __set($name, $value)
    {
        return $this->$name = $value;
    }
}

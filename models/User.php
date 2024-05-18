<?php
class User
{
    private $id;
    private $name;
    private $lastname;
    private $password;
    private $email;
    private $rol;

 // Getter and Setter methods

    public function __get($property) {
    if (property_exists($this, $property)) {
        return $this->$property;
    }
}

public function __set($property, $value) {
    if (property_exists($this, $property)) {
        $this->$property = $value;
    }
}

public function validation () {
    $errors = [];

    if (empty($this->name) || strlen($this->name) > 255) {
        $errors[] = "Name is required and must be less than 255 characters.";
    }
}
}

<?php
class Loan
{
    private $id;
    private $book_id;
    private $user_id;
    private $status;
    private $token;
    private $loan_date;
    private $expected_return_date;
    private $return_date;

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
}

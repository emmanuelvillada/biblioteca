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

<<<<<<< HEAD
<?php
class Book
{
    private $id;
    private $title;
    private $description;
    private $author;
    private $publicationDate;
    private $publisher;

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
        $this->$name = $value;
    }
}
=======
<?php 
class Book {

    private $id;
    private $author;
    private $isbn;
    
}
>>>>>>> d0172122c87f6ddcb20f93030bbfdb305921ba20

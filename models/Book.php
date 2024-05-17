<?php
class Book
{
    private $id;
    private $publication_year;
    private $title;
    private $author;
    private $availability;
    private $editorial;
    private $genre;


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

// Validation methods
public function validate() {
    $errors = [];

    if (empty($this->title) || strlen($this->title) > 255) {
        $errors[] = "Title is required and must be less than 255 characters.";
    }

    if (empty($this->author) || strlen($this->author) > 255) {
        $errors[] = "Author is required and must be less than 255 characters.";
    }

    if (empty($this->publication_year) || !$this->validateDate($this->publication_year)) {
        $errors[] = "Publication year is required and must be a valid date.";
    }

    if (empty($this->editorial) || strlen($this->editorial) > 255) {
        $errors[] = "Editorial is required and must be less than 255 characters.";
    }

    if (empty($this->genre) || strlen($this->genre) > 255) {
        $errors[] = "Genre is required and must be less than 255 characters.";
    }

    return $errors;
}

private function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
}

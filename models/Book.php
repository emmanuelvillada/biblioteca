<<<<<<< HEAD <?php
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

<?php
class db_connection
{
    private $pdo;

    public function __construct()
    {
        // Initialize your PDO connection here
        $this->pdo = new PDO('biblioteca', 'root', '1903');
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}

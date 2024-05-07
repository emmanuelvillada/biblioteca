<?php
class db_connection
{

    private $connection;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "biblioteca";
    public $pdo;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $this->connection;
    }
}

<?php


class Repository
{

    protected $connection;

    public function __construct()
    {
        require __DIR__ . '/../public/config.php';
        try {

            $this->connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

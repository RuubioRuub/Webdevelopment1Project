<?php
require __DIR__ . '/Repository.php';
require __DIR__ . '/../model/game.php';

class HomeRepository extends Repository
{
    public function getAllGames()
    {
        $stmt = $this->connection->prepare("SELECT * FROM game");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'game');
        $result = $stmt->fetchAll();
        return $result;
    }
}

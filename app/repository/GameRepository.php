<?php
require __DIR__ . '/Repository.php';
require __DIR__ . '/../model/game.php';

class GameRepository extends Repository {

    public function getAllGames() {
        $stmt = $this->connection->prepare("SELECT * FROM game");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'game');
        return $stmt->fetchAll();
    }
    public function addGame($game) {
        $stmt = $this->connection->prepare("INSERT INTO `game` (`title`, `publisher`, `genre`, `description`, `image`) 
                                            VALUES (:title,:publisher,:genre,:description,:image)");
        $stmt->bindValue(':title', $game->getTitle());
        $stmt->bindValue(':publisher', $game->getPublisher());
        $stmt->bindValue(':genre', $game->getGenre());
        $stmt->bindValue(':description', $game->getDescription());
        $stmt->bindValue(':image', $game->getImage());
        $stmt->execute();
    }
    public function searchGame($searchvalue) {
        try {
        $stmt = $this->connection->prepare("SELECT * FROM game WHERE title LIKE :searchvalue ");
        $stmt->bindValue(':searchvalue', '%' . $searchvalue . '%');
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'game');
        $games = $stmt->fetchAll();

        if(!$games || empty($games))
            return null;

        return $games;
        } catch(PDOException $e) {
            echo $e;
        }
    }
}
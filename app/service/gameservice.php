<?php
require __DIR__ . '/../repository/GameRepository.php';

class GameService
{
    private $gamerepository;

    function __construct()
    {
        $this->gamerepository = new GameRepository();
    }

    public function getAllGames()
    {
        return $this->gamerepository->getAllGames();
    }
    public function addGame($game) {
        $this->gamerepository->addGame($game); 
    }
    public function searchGame($searchvalue) {
        return $this->gamerepository->searchGame($searchvalue);
    }
}

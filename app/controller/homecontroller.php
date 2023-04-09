<?php
require __DIR__ . '/../service/gameservice.php';

class HomeController
{
    private $gameservice;

    function __construct()
    {
        $this->gameservice = new GameService();
        session_start();
    }
    public function index()
    {
        $games = $this->gameservice->getAllGames();
        require __DIR__ . '/../view/home/index.php';
    }
}

<?php
require __DIR__ . '/../service/gameservice.php';

class GameController
{
    private $gameservice;

    function __construct()
    {
        $this->gameservice = new GameService();
        session_start();
    }
    public function searchGame()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            try {
                $searchvalue = htmlspecialchars($_GET["search"]);
                $games = $this->gameservice->searchGame($searchvalue);

                if (is_null($games))
                    throw new Exception("No games were found with this title");

                require __DIR__ . '/../view/home/index.php';
            } catch (Exception $error) {
                $games = $this->gameservice->getAllGames();
                require __DIR__ . '/../view/home/index.php';

                echo '<script>alert("' . $error->getMessage() . '")</script>';
            }
        }
    }
}

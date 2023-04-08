<?php
require __DIR__ . '/../service/homeservice.php';

class HomeController {
    private $homeservice;

    function __construct()
    {
        $this->homeservice = new HomeRepository();
        session_start();
    }
    public function index() {
        $games = $this->homeservice->getAllGames();
         require __DIR__ . '/../view/home/index.php';
    }
    public function manageGames() {
        require __DIR__ . '/../view/home/managegames.php';
    }
    public function addGame() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $game = new Game();
                $game->setTitle(isset($_POST['title']) ? htmlspecialchars($_POST['title']) : null);
                $game->setPublisher(isset($_POST['publisher']) ? htmlspecialchars($_POST['publisher']) : null);
                $game->setGenre(isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : null);
                $game->setDescription(isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null);

            } catch (Exception $e) {
                echo $e;
            }
        }
    }
}

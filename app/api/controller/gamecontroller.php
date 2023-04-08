<?php
require __DIR__ . '/../../service/gameservice.php';

class GameController
{
    private $gameservice;

    function __construct()
    {
        $this->gameservice = new GameService();
    }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $games = $this->gameservice->getAllGames();
            header('Content-Type: application/json');
            echo json_encode($games);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // read JSON from the request, convert it to a game object
            $body = file_get_contents('php://input');
            $object = json_decode($body);
            $newGame = new Game();
            $newGame->setTitle(htmlspecialchars($object->title));
            $newGame->setPublisher(htmlspecialchars($object->publisher));
            $newGame->setGenre(htmlspecialchars($object->genre));
            $newGame->setDescription(htmlspecialchars($object->description));
            $newGame->setImage($object->image);
            
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "./image/" . $filename;
            move_uploaded_file($tempname, $folder);

            $this->gameservice->addGame($newGame);
        }
    }
    
}

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
}

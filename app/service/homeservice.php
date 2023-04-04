<?php
require __DIR__ . '/../repository/HomeRepository.php';

class HomeService {
    private $homerepository;

    function __construct()
    {
        $this->homerepository = new HomeRepository();
    }

    public function getAllGames() {
        return $this->homerepository->getAllGames();
    }
}
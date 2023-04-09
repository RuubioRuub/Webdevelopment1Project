<?php
require __DIR__ . '/../service/reviewsservice.php';

class ReviewsController
{
    private $reviewservice;

    function __construct()
    {
        $this->reviewservice = new ReviewsService();
        session_start();
    }

    public function index()
    {
        $gameid = htmlspecialchars($_GET['gameid']);
        $game = $this->reviewservice->getSelectedGame($gameid);
        $userscore = $this->reviewservice->getScore($gameid, false);
        $criticscore = $this->reviewservice->getScore($gameid, true);
        $game->setUserscore($userscore);
        $game->setCriticscore($criticscore);

        require __DIR__ . '/../view/review/reviews.php';
    }
}

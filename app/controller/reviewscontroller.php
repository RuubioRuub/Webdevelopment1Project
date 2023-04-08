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

        require __DIR__ . '/../view/home/reviews.php';
    }
}

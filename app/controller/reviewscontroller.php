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
        $reviews = $this->reviewservice->getReviewsForSelectedGame($gameid);

        require __DIR__ . '/../view/home/reviews.php';
    }
    public function addReview()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newReview = new Review();
            $newReview->setWriter("Anonymous");
            $newReview->setTitle(isset($_POST['title']) ? $_POST['title'] : null);
            $newReview->setBody(isset($_POST['body']) ? $_POST['body'] : null);
            $newReview->setScore(isset($_POST['score']) ? $_POST['score'] : null);
            $gameid = htmlspecialchars($_GET['gameid']);
            $newReview->setGameID($gameid);

            //Temporary default values for the following properties
            $newReview->setCompany("NONE");
            $newReview->setCriticreview(FALSE);
            
            $this->reviewservice->addReview($newReview);
        }
    }
}

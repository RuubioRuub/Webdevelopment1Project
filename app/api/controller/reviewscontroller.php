<?php
require __DIR__ . '/../../repository/ReviewRepository.php';

class ReviewsController
{
    private $repository;

    function __construct()
    {
        $this->repository = new ReviewRepository();
    }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $reviews = $this->repository->getAll();
            header('Content-Type: application/json');
            echo json_encode($reviews);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // read JSON from the request, convert it to an article object
            
            $body = file_get_contents('php://input');
            $object = json_decode($body);
            $newReview = new Review();
            $newReview->setWriter("Anonymous");
            $newReview->setTitle($object->title);
            $newReview->setBody($object->body);
            $newReview->setScore($object->score);
            $gameid = htmlspecialchars($_GET['gameid']);
            $newReview->setGameID($gameid);

            //Temporary default values for the following properties
            $newReview->setCompany("NONE");
            $newReview->setCriticreview(FALSE);
            
            $this->repository->addReview($newReview);
        }

        // $gameid = htmlspecialchars($_GET['gameid']);
        // $game = $this->repository->getSelectedGame($gameid);
        // $reviews = $this->repository->getReviewsForSelectedGame($gameid);

        // require __DIR__ . '/../view/home/reviews.php';
    }
    // public function addReview()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $newReview = new Review();
    //         $newReview->setWriter("Anonymous");
    //         $newReview->setTitle(isset($_POST['title']) ? $_POST['title'] : null);
    //         $newReview->setBody(isset($_POST['body']) ? $_POST['body'] : null);
    //         $newReview->setScore(isset($_POST['score']) ? $_POST['score'] : null);
    //         $gameid = htmlspecialchars($_GET['gameid']);
    //         $newReview->setGameID($gameid);

    //         //Temporary default values for the following properties
    //         $newReview->setCompany("NONE");
    //         $newReview->setCriticreview(FALSE);
            
    //         $this->repository->addReview($newReview);
    //     }
    // }
}

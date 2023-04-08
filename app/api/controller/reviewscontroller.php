<?php
require __DIR__ . '/../../service/reviewsservice.php';

class ReviewsController
{
    private $reviewservice;

    function __construct()
    {
        $this->reviewservice = new ReviewsService();
    }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $reviews = $this->reviewservice->getAll();
            header('Content-Type: application/json');
            echo json_encode($reviews);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // read JSON from the request, convert it to a review object
            $body = file_get_contents('php://input');
            $object = json_decode($body);
            $newReview = new Review();
            $newReview->setWriter($object->writer);
            $newReview->setTitle($object->title);
            $newReview->setBody($object->body);
            $newReview->setScore($object->score);
            //$gameid = htmlspecialchars($_GET['gameid']);
            $newReview->setGameID($object->gameID);
            $newReview->setCompany($object->company);
            $newReview->setCriticreview($object->criticreview);
            
            $this->reviewservice->addReview($newReview);
        }
    }
}

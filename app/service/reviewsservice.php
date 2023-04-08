<?php
require __DIR__ . '/../repository/ReviewRepository.php';
    
class ReviewsService {
    private $reviewrepository;

    function __construct()
    {
        $this->reviewrepository = new ReviewRepository();
    }

    public function getAll() {
        return $this->reviewrepository->getAll();
    }
    public function getReviewsForSelectedGame($gameid)
    {
        return $this->reviewrepository->getReviewsForSelectedGame($gameid);
    }

    public function getSelectedGame($gameid)
    {
        return $this->reviewrepository->getSelectedGame($gameid);
    }
    public function addReview(Review $review)
    {
        $this->reviewrepository->addReview($review);
    }
    public function getScore($gameID, $criticreview) {
        return $this->reviewrepository->getScore($gameID, $criticreview);
    }
}
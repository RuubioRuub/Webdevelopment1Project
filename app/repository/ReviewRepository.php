<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../model/game.php';
require __DIR__ . '/../model/review.php';

class ReviewRepository extends Repository
{
    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM review ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'review');
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getReviewsForSelectedGame($gameid)
    {
        $stmt = $this->connection->prepare("SELECT * FROM review WHERE gameID = :id ");
        $stmt->bindParam(':id', $gameid);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'review');
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getSelectedGame($gameid)
    {
        $stmt = $this->connection->prepare("SELECT * FROM game WHERE gameID = :id");
        $stmt->bindParam(':id', $gameid);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'game');
        $result = $stmt->fetchAll();
        return $result[0];
    }
    public function addReview(Review $review)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `review`(`criticreview`, `gameID`, `writer`, `company`, `body`, 
                                            `score`, `title`) VALUES (:critic, :gameID,:writer, :company,
                                            :body, :score, :title)");
            if ($review->getCriticreview())
                $stmt->bindValue(':critic', 1);
            else
                $stmt->bindValue(':critic', 0);

            $stmt->bindValue(':gameID', $review->getGameID());
            $stmt->bindValue(':writer', $review->getWriter());
            $stmt->bindValue(':company', $review->getCompany());
            $stmt->bindValue(':body', $review->getBody());
            $stmt->bindValue(':score', $review->getScore());
            $stmt->bindValue(':title', $review->getTitle());

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getScore($gameID, $criticreview)
    {
        try {
        $stmt = $this->connection->prepare("SELECT AVG(score) FROM review WHERE criticreview = :critic AND gameID = :id");
        if ($criticreview)
            $stmt->bindValue(':critic', 1);
        else
            $stmt->bindValue(':critic', 0);
        $stmt->bindvalue(':id', $gameID);
        $stmt->execute();

        $score = $stmt->fetchAll();

        if (!$score || empty($score))
            return null;

        return $score[0][0];    //For reasons unknown to me AVG() returns an array instead of just the average score, hence why I select the first option in the array twice
        } catch(PDOException $e) {
            echo $e;
        }
    }
}

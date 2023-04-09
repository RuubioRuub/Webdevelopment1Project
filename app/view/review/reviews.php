<?php
require __DIR__ . '/../../header.php';
?>

<head>
    <link rel="stylesheet" href="/css/reviewStyle.css">
</head>

<!-- Display the game selected -->
<div class="container-fluid" id="gamecontainer">

    <div class="card gamecard mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <!-- Since images are stored in the database as a LONGBLOB value, the data, charset and base64 parameters are 
                        used to display the image -->
                <img src="/image/<?= $game->getImage(); ?>" class="img-fluid rounded-start" alt="Loading image...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title"> <?= $game->getTitle() ?> </h5>
                    <p class="card-text"><?= $game->getGenre() ?> </p>
                    <!-- Display the description -->
                    <p class="card-text"> <?= $game->getDescription() ?> </p>
                </div>

            </div>
            <div class="card-footer ">
                <div class="row score-row">
                    <div class="col">
                        <h5>Userscore: </h5>
                        <?php if (is_null($game->getUserScore())) {
                            echo "<p>There are no user reviews for this game";
                        } else { ?>
                            <div class="score gamescore 
                            <?php if ($game->getUserScore() < 40) { //Sets the class to low or mid if the score is below a certain value
                                echo "low";
                            } else if ($game->getUserScore() < 80) {
                                echo "mid";
                            } ?>"><?= $game->getUserScore() ?></div>
                        <?php } ?>
                    </div>
                    <div class="col">
                        <h5>Criticscore: </h5>
                        <?php if (is_null($game->getCriticscore())) {
                            echo "<p>There are no critic reviews for this game";
                        } else { ?>
                            <div class="score gamescore 
                        <?php if ($game->getCriticscore() < 40) {
                                echo "low";
                            } else if ($game->getCriticscore() < 80) {
                                echo "mid";
                            } ?>"><?= $game->getCriticscore() ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container review-form">
    <button class="btn btn-success mb-2" id="show-adding-form">Add a review</button>
    <!-- form to write the review -->
    <form id="write-review" style="display: none">
        <h4>By: <span id="username"> <!-- The username inserted into the new review -->
                <?php
                if (isset($_SESSION['loggedin']))
                    echo $_SESSION['username'];
                else
                    echo "Anonymous";

                if (isset($_SESSION['company'])) {  //If the review is from a critic sompany info is stored in the db
                    echo '<span id="company" style="display: none">' . $_SESSION['company'] . '</span>';
                }
                ?>
            </span>
        </h4>
        <div class="form-group row mb-1">
            <label for="title" class="col-sm-2 col-form-label">Title of your review:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Write a title" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="score" class="col-sm-2 col-form-label">Score (0 - 100):</label>
            <div class="col-sm-10">
                <input type="number" min="0" max="100" class="form-control" id="score" name="score" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="body" class="col-sm-2 col-form-label">Your review:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="body" name="body" placeholder="Write a review" required></textarea>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="addReview()">Post review</button>
    </form>
</div>

<div class="container-fluid" id="reviewslist">
    <!-- Reviews go here -->
</div>

<?php require __DIR__ . '/../../footer.php'; ?>

<!-- var id is created to allow access to the currently selected game's id              -->
<script type="text/javascript">
    var id = <?= $game->getGameID() ?>;
</script>
<script src="/js/reviews.js"></script>
<script>
    document.getElementById('show-adding-form').addEventListener('click', function() {
        document.getElementById('write-review').style.display = 'block';
    });
</script>
<style scoped>
    .mid {
        /* Games or reviews with a score below a certain value have their score element in different colors */
        background-color: rgb(250, 233, 0);
    }

    .low {
        background-color: red;
    }
</style>
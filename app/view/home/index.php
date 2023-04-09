<?php
require __DIR__ . '/../../header.php';
?>

<head>
    <link rel="stylesheet" href="/css/homestyle.css">
</head>

<div class="container index">
    <h1>Welcome to High-Score!</h1>
    <p>High-Score is a website where you can review your favorite and least favorite games! Do you want to let the world know your 
        opinions, or do you want to know what others think about the games you played? Head down to the Games section and select a game 
        in our database to view and/or write reviews. </p>
</div>
<!-- Display the games currently in the database -->
<div class="container gamescontainer">
    <h3>Games</h3>

    <div class="row" id="itemList">
        <?php
        foreach ($games as $game) {
        ?>
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/image/<?= $game->getImage(); ?>" class="img-fluid rounded-start" alt="Loading image...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $game->getTitle() ?> </h5>
                            <p class="card-text"><?= $game->getGenre() ?> </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/reviews?gameid=<?= $game->getGameID() ?>" class="btn btn-primary stretched-link">See reviews</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
require __DIR__ . '/../../footer.php';
?>
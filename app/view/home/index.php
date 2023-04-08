<?php
require __DIR__ . '/../../header.php';
?>

<head>
    <link rel="stylesheet" href="/css/homestyle.css">
</head>

<!-- Display the games currently in the database -->
<h1>Games</h1>


<div class="row" id="itemList">
    <?php
    foreach ($games as $game) {
    ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/image/<?= $game->getImage(); ?>" class="img-fluid rounded-start" alt="Loading image...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $game->title ?> </h5>
                        <p class="card-text"><?= $game->genre ?> </p>
                        <a href="/reviews?gameid=<?= $game->gameID ?>" class="btn btn-primary stretched-link">See reviews</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
require __DIR__ . '/../../footer.php';
?>
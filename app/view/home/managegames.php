<?php
require __DIR__ . '/../../header.php';
?>

<div class="container review-form">
    <button class="btn btn-success mb-2" id="show-adding-form">Add a game</button>
    <!-- form to write the review -->
    <div class="container" id="write-review" style="display: none">
        <h4>Add game</h4>
        <div class="form-group row mb-1">
            <label for="title" class="col-sm-2 col-form-label">Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Write a title" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher:</label>
            <div class="col-sm-10">
                <input type="publisher" class="form-control" id="publisher" name="publisher" placeholder="Enter who published the game" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="genre" class="col-sm-2 col-form-label">Genre:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="genre" name="genre" placeholder="Enter a genre for the game" required></textarea>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="description" class="col-sm-2 col-form-label">Description:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="The game's description" required></textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image: </label>
            <input type="file" class="" name="image" id="image">
        </div>

        <button type="button" class="btn btn-primary" onclick="addReview()">Add</button>
    </div>
</div>

<div class="row" id="itemList">
    <h2>Games currently in the database</h2>

    <?php

    foreach ($games as $game) {
    ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <!-- Since images are stored in the database as a LONGBLOB value, the data, charset and base64 parameters are 
                        used to display the image -->
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($game->image); ?>" class="img-fluid rounded-start" alt="Loading image...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $game->title ?> </h5>
                        <p class="card-text"><?= $game->genre ?> </p>
                        <a href="reviews?gameid=<?= $game->gameID ?>" class="btn btn-primary stretched-link">See reviews</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<script>
    document.getElementById('show-adding-form').addEventListener('click', function() {
        document.getElementById('write-review').style.display = 'block';
    });
</script>
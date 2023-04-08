<?php
require __DIR__ . '/../../header.php';
?>

<div class="container game-form">
    <button class="btn btn-success mb-2" id="show-adding-form">Add a game</button>
    <!-- form to write the review -->
    <form method="post" id="add-game" enctype="multipart/form-data" style="display: none">
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
            <input type="file" class="" name="image" id="image" required>
        </div>

        <button type="submit" class="btn btn-primary" onclick="addGame()">Add</button>
</form>
</div>
<div class="container">
    <h2>Games currently in the database</h2>
    <!-- Games go here -->
    <div class="row" id="gamelist"></div>
</div>

<?php require __DIR__ . '/../../footer.php'; ?>

<script src="/js/games.js"></script>
<script>
    document.getElementById('show-adding-form').addEventListener('click', function() {
        document.getElementById('add-game').style.display = 'block';
    });
</script>
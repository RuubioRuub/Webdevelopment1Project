<?php
require __DIR__ . '/../../header.php';
?>

<head>
    <link rel="stylesheet" href="/css/reviewStyle.css">
</head>

<!-- Display the game selected -->
<div class="container-fluid" id="gamecontainer">

    <div class="card mb-3">
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
                    <!-- Display the description -->
                </div>

            </div>
        </div>
    </div>

</div>
<div class="container review-form">
    <button class="btn btn-success mb-2" id="show-adding-form">Add a review</button>
    <!-- form to write the review -->
    <div class="container" id="write-review" style="display: none">
        <h4>By: <span id="username">  <!-- The username inserted into the new review -->
                <?php
                if (isset($_SESSION['loggedin']))
                    echo $_SESSION['username'];
                else
                    echo "Anonymous";
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
                <input type="score" class="form-control" id="score" name="score" placeholder="Rate the game from 0 to 100" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="body" class="col-sm-2 col-form-label">Your review:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="body" name="body" placeholder="Write a review" required></textarea>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="addReview()">Post review</button>
    </div>
</div>

<div class="container" id="reviewslist">
    <!-- Reviews go here -->
</div>

<!-- var id is created to allow access to the currently selected game's id              -->
<script type="text/javascript">
    var id = <?= $game->gameID ?>;
</script>
<script src="/js/reviews.js"></script>

</body>

</html>

<script>
    document.getElementById('show-adding-form').addEventListener('click', function() {
        document.getElementById('write-review').style.display = 'block';
    });
</script>
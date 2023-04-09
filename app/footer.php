</div>

<head>
    <link rel="stylesheet" href="/css/footerstyle.css">
</head>
<!-- Footer -->
<div class="container-fluid mt-5" id="footer">
    <div class="row">
        <div class="col about md-3">
            <h6 class="text-center">about</h6>
            <p>High-Score is a website that allows you to rate your favorite and least favorite games!
                See what others have to say about the games you played and share your own opinions!</p>
        </div>
        <div class="col overview">
            <h6 class="text-center">Navigate</h6>
            <a class="nav-link" href="/">Home</a>
            <?php if (!isset($_SESSION['username'])) { ?>
                <a class="nav-link" href="/login">Login</a>
            <?php } else { ?>
                <a class="nav-link" href="/login/logout">Logout</a>
            <?php } ?>
        </div>
    </div>
</div>
</body>

</html>
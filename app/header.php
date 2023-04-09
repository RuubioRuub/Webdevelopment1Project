<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>High-Score</title>
    <link rel="stylesheet" href="/css/headerstyle.css">


</head>

<body style="background-color: rgb(252, 252, 252);">
    <nav class="navbar navbar-expand-lg navbar-dark " >
        <div class="container">
            <a class="navbar-brand" href="/home">High-Score</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php if(!isset($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <?php }else { ?>
                        <li class="nav-item">
                        <a class="nav-link" href="/login/logout">Logout</a>
                    </li>
                    <?php }
                    if (isset($_SESSION['role']) && $_SESSION['role'] == "Admin") {   
                    ?>
                        <li class="nav-item">
                            <a href="/management/manageGames" class="nav-link">Manage games</a>
                        </li>
                        <li class="nav-item">
                            <a href="/management/manageAdminAccounts" class="nav-link">Manage admin accounts</a>
                        </li>
                    <?php } ?>
                    
                </ul>
                <form role="search" method="get" action="/game/searchGame">
                    <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">

                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4 website-body">
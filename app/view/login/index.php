<?php
require __DIR__ . '/../../header.php';
?>

<main class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <br />
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="/login/authenticate" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="enter your password">
                        </div>
                        <div class="row mb-4 justify-content-between">
                            <div class="col"><button type="submit" class="btn btn-primary">Login</button></div>
                            <div class="col"><a name="" id="" class="btn btn-secondary" href="/login/register" role="button">Register</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
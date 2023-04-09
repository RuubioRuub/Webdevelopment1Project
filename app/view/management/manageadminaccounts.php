<?php
require __DIR__ . '/../../header.php';
?>

<head>
    <link rel="stylesheet" href="/css/homestyle.css">
</head>

<div class="container">
    <button class="btn btn-success mb-2" id="show-adding-form">Create admin account</button>
    <form method="post" id="add-account" enctype="multipart/form-data" style="display: none">
        <h4>Add account</h4>
        <div class="form-group row mb-1">
            <label for="username" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="password" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="addAdminAccount()">Add</button>
    </form>

</div>
<div class="container">

    <div class="table-responsive-sm">
        <table id="user-table" class="table">
            <thead>
                <tr>
                    <th scope="col" class="sortable" data-sort="username">Username <i class="fa-solid fa-sort"></i></th>
                    <th scope="col" class="sortable" data-sort="username">Password</th>
                    <th scope="col" class="sortable" data-sort="email">Email <i class="fa-solid fa-sort"></i></th>
                    <th scope="col" class="sortable" data-sort="role">Role <i class="fa-solid fa-sort"></i></th>
                </tr>
            </thead>
            <tbody id="admintable">
                <!-- Accounts go here -->
            </tbody>
        </table>
    </div>

</div>
</div>

<script src="/js/management.js"></script>
<script>
    document.getElementById('show-adding-form').addEventListener('click', function() {
        document.getElementById('add-account').style.display = 'block';
    });
</script>

<?php
require __DIR__ . '/../../footer.php';
?>
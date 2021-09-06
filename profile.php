<?php require 'modules/user_details_session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php require './resources/templates/headmeta.php'; ?>
</head>
<body>
    <div class="container-fluid-lg-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid offset-lg-4">
            <a class="navbar-brand" href="#">User Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $username; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" id="logout">Logout</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome!</h1>
        <h1 class="display-2"><?= $name; ?></h1>
        <hr class="my-4">
        <h1 class="display-6">E-mail: <?= $email; ?></h1>
        <h1 class="display-6">Registered since: <?= $created_at; ?></h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    </div>
    </div>
    <?php require './resources/templates/scriptscdn.php'; ?>
</body>
</html>
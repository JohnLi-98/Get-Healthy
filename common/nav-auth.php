<?php
//$username = $_SESSION['username'];
$username = "John";
?>

<nav class="navbar navbar-expand-lg fixed-top" id="nav">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" id="nav-logo" />
    </a>

    <button class="navbar-toggler" id="nav-toggler" type="button" data-toggle="collapse" data-target="#nav-collapser">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars" id="nav-toggler-icon"></i>
        </span>
    </button>

    <div id="nav-seperator"></div>

    <div class="collapse navbar-collapse" id="nav-collapser">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link default" href="exercise.php">
                    <i class="fas fa-dumbbell"></i>
                    <span class="nav-link-title nav-link-title-white">Exercise</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link default" href="motivation.php">
                    <i class="fas fa-fist-raised"></i>
                    <span class="nav-link-title nav-link-title-white">Motivation</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link default" href="nutrition.php">
                    <i class="fas fa-utensils"></i>
                    <span class="nav-link-title nav-link-title-white">Nutrition</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle default" href="#" role="button" data-toggle="dropdown">
                    <i class="fas fa-user"></i>
                    <span class="nav-link-title nav-link-title-white">Account</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right" id="nav-dropdown">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="close" title="Close" data-dismiss="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="row">
                                <p class="pr-2">
                                    <strong>
                                        Hi <?php echo $username; ?>
                                    </strong>
                                </p>
                                <p>|</p>
                                <a href="#" class="pl-2">Log Out</a>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
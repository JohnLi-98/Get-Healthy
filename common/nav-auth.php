<?php
//$username = $_SESSION['username'];
$username = "John";
?>

<nav class="navbar navbar-expand-lg fixed-bottom" id="nav">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" />
    </a>

    <button class="navbar-toggler" id="nav-toggler" type="button" data-toggle="collapse" data-target="#nav-content">
        <span class="navbar-toogler-icon">
            <i class="fas fa-bars"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="nav-content">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="exercise.php">
                    <i class="fas fa-dumbbell"></i>
                    Exercise
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="motivation.php">
                    <i class="fas fa-fist-raised"></i>
                    Motivation
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="nutrition.php">
                    <i class="fas fa-utensils"></i>
                    Nutrition
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
                    <i class="fas fa-user"></i>
                    Account
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="close" title="Close" data-dismiss="dropdown">
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
<?php
ini_set("session.save_path", "/home/vol10_2/epizy.com/epiz_26587846/htdocs/sessionData");
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheets files (Latest compiled and minified Bootstrap 4 CSS, Google Fonts CSS, Index CSS) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
    <link rel="stylesheet" href="stylesheets/main.css">

    <title>Exercise</title>
</head>

<body>
    <?php
    // If else statement to select the correct navbar depending on whether a session variable exists for 'logged-in'
    if (isset($_SESSION['logged-in']) == true) {
        include "common/nav-auth.php";
    } else {
        include "common/nav-unauth.html";
    }
    ?>

    <!-- Jumbotron that fills the height of the screen -->
    <div class="jumbotron jumbotron-fluid p-0" id="exercise-jumbotron">
        <div class="row align-items-center h-100 mx-5">
            <div class="col">
                <span><a href="index.php">Home</a>
                    <span class="px-2">
                        &#8594;
                    </span>
                    Exercise
                </span>
                <h1 class="pt-3"><strong>Exercise</strong></h1>
                <p class="text-left">Every day is another chance to do something your future self will thank you for.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center align-items-center" id="test">
        <h1>If you're reading this, you're gay</h1>
    </div>

    <?php
    include "common/footer.html";
    ?>

    <!-- Script files(jQuery library, Popper JS, Latest Compiled Bootstrap JS, FontAwesome JS)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6cc49d804e.js" crossorigin="anonymous"></script>
    <script type="module" src="scripts/main.js"></script>
</body>

</html>
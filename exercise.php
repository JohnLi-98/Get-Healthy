<?php
//ini_set("session.save_path", "/home/vol10_2/epizy.com/epiz_26587846/htdocs/sessionData");
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

    <title>Exercise | Get Healthy</title>
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

    <div class="container-fluid page-content pb-3">
        <div class="row pb-3 px-md-5">
            <div class="col-12 text-left px-md-1 px-lg-5">
                <p>
                    Exercising regularly can be a difficult and daunting task for some, especially for those that consider themselves a
                    beginner. But it doesn't have to be. At Get Healthy, we believe that anyone can make it a habit to exercise, by selecting
                    exercises that they enjoy and don't find overly difficult to perform. You should always listen to your body and only do
                    the exercises and amount of weight suitable for it, otherwise you risk injury, which can deter you away from exercising again.
                    It's a scientific fact that physical exercise has a positive impact on your overall health, both mentally and physically. It can
                    increase your energy levels, boost and sustain your mood, help with weight loss, improve sleep quality and reduce the risk
                    of major illnesses, amongst others. With all these benefits, why not make it a habit to be active?
                </p>
            </div>
        </div>

        <hr class="line-divider mx-md-2 mx-lg-5">

        <div class="row justify-content-center text-center px-md-5">
            <h4 class="pt-4">Exercise Collection</h4>
            <p class="px-md-1 px-lg-5">
                Have a look through our selection of exercises for an exercise you like or find interesting, to
                learn how to properly perform it.
            </p>
        </div>
    </div>

    <div class="container-fluid bg-primary py-5">
        <p> Hi this is a test</p>
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
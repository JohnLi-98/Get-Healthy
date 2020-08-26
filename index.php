<?php
ini_set("session.save_path", "/home/unn_w16010421/sessionData");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/main.css">

    <title>Home</title>
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
    <div class="jumbotron jumbotron-fluid" id="index-jumbotron">
        <div class="row align-items-center mx-auto h-75 w-100">
            <div class="col text-center">
                <p>Welcome to</p>
                <h1><strong>GET HEALTHY</strong></h1>
            </div>
        </div>
        <div class="clouds">
            <img src="images/cloud1.png" style="--i:1">
            <img src="images/cloud2.png" style="--i:2">
            <img src="images/cloud3.png" style="--i:3">
            <img src="images/cloud4.png" style="--i:4">
            <img src="images/cloud5.png" style="--i:5">
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row pt-5 pb-2 px-md-5">
            <div class="col-12 text-center px-md-5">
                <h2 class="font-weight-bold pb-2">Transform your lifestyle</h2>
                <p>
                    Personal health and wellbeing is a topic that is very relevant in today's society. With access to
                    health information being so convenient for individuals, this site aims to provide ways in
                    living a healthier lifestyle and unlocking your potential.
                </p>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col">
                <img src="images/Healthy-Banner.jpg" class="img-fluid" alt="Responsive Healthy Banner" style="width:100%;" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 text-center px-4 py-3">
                <img src="images/Exercise-Icon-Index.png" class="img-fluid pb-3" />
                <h5 class="font-weight-bold pb-2">Train Smarter!</h5>
                <p class="text-muted">
                    Find out how you can efficiently train your body to maximise it's potential, without overexerting
                    and risking injury.
                </p>
            </div>

            <div class="col-sm-4 text-center px-4 py-3">
                <img src="images/Motivation-Icon-Index.png" class="img-fluid pb-3" />
                <h5 class="font-weight-bold pb-2">Be Inspired!</h5>
                <p class="text-muted">
                    Discover your inner beast by being inspired to go out and giving your all to achieving the goals
                    you previously set.
                </p>
            </div>

            <div class="col-sm-4 text-center px-4 py-3">
                <img src="images/Nutrition-Icon-Index.png" class="img-fluid pb-3" />
                <h5 class="font-weight-bold pb-2">Eat Nutritiously!</h5>
                <p class="text-muted">
                    Recover and fuel your body with the right foods to keep you energised for your next session, without
                    sacrificing flavour.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid parallax" id="explore"></div>

    <div class="container-fluid page-content">
        <div class="row py-4 py-md-5">
            <div class="col-12 col-md-6 my-auto pb-3">
                <h3 class="card-title"><u>Exercise</u></h3>
                <p class="card-text">
                    Physical activity of moderate intensity - such as walking, cycling or doing
                    other sports has significant benefits for health. At all ages, the benefits of being
                    physically active outweigh potential harm, i.e. accidents and injuries. Some exercise
                    is better than doing none. By becoming more active throuhout the day in
                    relatively simple ways, people can easily achieve the recommended activity levels.
                </p>
                <a href="exercise.php" role="button" class="btn info-btn">
                    <span>
                        Find out more
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </a>
            </div>

            <div class="col-12 col-md-6">
                <img src="images/Exercise-Home-Image.jpg" class="card-img-top img-fluid">
            </div>
        </div>

        <hr class="line-divider" />

        <div class="row py-4 py-md-5">
            <div class="col-12 col-md-6 order-md-2 my-auto pb-3">
                <h3 class="card-title"><u>Motivation</u></h3>
                <p class="card-text">
                    If you want to accomplish your ambitions, you need to stop asking for permission. This
                    is why motivation is important in life because it stops asking questions and aligns you
                    to work towards your goals. Not everyone is born with motivation and it is the defining
                    factor that turns a good thought into immediate action. It turns a good idea into a
                    business and can positively impact the world around you.
                </p>
                <a href="motivation.php" role="button" class="btn info-btn">
                    <span>
                        Find out more
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </a>
            </div>

            <div class="col-12 col-md-6 order-md-1">
                <img src="images/Motivation-Home-Image.jpg" class="card-img-top img-fluid">
            </div>
        </div>

        <hr class="line-divider" />

        <div class="row py-4 py-md-5">
            <div class="col-12 col-md-6 my-auto pb-3">
                <h3 class="card-title"><u>Nutrition</u></h3>
                <p class="card-text">
                    Many people often underestimate the importance of the right food and nutrition has on
                    our health. There are multiple benefits that eating an abundance of different
                    nutrients has on your body. Swapping high carbohydrates, sugars and fatty foods for whole
                    nutritious foods will have a significant effect on your body, health and mood. A lot of
                    people plan and start their healthy eating journey, but are unable to sustain these
                    changes.
                </p>
                <a href="nutrition.php" role="button" class="btn info-btn">
                    <span>
                        Find out more
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </a>
            </div>

            <div class="col-12 col-md-6">
                <img src="images/Nutrition-Home-Image.jpg" class="card-img-top img-fluid">
            </div>
        </div>
    </div>

    <div class="container-fluid pr-5 py-4" id="author">
        <div class="row">
            <div class="col-12 col-md-3 text-center">
                <img src="images/Profile-Pic.JPG" class="rounded-circle">
                <h5 class="pt-3">John Li</h5>
                <h6>Aspiring Developer</h6>
            </div>

            <div class="col-12 col-md-9 pt-2 pt-md-0 pr-md-5 my-auto text-center">
                <p>
                    "I believe that health and wellness is an important aspect of an individual's life; by looking after our health will not
                    only benefit us in the short term but also in the long term. It allows us to keep both the mind and body working positively,
                    while setting a clear path of what we want to achieve. Your life only gets better when you do. Embrace and work on your body
                    and mind, these are the greatest things you'll ever own."
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex parallax" id="technologies">
        <div class="row w-100 align-items-center text-center px-5">
            <div class="col-6 col-md-3">
                <i class="fab fa-html5 fa-3x"></i>
            </div>

            <div class="col-6 col-md-3">
                <i class="fab fa-css3-alt fa-3x"></i>
            </div>

            <div class="col-6 col-md-3">
                <i class="fab fa-js-square fa-3x"></i>
            </div>

            <div class="col-6 col-md-3">
                <i class="fab fa-php fa-3x"></i>
            </div>
        </div>
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
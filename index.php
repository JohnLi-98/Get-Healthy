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
    // add if else statement for user login check
    include "common/nav-unauth.html";
    //include "common/nav-auth.php";
    ?>

    <!-- Jumbotron that fills the height of the screen -->
    <div class="jumbotron jumbotron-fluid" id="indexJumbotron">
        <div class="row align-items-center mx-auto h-75 w-100">
            <div class="col text-center">
                <p>Welcome to</p>
                <h1><strong>GET HEALTHY</strong></h1>
            </div>
        </div>
        <div class="clouds">
            <img src="images/cloud1.png" style="--i:1.5">
            <img src="images/cloud2.png" style="--i:2">
            <img src="images/cloud3.png" style="--i:2.5">
            <img src="images/cloud4.png" style="--i:3">
            <img src="images/cloud5.png" style="--i:3.5">
        </div>
    </div>

    <div class="container-fluid page-content">

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
                <button type="button" class="btn info-btn" style="border-radius:40px">
                    <span>
                        Find out more
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </button>
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
                <button type="button" class="btn info-btn" style="border-radius:40px">
                    <span>
                        Find out more
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </button>
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
                    our health. There are multiple multiple benefits that eating an abundance of different
                    nutrients has on your body. Swapping high carbohydrates, sugars and fatty foods for whole
                    nutritious foods will have a significant effect on your body, health and mood. A lot of
                    people plan and start their healthy eating journey, but are unable to sustain these
                    changes.
                </p>
                <button type="button" class="btn info-btn" style="border-radius:40px">
                    <span>
                        Find out more
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </button>
            </div>

            <div class="col-12 col-md-6">
                <img src="images/Nutrition-Home-Image.jpg" class="card-img-top img-fluid">
            </div>
        </div>
    </div>


    <div class="container-fluid" id="test">

    </div>

    <?php
    include "common/footer.html";
    ?>

    <!-- Script files(jQuery library, Popper JS, Latest Compiled Bootstrap JS, FontAwesome JS)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6cc49d804e.js" crossorigin="anonymous"></script>
    <script src="scripts/main.js"></script>
</body>

</html>
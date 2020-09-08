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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/main.css">

    <title>About Us | Get Healthy</title>
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
    <div class="jumbotron jumbotron-fluid p-0" id="about-us-jumbotron">
        <div class="row align-items-center h-100 mx-5">
            <div class="col">
                <span><a href="index.php">Home</a>
                    <span class="px-2">
                        &#8594;
                    </span>
                    About Us
                </span>
                <h1 class="pt-3"><strong>Get Healthy</strong></h1>
                <p class="text-left">Helping to transform and accelerate personal health and wellbeing.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row py-lg-4">
            <div class="col-12 text-left">
                <h2 class="font-weight-bold pb-2">Passionate about inspiring growth</h2>
                <p>
                    We know that each individual will have their own bar to reach, in terms of health and wellbeing, however,
                    we also know that everyone has the capacity to grow. Therefore, we believe that everybody deserves the
                    support to reach their desired goal(s), no matter the difficulty.
                </p>

                <p>
                    We're here to support those that wish to make a serious lifestyle change, and help to progress them through
                    their health journey. Whether you're a newbie or an advanced member of the health community, we provide
                    information that is useful to all levels, without paying a premium to access.
                </p>

                <p>
                    We put time and effort into the information provided throughout this site, ensuring that only the highest
                    quality is displayed. Each intricate detail is either backed by personal experiences from our team, industry
                    research or a combination of both.
                </p>

                <p>
                    Results matter! And that's what we deliver. But to us, results are more than just mere changes to your lifestyle.
                    Results are making sure our users are equipped with long-term sustainability and success.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center py-5" id="about-us-join">
        <h2 class="pt-2">Ready to start your fitness journey?</h2>
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 col-lg-3">
                <a href="contact-us.php" class="btn btn-block identity-btn mr-2 mt-4 mb-2 py-2" role="button">
                    <strong>Become a member</strong>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row pt-lg-4">
            <div class="col-12 text-left">
                <h2 class="font-weight-bold pb-2">What we specialise in</h2>
                <p>Find out about the areas that we specialise in.</p>
            </div>
        </div>

        <div class="row pb-lg-4">
            <div class="col-12 col-lg-6 text-left">
                <h5><u>Exercise</u></h5>
                <p>
                    Selecting the right exercise to do for maximum results can be challenging, especially for people
                    that have just started. That is why we decided to give users a variety of exercises to choose from,
                    so that they can find the right one for them. This page gives insight to users of different body types
                    and how they should should train for their desired goals.
                </p>

                <h5><u>Motivation</u></h5>
                <p>
                    To help motivate our users, we have collected a large list of quotes to try and inspire individuals
                    to get what they want done. You are able to save your favourite quotes, if you have created an account
                    with us. Although saving quotes is a members privilage, all users are able to view these quotes. You
                    can also view our gallery of photos for motivation.
                </p>

                <h5><u>Nutrition</u></h5>
                <p>
                    Finding and choosing meals that are nutritious can be difficult and time consuming, which is why we
                    have provided a collection of different meals and their recipes for you to recreate at home. There
                    are a number of different meals to choose from, so that you can have variety in your diet, instead
                    of eating the same boring meals.
                </p>
            </div>

            <div class="col-12 col-lg-6 d-flex align-items-center">
                <img src="images/About-Us-Exercise-Image.svg" class="img-fluid" />
            </div>
        </div>
    </div>

    <div class="container-fluid text-center py-5" id="about-us-contact">
        <h2 class="pt-2">Need help with anything?</h2>
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 col-lg-3">
                <a href="contact-us.php" class="btn btn-block mr-2 mt-4 mb-2 py-2" role="button" id="about-us-btn">
                    <strong>Contact Us</strong>
                </a>
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
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
                <h1>GET HEALTHY</h1>
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
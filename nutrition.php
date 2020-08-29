<?php
//ini_set("session.save_path", "/home/unn_w16010421/sessionData");
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

    <title>Nutrition</title>
</head>

<body>
    <?php
    // add if else statement for user login check
    include "common/nav-unauth.html";
    //include "common/nav-auth.php";
    ?>

    <!-- Jumbotron that fills the height of the screen -->
    <div class="jumbotron jumbotron-fluid p-0" id="nutrition-jumbotron">
        <div class="row align-items-center h-100 mx-5">
            <div class="col">
                <span><a href="index.php">Home</a>
                    <span class="px-2">
                        &#8594;
                    </span>
                    Nutrition
                </span>
                <h1 class="pt-3"><strong>Nutrition</strong></h1>
                <p class="text-left">Eat for the body you want. Not for the body you have.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row pb-3 px-md-5">
            <div class="col-12 text-left px-md-1 px-lg-5">
                <p>
                    Nutrition is an important factor to living a healthy lifestyle and is usually overlooked. Your food choices each day
                    affect your health - how you feel today, tomorrow and in the future. Combined with physical activity, your diet can
                    help you to reach and maintain a healthy weight, reduce your risk of chronic diseases (like heart disease and
                    cancer), as well as promote your overall health. By taking steps to eating healthy, you'll be on your way to getting the
                    nutrients your body needs to stay active, healthy and strong. As with physical activity, making small changes in
                    your diet can go a long way, and it's easier than you think! Browse our selection of meals for inspiration and recipes
                    on how to create them.
                </p>
            </div>
        </div>

        <hr class="line-divider mx-md-2 mx-lg-5">

        <div class="row justify-content-center text-center px-md-5">
            <div class="col-12 py-4" id="meal-letters">
                <h4>Browse Meals</h4>
                <h5 class="pt-2">
                    <a>A</a>
                    /
                    <a>B</a>
                    /
                    <a>C</a>
                    /
                    <a>D</a>
                    /
                    <a>E</a>
                    /
                    <a>F</a>
                    /
                    <a>G</a>
                    /
                    <a>H</a>
                    /
                    <a>I</a>
                    /
                    <a>J</a>
                    /
                    <a>K</a>
                    /
                    <a>L</a>
                    /
                    <a>M</a>
                    /
                    <a>N</a>
                    /
                    <a>O</a>
                    /
                    <a>P</a>
                    /
                    <a>Q</a>
                    /
                    <a>R</a>
                    /
                    <a>S</a>
                    /
                    <a>T</a>
                    /
                    <a>U</a>
                    /
                    <a>V</a>
                    /
                    <a>W</a>
                    /
                    <a>X</a>
                    /
                    <a>Y</a>
                    /
                    <a>Z</a>
                </h5>
            </div>

            <div class="col-10 col-md-7 col-lg-5 pb-5">
                <form id="search-meal-form">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search-meal" placeholder="Search Meals..." />
                        <span class="input-group-append">
                            <button class="btn" id="search-meal-submit">
                                <span class="fas fa-search" aria-hidden="true"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-left" id="meal-results"></div>

        <hr class="line-divider mx-md-2 mx-lg-5">


    </div>

    <div class="modal fade" id="recipe-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">

                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" id="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
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
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

    <title>Motivation</title>
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
    <div class="jumbotron jumbotron-fluid p-0" id="motivation-jumbotron">
        <div class="row align-items-center h-100 mx-5">
            <div class="col">
                <span><a href="index.php">Home</a>
                    <span class="px-2">
                        &#8594;
                    </span>
                    Motivation
                </span>
                <h1 class="pt-3"><strong>Motivation</strong></h1>
                <p class="text-left">Wake up with determination. Go to sleep with satisfaction.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row pb-3 px-md-5">
            <div class="col-12 text-left px-md-1 px-lg-5">
                <p>
                    Sometimes a little push is needed to motivate someone to make a positive change in their
                    life. As human beings, we often face difficulties to find the motivation and determination to
                    achieve greatness within ourselves. We question whether we are able to find the time or have
                    the ability to do something, when all it takes is that first step of trying or participating.
                    The results of that first step may be a gateway to a newfound passion which encourages you to
                    continue on that path. And if not, at least you were able to find the courage to attempt it and
                    figure out firsthand that it wasn't for you. This applies to all walks of life, therefore, Get
                    Healthy has collected a list of inspirational quotes to help you take that first step. If others can
                    do it, why can't you?
                </p>
            </div>
        </div>

        <hr class="line-divider mx-md-2 mx-lg-5">

        <div class="row justify-content-center px-md-2">
            <h4 class="py-4">Quote Collection</h4>
            <section class="col-12 p-4 d-flex" id="card-list">
                <div class="card">
                    <div class="card-header">
                        <p id="category">Inspiration</p>
                        <h2>
                            "I'm selfish, impatient and a little insecure. I make mistakes, I am
                            out of control and at times hard to handle. But if you can't handle
                            me at my worst, then you sure as hell don't deserve me at my best."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Martin Luther King Jr., A Testament of Hope: The Essential Writings and Speeches
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Life</p>
                        <h2>
                            "Don't cry because it's over, smile because it happened."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Dr. Seuss
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Happiness</p>
                        <h2>
                            "Don't cry because it's over, smile because it happened."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Dr. Seuss
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Inspiration</p>
                        <h2>
                            "You've gotta dance like there's nobody watching,Love like you'll never be hurt,Sing
                            like there's nobody listening,And live like it's heaven on earth."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            William W. Purkey
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Inspiration</p>
                        <h2>
                            "I'm selfish, impatient and a little insecure. I make mistakes, I am
                            out of control and at times hard to handle. But if you can't handle
                            me at my worst, then you sure as hell don't deserve me at my best."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Marilyn Monroe
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Life</p>
                        <h2>
                            "You've gotta dance like there's nobody watching,Love like you'll never be hurt,Sing
                            like there's nobody listening,And live like it's heaven on earth."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            William W. Purkey
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Inspiration</p>
                        <h2>
                            "Be yourself; everyone else is already taken."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Oscar Wilde
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Life</p>
                        <h2>
                            "You only live once, but if you do it right, once is enough."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Mae West
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Inspiration</p>
                        <h2>
                            "Be the change that you wish to see in the world."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Mahatma Gandhi
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Wisdom</p>
                        <h2>
                            "No one can make you feel inferior without your consent."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Eleanor Roosevelt, This is My Story
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p id="category">Inspiration</p>
                        <h2>
                            "We accept the love we think we deserve."
                        </h2>
                    </div>

                    <div class="card-author">
                        <div class="author-name">
                            <div class="author-name-prefix">Author</div>
                            Stephen Chbosky, The Perks of Being a Wallflower
                        </div>
                    </div>
                </div>
            </section>
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
    <script type="module" src="scripts/main.js"></script>
</body>

</html>
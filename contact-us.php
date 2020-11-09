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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/main.css">

    <title>Contact Us | Get Healthy</title>
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
    <div class="jumbotron jumbotron-fluid p-0" id="contact-us-jumbotron">
        <div class="row align-items-center h-100 mx-5">
            <div class="col">
                <span><a href="index.php">Home</a>
                    <span class="px-2">
                        &#8594;
                    </span>
                    Contact Us
                </span>
                <h1 class="pt-3"><strong>Get In Touch</strong></h1>
                <p class="text-left">Drop us a line with any of the methods below. We're always happy to help.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row py-lg-4 px-2">
            <div class="col-12 col-lg-6 text-left">
                <h2 class="font-weight-bold pb-2">Our Office</h2>

                <p>
                    Our office headquarters is located in the town of Huddersfield. If you have any queries or would
                    like to discuss anything with us, the team in our HQ is available to talk.
                </p>

                <p class="font-weight-bold ml-3">
                    Get Healthy, <br />
                    Street Address, <br />
                    City/Town, <br />
                    Postcode, <br /> <br />
                    01484 012345 <br />
                </p>

                <p>
                    Alternatively, you can fill in the form to send a message to our team.
                </p>
            </div>

            <div class="col-12 col-lg-6" id="contact-form-col">
                <form method="post" class="px-4 py-5" id="contact-form" autocomplete="none" novalidate>
                    <div class="form-row pt-4">
                        <div class="col-6">
                            <div class="form-group row mx-1">
                                <input type="text" class="form-control" id="contact-firstname" name="contact-firstname" autocomplete="none" required />
                                <label class="form-ph invalid" for="contact-firstname">First Name</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group row mx-1">
                                <input type="text" class="form-control" id="contact-surname" name="contact-surname" required />
                                <label class="form-ph" for="contact-surname">Surname</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row pt-5">
                        <div class="col-12">
                            <div class="form-group row mx-1">
                                <input type="text" class="form-control" id="contact-email" name="contact-email" required />
                                <label class="form-ph" for="contact-email">Email Address</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row pt-5">
                        <div class="col-12">
                            <div class="form-group row mx-1">
                                <input type="text" class="form-control" id="contact-subject" name="contact-subject" required />
                                <label class="form-ph" for="contact-subject">Subject</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row pt-5">
                        <div class="col-12">
                            <div class="form-group row mx-1">
                                <textarea class="w-100 form-control" id="contact-message" name="contact-subject" rows="5" required></textarea>
                                <label class="form-ph" for="contact-message">Message</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn mt-4 form-button">
                        SEND
                    </button>
                </form>

                <div class="d-none form-response text-center" id="contact-form-response">
                    <h3 id="response-heading"></h3>
                    <p id="response-text"></p>
                    <div id="response-button"></div>
                </div>

            </div>
        </div>
    </div>

    <?php
    include "common/footer.html";
    ?>

    <!-- Script files(jQuery library, Popper JS, Latest Compiled Bootstrap JS, FontAwesome JS)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6cc49d804e.js" crossorigin="anonymous"></script>
    <script type="module" src="scripts/main.js" crossorigin="use-credentials"></script>
</body>

</html>
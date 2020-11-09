<?php
ini_set("session.save_path", "/home/vol10_2/epizy.com/epiz_26587846/htdocs/sessionData");
session_start();

if (isset($_SESSION['logged-in']) == true) {
    header("Location: ../index.php");
    exit;
}
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
    <link rel="stylesheet" href="../stylesheets/main.css">

    <title>Reset Password</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-center p-5" id="login-panel-left">
                <div class="row">
                    <div class="col-md-6 col-lg-12 text-center px-3 px-md-0">
                        <h3>New Here?</h3>

                        <p class="pt-2 pb-1">
                            Not a member yet? Simply sign up and enjoy the benefits of being a part of Get Healthy
                            by clicking the 'Sign Up' button below.
                        </p>

                        <a href="../index.php" class="btn identity-btn mr-2" role="button">
                            Home
                        </a>

                        <a href="register.php" class="btn identity-btn ml-2" role="button">
                            Sign Up
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-12 my-auto px-lg-5 pt-lg-4 d-none d-md-block">
                        <img src="../images/Reset-Password.svg" class="img-fluid px-lg-5" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center p-5" id="login-panel-right">
                <img src="../images/avatar.svg" class="mx-auto" id="reset-pwd-image" />
                <h2 class="pt-4" id="reset-pwd-heading"><strong>RESET PASSWORD</strong></h2>
                <p class="px-lg-3" id="reset-pwd-text">
                    Enter your email address below and we'll send you an email to reset your password.
                </p>

                <form method="post" class="form" id="reset-pwd-form" autocomplete="off" novalidate>
                    <div class="form-row mx-1 pt-4">
                        <input type="text" class="form-control" id="reset-pwd-email" name="reset-pwd-email" required />
                        <label class="form-ph" for="reset-pwd-email">Email Address</label>
                        <i class="fas fa-envelope"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        <small class="invisible">hidden</small>
                        <span id="reset-pwd-email-check" class="float-right"></span>
                    </small>

                    <button type="submit" class="btn mt-4 mt-lg-3 form-button">
                        REQUEST PASSWORD RESET
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- Script files(jQuery library, Popper JS, Latest Compiled Bootstrap JS, FontAwesome JS)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6cc49d804e.js" crossorigin="anonymous"></script>
    <script type="module" src="../scripts/main.js" crossorigin="use-credentials"></script>
</body>

</html>
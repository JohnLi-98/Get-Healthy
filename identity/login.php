<?php
ini_set("session.save_path", "/home/unn_w16010421/sessionData");
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

    <title>Sign In</title>
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

                    <div class="col-md-6 col-lg-12 my-auto px-lg-5 pt-lg-5 d-none d-md-block">
                        <img src="../images/Sign-In.svg" class="img-fluid px-lg-5" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center p-5" id="login-panel-right">
                <img src="../images/avatar.svg" class="mx-auto" />
                <h2 class="pt-4"><strong>SIGN IN</strong></h2>

                <form method="post" id="login-form">
                    <div class="form-row mx-1 pt-5">
                        <input type="text" class="form-control" id="login-username" name="login-username" required />
                        <label class="form-ph" for="login-username" id="login-username-ph">Username</label>
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="login-password" name="login-password" required />
                        <label class="form-ph" for="login-password" id="login-password-ph">Password</label>
                        <span class="fas fa-lock"></span>
                    </div>

                    <small class="float-right pt-2 mr-1">
                        <a href="#">Forgot Password?</a>
                    </small>

                    <button type="submit" class="btn mt-4 mt-lg-3" id="login-button">
                        SIGN IN
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
    <script type="module" src="../scripts/main.js"></script>
</body>

</html>
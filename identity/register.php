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

    <title>Sign Up</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-center px-5 py-4 order-2 order-lg-1" id="register-panel-left">
                <h2><strong>SIGN UP</strong></h2>
                <p class="pt-1">Fill in all fields below to create an account with us.</p>

                <form method="post" id="register-form" novalidate>
                    <div class="form-row mx-1 pt-4">
                        <input type="text" class="form-control" id="register-email" name="register-email" required />
                        <label class="form-ph" for="register-email" id="register-email-ph">Email Address</label>
                        <i class="fas fa-envelope"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        <small class="invisible">hidden</small>
                        <span id="email-check" class="float-right"></span>
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="text" class="form-control" id="register-username" name="register-username" required />
                        <label class="form-ph" for="register-username" id="register-username-ph">Username</label>
                        <i class="fas fa-user"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        6-32 characters
                        <span id="username-check" class="float-right"></span>
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="register-pwd" name="register-pwd" required />
                        <label class="form-ph" for="register-pwd" id="register-pwd-ph">Password</label>
                        <i class="fas fa-lock"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        8 or more characters
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="register-pwdC" name="register-pwdC" required />
                        <label class="form-ph" for="register-pwdC" id="register-pwdC-ph">Confirm Password</label>
                        <i class="fas fa-lock"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        8 or more characters
                        <span id="password-check" class="float-right"></span>
                    </small>

                    <button type="submit" class="btn mt-4" id="register-button">
                        SIGN UP
                    </button>
                </form>
            </div>

            <div class="col-lg-6 text-center p-5 order-1 order-lg-2" id="register-panel-right">
                <div class="row">
                    <div class="col-md-6 col-lg-12 text-center px-3 px-md-0 order-md-2">
                        <h3>Already a Member?</h3>

                        <p class="pt-2 pb-1">
                            Got an account with Get Healthy? Click the 'Sign In' button below and enter your details
                            to gain access to it.
                        </p>

                        <a href="../index.php" class="btn identity-btn mr-2" role="button">
                            Home
                        </a>

                        <a href="login.php" class="btn identity-btn ml-2" role="button">
                            Sign In
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-12 my-auto px-lg-5 pt-lg-5 d-none d-md-block order-md-1 order-lg-2">
                        <img src="../images/Sign-Up2.svg" class="img-fluid pt-lg-4" />
                    </div>
                </div>
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
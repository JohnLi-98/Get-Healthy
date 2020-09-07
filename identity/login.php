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

                    <div class="col-md-6 col-lg-12 my-auto px-lg-5 pt-lg-4 d-none d-md-block">
                        <img src="../images/Sign-In.svg" class="img-fluid px-lg-5" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center p-5" id="login-panel-right">
                <img src="../images/avatar.svg" class="mx-auto" />
                <h2 class="pt-4"><strong>SIGN IN</strong></h2>

                <form method="post" class="form" id="login-form" autocomplete="off" novalidate>
                    <div class="form-row mx-1 pt-5">
                        <input type="text" class="form-control" id="login-username" name="login-username" required />
                        <label class="form-ph" for="login-username">Username</label>
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="login-pwd" name="login-pwd" required />
                        <label class="form-ph" for="login-pwd">Password</label>
                        <span class="fas fa-lock"></span>
                    </div>

                    <small class="float-right pt-2 mr-1">
                        <a href="reset-password.php">Forgot Password?</a>
                    </small>

                    <button type="submit" class="btn mt-4 mt-lg-3 form-button">
                        SIGN IN
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid h-100 w-100 form-submit d-none" id="loader">
        <div class="row h-100">
            <div class="m-auto col-9 col-md-7 col-lg-5 justify-content-center align-items-center h-75 text-dark d-flex flex-column">
                <div class="response text-center text-white" id="loading-icon">
                    <i class="fas fa-spinner fa-pulse fa-4x"></i>
                    <h2 class="pt-4">Loading</h2>
                </div>

                <div class="response alert-danger text-center d-none" id="error-response">
                    <div class="mr-2 mt-1">
                        <button type="button" class="close close-loader" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <svg class="error mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="error-circle" cx="26" cy="26" r="25" fill="none" />
                        <line class="error-cross" x1="15" y1="15" x2="37" y2="37" stroke="white" stroke-width="2" />
                        <line class="error-cross" x1="37" y1="15" x2="15" y2="37" stroke="white" stroke-width="2" />
                    </svg>

                    <div class="mt-4 mx-4">
                        <h2>Error</h2>
                        <p id="error-message"></p>
                    </div>

                    <div class="mb-3">
                        <button type="button" class="btn btn-danger close-loader" aria-label="Close">Close</button>
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
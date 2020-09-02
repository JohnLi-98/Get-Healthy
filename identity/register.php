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

    <title>Sign Up</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-center px-5 py-4 order-2 order-lg-1" id="register-panel-left">
                <h2><strong>SIGN UP</strong></h2>
                <p class="pt-1">Fill in all fields below to create an account with us.</p>

                <form method="post" id="register-form" autocomplete="off" novalidate>
                    <div class="form-row mx-1 pt-4">
                        <input type="text" class="form-control" id="register-email" name="register-email" required />
                        <label class="form-ph" for="register-email">Email Address</label>
                        <i class="fas fa-envelope"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        <small class="invisible">hidden</small>
                        <span id="email-check" class="float-right"></span>
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="text" class="form-control" id="register-username" name="register-username" required />
                        <label class="form-ph" for="register-username">Username</label>
                        <i class="fas fa-user"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        6-32 characters
                        <span id="username-check" class="float-right"></span>
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="register-pwd" name="register-pwd" required />
                        <label class="form-ph" for="register-pwd">Password</label>
                        <i class="fas fa-lock"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        8 or more characters
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="register-pwdC" name="register-pwdC" required />
                        <label class="form-ph" for="register-pwdC">Confirm Password</label>
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

    <div class="container-fluid h-100 w-100 form-submit d-none" id="loader">
        <div class="row h-100">
            <div class="m-auto col-9 col-md-7 col-lg-5 justify-content-center align-items-center h-75 text-dark d-flex flex-column">
                <div class="response text-center text-white" id="loading-icon">
                    <i class="fas fa-spinner fa-pulse fa-4x"></i>
                    <h2 class="pt-4">Loading</h2>
                </div>

                <div class="response alert-success text-center py-5 d-none" id="success-response">
                    <svg class="success" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="success-circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="success-tick" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-width="2" />
                    </svg>

                    <div class="mt-4 mx-4">
                        <h2>Account Created</h2>
                        <p>
                            You can now enjoy the benefits of being a GET Healthy member. Please wait while we
                            redirect you back to our home page where you can sign in.
                        </p>
                    </div>
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
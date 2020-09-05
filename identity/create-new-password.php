<?php
//ini_set("session.save_path", "/home/vol10_2/epizy.com/epiz_26587846/htdocs/sessionData");
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

    <title>Create New Password</title>
</head>

<!--
<body id="create-pwd-body">
    <header>
        <div class="row py-4 justify-content-center">
            <a href="../index.php">
                <img src="../images/logo.png" />
            </a>
        </div>
    </header>
    <div class="container-fluid" id="create-pwd-container">
        <div class="row py-4">
            <div class="col-12 text-center">
                <h3><strong>CREATE NEW PASSWORD</strong></h3>
            </div>
        </div>
    </div>
-->

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-center p-5 d-flex align-items-center" id="login-panel-left">
                <img src="../images/Create-Pwd-Image.svg" class="img-fluid" />
            </div>

            <div class="col-lg-6 text-center p-5" id="login-panel-right">
                <img src="../images/avatar.svg" class="mx-auto" id="reset-pwd-image" />
                <h2 class="pt-4" id="reset-pwd-heading"><strong>CREATE NEW PASSWORD</strong></h2>

                <form method="post" class="form" id="reset-pwd-form" autocomplete="off" novalidate>
                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="create-pwd" name="create-pwd" required />
                        <label class="form-ph" for="create-pwd">New Password</label>
                        <i class="fas fa-lock"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        8 or more characters
                    </small>

                    <div class="form-row mx-1 pt-5">
                        <input type="password" class="form-control" id="create-pwdC" name="create-pwdC" required />
                        <label class="form-ph" for="create-pwdC">Confirm Password</label>
                        <i class="fas fa-lock"></i>
                    </div>

                    <small class="form-text text-muted text-left px-2">
                        8 or more characters
                        <span id="password-check" class="float-right"></span>
                    </small>

                    <button type="submit" class="btn mt-4 form-button" id="reset-button">
                        UPDATE PASSWORD
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
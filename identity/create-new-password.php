<?php
ini_set("session.save_path", "/home/vol10_2/epizy.com/epiz_26587846/htdocs/sessionData");
session_start();

if (isset($_SESSION['logged-in']) == true) {
    header("Location: ../index.php");
    exit;
}

// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br /> This service is currently unavailable. Please try again at a later time.");
}

require_once("../config/config.php");
$dbConn = getConnection();

function showForm($resetEmail)
{
?>
    <p class="px-lg-2 pt-2 d-none" id="create-pwd-text">

    </p>
    <form method="post" class="form" id="create-pwd-form" autocomplete="off" novalidate>
        <input type="hidden" id="reset-email" name="reset-email" value="<?php echo $resetEmail; ?>" />
        <div class="form-row mx-1 pt-4">
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
<?php
}

function showInvalidLink()
{
?>
    <div class="px-lg-2 pt-2">
        <p>
            We were unable to validate your request to create a new password. Be sure to click or copy the
            link in the password reset email. You can request a password reset email by clicking the button below.
        </p>

        <a href="reset-password.php" class="btn btn-block identity-btn mt-2">
            REQUEST PASSWORD RESET EMAIL
        </a>
    </div>
<?php
}

function showExpiredLink()
{
?>
    <div class="px-lg-2 pt-2">
        <p>
            The reset link you tried is either invalid or expired. You can request a
            new password reset link by clicking the button below.
        </p>

        <a href="reset-password.php" class="btn btn-block identity-btn mt-2">
            REQUEST PASSWORD RESET EMAIL
        </a>
    </div>
<?php
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

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-center align-items-center d-none d-lg-flex" id="login-panel-left">
                <img src="../images/Create-Pwd-Image.svg" class="img-fluid" />
            </div>

            <div class="col-lg-6 text-center p-5" id="login-panel-right">
                <img src="../images/avatar.svg" class="mx-auto" />
                <h2 class="pt-4" id="create-pwd-heading"><strong>CREATE NEW PASSWORD</strong></h2>

                <?php
                // if the tokens are empty or not a legit hexadecimal token, show error message
                if (
                    empty($_GET["selector"]) || empty($_GET["validator"]) ||
                    ctype_xdigit($_GET["selector"]) == false || ctype_xdigit($_GET["validator"]) == false
                ) {
                    showInvalidLink();
                } else {
                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];
                    $currentDate = date("U");

                    // Query database for an entry where the selector taken from url matches with one in password-reset 
                    // table and that the link has not expired.
                    $sqlQuery = "SELECT * FROM GH_password_reset WHERE resetSelector = :selector AND resetExpires >= :currentDate";
                    $stmt = $dbConn->prepare($sqlQuery);
                    $stmt->execute(array(':selector' => $selector, ':currentDate' => $currentDate));
                    $result = $stmt->fetchObject();

                    // If $result exists, convert the token in $validator to binary from hexadecimal, then check to
                    // see if the token matches with the one in the database.
                    if ($result) {
                        $tokenBinary = hex2bin($validator);
                        $tokenValid = password_verify($tokenBinary, $result->resetToken);
                    }

                    // Final check to see if there is a row in the database and that it is valid.
                    if (!$result || $tokenValid !== true) {
                        showExpiredLink();
                    } else {
                        $resetEmail = $result->resetEmail;
                        showForm($resetEmail);
                    }
                }

                ?>

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
<?php
// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br /> This service is currently unavailable. Please try again at a later time.");
}

require_once("../../config/config.php");
$dbConn = getConnection();

// Validation for update password form, checking for empty fields. 
if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
    $email = trim($email);
} else {
    http_response_code(400);
    die("An email address was not passed through.<br/>");
}

if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = filter_has_var(INPUT_POST, "password") ? $_POST["password"] : null;
} else {
    http_response_code(400);
    die("A password must be entered.<br/>");
}

if (isset($_POST["passwordConfirm"]) && !empty($_POST["passwordConfirm"])) {
    $passwordConfirm = filter_has_var(INPUT_POST, "passwordConfirm") ? $_POST["passwordConfirm"] : null;
} else {
    http_response_code(400);
    die("A password must be entered that matches the previous one.<br/>");
}

if (isset($password) == isset($passwordConfirm)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
} else {
    http_response_code(400);
    die("The passwords entered don't match, please try again.<br/>");
}

if (isset($email) && isset($passwordHash)) {
    try {
        $sqlQuery = "UPDATE GH_accounts SET passwordHash = :passwordHash WHERE email = :email";
        $stmt = $dbConn->prepare($sqlQuery);
        $stmt->execute(array(':passwordHash' => $passwordHash, ':email' => $email));
        $count = $stmt->rowCount();

        if ($count == 1) {
            $sqlQuery = "DELETE FROM GH_password_reset WHERE resetEmail = :email";
            $stmt = $dbConn->prepare($sqlQuery);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR, 255);
            $stmt->execute();
            exit;
        } else {
            http_response_code(500);
            die("<b>Server Error.</b><br> We were unable to update your password at this time. Please try again later.");
        }
    } catch (Exception $e) {
        die($e);
    }
} else {
    http_response_code(400);
    die("<b>Error.</b> We were unable to retrieve the email or password for your request. Please try again later.");
}

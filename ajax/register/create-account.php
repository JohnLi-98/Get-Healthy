<?php
// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br/> This service is currently unavailable. Please try again at a later time.");
}

require_once("../../config/config.php");
$dbConn = getConnection();

// Form validation for POST method to check fields are not empty
if (!empty($_POST['email'])) {
    $email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
    $email = trim($email);
} else {
    echo "An email address must be entered.<br/>";
}

if (!empty($_POST['username'])) {
    $username = filter_has_var(INPUT_POST, 'username') ? $_POST['username'] : null;
    $username = trim($username);
} else {
    echo "A username must be entered.<br/>";
}

if (!empty($_POST['password'])) {
    $password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
} else {
    echo "A password must be entered.<br/>";
}

if (!empty($_POST['passwordConfirm'])) {
    $passwordConfirm = filter_has_var(INPUT_POST, 'passwordConfirm') ? $_POST['passwordConfirm'] : null;
} else {
    echo "A password must be entered that matches the previous one.<br/>";
}

// Checks to see if both passwords entered match, to set the passwordHash variable.
if ($password == $passwordConfirm) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
} else {
    echo "The passwords entered don't match, please try again.<br/>";
}

// If all the previous steps are valid and variables are set, try to run the SQL query to make new account.
if (!empty($email) && !empty($username) && !empty($passwordHash)) {
    try {
        $sqlQuery = "INSERT INTO GH_accounts (email, username, passwordHash)
        VALUES ('$email', '$username', '$passwordHash')";

        $dbConn->exec($sqlQuery);
        //header("location: index.php");
        exit;
    } catch (PDOException $e) {
        echo $sqlQuery . "<br>" . $e->getMessage();
    }
}

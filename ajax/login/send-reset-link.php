<?php
// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br /> This service is currently unavailable. Please try again at a later time.");
}

require_once("../../config/config.php");
$dbConn = getConnection();

// Form validation for POST method to check fields are not empty
if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = filter_has_var(INPUT_POST, "email") ? $_POST["email"] : null;
    $email = trim($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
} else {
    http_response_code(400);
    die("<b>Missing Field.</b><br /> Make sure an email address is entered before trying again.");
}

// Check database to see if the user entered email exists.
try {
    $sqlQuery = "SELECT * FROM GH_accounts WHERE email=:email";
    $stmt = $dbConn->prepare($sqlQuery);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR, 255);
    $stmt->execute();
    $user = $stmt->fetchObject();
    $username = $user->username;
    $result = $stmt->rowCount();
} catch (Exception $e) {
    http_response_code(500);
    die("<b>Server Error.</b><br/> It looks like an error occured on our side while processing your request. Please try again.");
}

// Only run the following code block if the email matched with one in the database from the previous query.
if ($result == 1) {
    // If there is a match, create selector and token variables for password reset table.
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    $url = "http://gethealthy.infinityfreeapp.com/identity/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    // Sets expiryDate varibale to an hour (1800secs) ahead of the current time. "U" equals todays date in seconds since 1970
    $expires = date("U") + 3600;

    // First delete any existing rows that exist for a the entered email from pwdReset table
    $sqlDelete = "DELETE FROM GH_password_reset WHERE resetEmail=:email";
    $stmt = $dbConn->prepare($sqlDelete);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR, 255);
    $stmt->execute();

    // Then, insert the selector and token into the pwdReset table
    $sqlInsert = "INSERT INTO GH_password_reset (resetEmail, resetSelector, resetToken, resetExpires) VALUES
     (?, ?, ?, ?)";
    $stmt = $dbConn->prepare($sqlInsert);
    $stmt->execute(array($email, $selector, $hashedToken, $expires));
}

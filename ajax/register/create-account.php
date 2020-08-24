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
if (isset($_POST["email"]) && !empty($_POST['email'])) {
    $email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
    $email = trim($email);
} else {
    echo "An email address must be entered.<br/>";
}

if (isset($_POST["email"]) && !empty($_POST['username'])) {
    $username = filter_has_var(INPUT_POST, 'username') ? $_POST['username'] : null;
    $username = trim($username);
} else {
    echo "A username must be entered.<br/>";
}

if (isset($_POST["email"]) && !empty($_POST['password'])) {
    $password = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
} else {
    echo "A password must be entered.<br/>";
}

if (isset($_POST["email"]) && !empty($_POST['passwordConfirm'])) {
    $passwordConfirm = filter_has_var(INPUT_POST, 'passwordConfirm') ? $_POST['passwordConfirm'] : null;
} else {
    echo "A password must be entered that matches the previous one.<br/>";
}

// Checks to see if both passwords entered match, to set the passwordHash variable.
if (isset($password) == isset($passwordConfirm)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
} else {
    echo "The passwords entered don't match, please try again.<br/>";
}

// If all the previous steps are valid and variables are set, try to run the SQL query to make new account.
if (isset($email) && isset($username) && isset($passwordHash)) {
    try {
        $sqlQuery = "INSERT INTO GH_accounts (email, username, passwordHash)
        VALUES (?, ?, ?)";
        $stmt = $dbConn->prepare($sqlQuery);
        $stmt->execute(array($email, $username, $passwordHash));
        $response_array["status"] = "success";
        $response_array["redirect"] = "location: ../../index.php";
        header("Content-type: application/json");
        echo json_encode($response_array);
        exit;
    } catch (PDOException $e) {
        // catch code for when unable to create an account.
        http_response_code(400);
        die("<b>Email or Username Already Exists.</b><br/> Make sure these fields are valid before trying again.");
    }
} else {
    // return with error code and message if there are empty fields.
    http_response_code(400);
    die("<b>Missing Field(s).</b><br /> Make sure there are no empty fields before trying again.");
}

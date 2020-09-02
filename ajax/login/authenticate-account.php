<?php
// Initialise the session.
//ini_set("session.save_path", "/home/unn_w16010421/sessionData");
session_start();

// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br/> This service is currently unavailable. Please try again at a later time.");
}

require_once("../../config/config.php");
$dbConn = getConnection();

// Form validation for POST method to check fields are not empty and stores them into a variable for later use.
if (isset($_POST["username"]) && !empty($_POST["username"])) {
    $username = filter_has_var(INPUT_POST, "username") ? $_POST["username"] : null;
    $username = trim($username);
}

if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = filter_has_var(INPUT_POST, "password") ? $_POST["password"] : null;
}

if (isset($username) && isset($password)) {
    try {
        // Query the database to check whether the entered username exists and stores it into $user variable.
        $sqlQuery = "SELECT accountID, passwordHash FROM GH_accounts WHERE username = :username";
        $stmt = $dbConn->prepare($sqlQuery);
        $stmt->execute(array(":username" => $username));
        $account = $stmt->fetchObject();

        // If there is a user, verify the entered password with database's passwordHash value
        if ($account) {
            // If they match, store userID, username and logged-in to session variables
            if (password_verify($password, $account->passwordHash)) {
                $accountID = $account->accountID;
                $_SESSION["accountID"] = $accountID;
                $_SESSION["logged-in"] = true;
                $_SESSION["username"] = $username;

                // Check to see if there is a redirect session variable set, so user is sent to the correct page
                if (isset($_SESSION["login_redirect"])) {
                    // stores redirect link found in session variable to $response_array and passed to ajax caller
                    // before unsetting redirect session var.
                    $response_array["redirect"] = $_SESSION["login_redirect"];
                    header("Content-type: application/json");
                    echo json_encode($response_array);
                    unset($_SESSION["login_redirect"]);
                    exit;
                } else {
                    exit;
                }
            } else {
                // statement for when the password doesn't match with the hash stored in database for entered user.
                http_response_code(401);
                die("<b>Incorrect Credentials.</b><br/> The username and/or password was incorrect. Please try again.");
            }
        } else {
            // statement for when the entered username is not found in the database.
            http_response_code(401);
            die("<b>Incorrect Credentials.</b><br/> The username or password was incorrect. Please try again.");
        }
    } catch (PDOException $ex) {
        http_response_code(500);
        die("<b>Server Error.</b><br /> Unable to process the request at the moment. Please try again at a later time.");
    }
} else {
    // Statement to handle any missing fields that were found in the form.
    http_response_code(400);
    die("<b>Missing Field(s).</b><br /> Make sure the username and password fields are not empty before trying again.");
}

<?php
// Initialise the session.
ini_set("session.save_path", "/home/unn_w16010421/sessionData");
session_start();

// Unset all of the session variables.
$_SESSION = array();

// Kill the session and delete the session cookies.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

// Redirect to home page
//header("Location: ../index.php");
exit;

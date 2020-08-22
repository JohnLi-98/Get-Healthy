<?php

// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br/> This service is currently unavailable. Please try again at a later time.");
}

require_once("../../config/config.php");
$dbConn = getConnection();

// Queries the database for value found in the 'username' post variable. Will return the number of rows found from the
// query to the ajax caller.
try {
    $username = $_POST['username'];
    $sqlQuery = "SELECT username FROM GH_users WHERE username = :username";
    $stmt = $dbConn->prepare($sqlQuery);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR, 255);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $numRows = $stmt->rowCount();
    echo $numRows;
} catch (PDOException $e) {
    echo $sqlQuery . "<br>" . $e->getMessage();
}

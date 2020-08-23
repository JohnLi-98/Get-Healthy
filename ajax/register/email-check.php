<?php
// Check to see if dbConn file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br/> This service is currently unavailable. Please try again at a later time.");
}

require_once("../../config/config.php");
$dbConn = getConnection();

// Queries the database for value found in the 'email' post variable. Will return the number of rows found from the
// query to the ajax caller.
try {
    $userEmail = $_POST['email'];
    $sqlQuery = "SELECT email FROM GH_accounts WHERE email = :email";
    $stmt = $dbConn->prepare($sqlQuery);
    $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR, 255);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $numRows = $stmt->rowCount();
    echo $numRows;
} catch (PDOException $ex) {
    echo $sqlQuery . "<br>" . $e->getMessage();
}

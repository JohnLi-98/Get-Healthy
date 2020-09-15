<?php

// Check to see if config file exists. If not, throw 503 status code and response text with die(). Otherwise, store
// getConnection() into $dbConn variable.
if (!file_exists("../config/config.php")) {
    http_response_code(503);
    die("<b>Server Error.</b><br /> This service is currently unavailable. Please try again at a later time.");
}

require_once("../config/config.php");
$emailPwd = getEmailPwd();

// Form validation for POST method to check fields are not empty
if (isset($_POST["firstname"]) && !empty($_POST['firstname'])) {
    $firstname = filter_has_var(INPUT_POST, 'firstname') ? $_POST['firstname'] : null;
    $firstname = trim($firstname);
} else {
    http_response_code(400);
    die("A firstname must be entered.<br/>");
}

if (isset($_POST["surname"]) && !empty($_POST['surname'])) {
    $surname = filter_has_var(INPUT_POST, 'surname') ? $_POST['surname'] : null;
    $surname = trim($surname);
} else {
    http_response_code(400);
    die("A surname must be entered.<br/>");
}

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = filter_has_var(INPUT_POST, "email") ? $_POST["email"] : null;
    $email = trim($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
} else {
    http_response_code(400);
    die("<b>Missing Field.</b><br /> Make sure an email address is entered before trying again.");
}

if (isset($_POST["subject"]) && !empty($_POST['subject'])) {
    $subject = filter_has_var(INPUT_POST, 'subject') ? $_POST['subject'] : null;
} else {
    http_response_code(400);
    die("A subject must be entered.<br/>");
}

if (isset($_POST["message"]) && !empty($_POST['message'])) {
    $message = filter_has_var(INPUT_POST, 'message') ? $_POST['message'] : null;
} else {
    http_response_code(400);
    die("A message must be entered.<br/>");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$emailBody = '<h3>You have received a query from the Get Healthy Contact Form by ' . $email . '.</h3>';
$emailBody .= '<p>Name: ' . $firstname . ' ' . $surname . '</p>';
$emailBody .= '<p>Subject: ' . $subject . '</p>';
$emailBody .= '<p>Message: ' . $message . '</p>';

try {
    $mail = new PHPMailer(TRUE);
    $mail->addReplyTo($email, $firstname . ' ' . $surname);
    $mail->setFrom('gethealthyhelp@gmail.com', 'Get Healthy Contact Form');
    $mail->addAddress('gethealthyhelp@gmail.com', 'Get Healthy Help');
    $mail->Subject = 'Contact Form Email';
    $mail->Body = $emailBody;
    $mail->IsHTML(true);
    $mail->isSMTP();
    $mail->Mailer = 'smtp';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'gethealthyhelp@gmail.com';
    $mail->Password = $emailPwd;
    $mail->Port = 587;
    if (!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
} catch (Exception $e) {
    /* PHPMailer exception. */
    echo $e->errorMessage();
} catch (\Exception $e) {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    echo $e->getMessage();
}

<?php
$GLOBALS['FORMERRORS'] = [];

if (isset($_POST) === false || count($_POST) === 0) {
    return;
}





require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$prevSite = $_POST['prev_site'];

$formErrors = [];
$inputEmptyMessage = 'This field must not be empty.';
$inputWrongEmailMessage ='Please insert a valid e-mail address.';


//----------------------------------------------------------------------------------------------------------------------
$name = $_POST['name'];
if ($name === '') {
    $formErrors['name'][] = $inputEmptyMessage;
}

//----------------------------------------------------------------------------------------------------------------------
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $formErrors['email'][] = $inputWrongEmailMessage;
}
if ($email === '') {
    $formErrors['email'][] = $inputEmptyMessage;
}

//----------------------------------------------------------------------------------------------------------------------
$message = $_POST['message'];
if ($name === '') {
    $formErrors['message'][] = $inputEmptyMessage;
}

if (count($formErrors) > 0) {
    $GLOBALS['FORMERRORS'] = $formErrors;
    return;
}



$mail = new PHPMailer();
$mailhost = 'smtp.goneo.de:465:1';
$mailusername = 'info@michael-seifert-sound.com';
$mailpassword = '56qQ7vaFH3ataeD';

$mail->IsSMTP();
$mail->Host = $mailhost;
$mail->SMTPDebug = 1; // Kann man zu debug Zwecken aktivieren
$mail->SMTPAuth = true;
$mail->Username = $mailusername;
$mail->Password = $mailpassword;

$frommail = "info@michael-seifert-sound.com";
$fromname = "Kontaktanfrage";
$mail->SetFrom($frommail, $fromname);

$address = "info@michael-seifert-sound.com";
$adrname = "Kontaktanfrage";
$mail->AddAddress($address, $adrname);

$mail->Subject = "Anfrage Textformular";

$output = <<<EOF
E-Mail: $email
Name: $name
Nachricht: $message
EOF;

try {
    $mail->Send();
} catch (Exception $e) {
    var_dump($e);
}

//if ($mail->Send() == false) {
//    echo "Mailer Error: " . $mail->ErrorInfo;
//} else {
//    echo "Message sent!";
//}

//$mail->Send();
//
//header('Location: '.DOMAIN.'/');
?>
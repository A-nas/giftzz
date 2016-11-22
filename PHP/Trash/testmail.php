<?php
// Pear Mail Library
require_once "Mail-1.2.0/Mail.php";

$from = '<anass.laghouaouta@gmail.com>';
$to = '<anass.laghouaouta@hotmail.fr>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'anass.laghouaouta@gmail.com',
        'password' => 'anassanass...'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
?>
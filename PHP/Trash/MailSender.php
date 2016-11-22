
<?php
//phpinfo();
function sendActivation($message,$mail,$subject,$username){
    require "phpmailer/class.phpmailer.php"; //include phpmailer class
    // Instantiate Class  
    $mail = new PHPMailer();  
	
	// hadling errooooors chebeeeer
	//$mail->SMTPDebug  = 2; 
    
	/* Set up SMTP */  
    $mail->IsSMTP();                       // Sets up a SMTP connection  
    $mail->SMTPAuth = true;                // Connection with the SMTP does require authorization    
    //$mail->SMTPSecure = "ssl";           // Connect using a TLS connection  
    $mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com";        //Gmail SMTP server address	
    $mail->Port = 587;                     //Gmail SMTP port
    $mail->Encoding = '7bit';
    
    // Authentication  
    $mail->Username   = "GiftzzMailer@gmail.com";    // Your full Gmail address
    $mail->Password   = "ananass...";                // Your Gmail password
      
    // Compose
    $mail->SetFrom("reply@Giftzz.com","GIFTZZ");
    $mail->AddReplyTo("GiftzzMailer@gmail.com","GIFTZZ");
    $mail->Subject = $subject;      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress($mail,$username); // Where to send it - Recipient
    $result = $mail->Send();		               // Send!  
	$message = $result ? 'Successfully Sent!' : $mail->ErrorInfo;      
	unset($mail);
}
?>
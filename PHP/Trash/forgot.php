<?php
require "PHP/config.php";
require "PHP/stringcrypter.php";
require "PHP/phpmailer/class.phpmailer.php"; //include phpmailer class

if(isset($_POST['submit']))
{
	$hidenMail;
	//$message="";
	if(!empty($_POST['fetch'])){
		$fetch = mysql_real_escape_string($_POST['fetch']);
		$query = $bdd->prepare('select pseudo from utilisateur where EMAIL_UTILI = ? and activation = 1');
		$query->execute(array($fetch));
		$d = $query->fetch();
		$query->closeCursor();
		$count  = $query->rowCount();
		if($count > 0){ // c'est un utilisateur
		  // envoyer. un mail )
		  // inclure le nom de luser
		  $hash = md5( rand(0,1000) ); // code 32 bit
		  $query = $bdd->prepare('update utilisateur set hash = ? where EMAIL_UTILI = ? ');
		  $query->execute(array($hash,$fetch));
		  	   $to      = $fetch;              // Send email to our user
               $mmessage=
                           '
						   
                           Salut '.$d['pseudo'].'<br>
                           Vous avez demander recament un mot de passe pour votre compte . <br>
                           S\'il ne sagit pas de vous , vous pouvez ignorer ce message sinon vous pouvez renitialiser votre mot de passe en cliquant sur le lien suivant <br>
						   http://localhost/giftzz/active.php?email='.$fetch.'&hash='.$hash.' <br>
						   ';
	            // envoie du mail.
                $mails = new PHPMailer();  
	            // hadling errooooors chebeeeer
	            //$mail->SMTPDebug  = 2;
	            /* Set up SMTP */  
                $mails->IsSMTP();                       // Sets up a SMTP connection  
                $mails->SMTPAuth = true;                // Connection with the SMTP does require authorization    
                //$mail->SMTPSecure = "ssl";           // Connect using a TLS connection  
                $mails->SMTPSecure = 'tls';
	            $mails->Host = "smtp.gmail.com";        //Gmail SMTP server address	
                $mails->Port = 587;  //Gmail SMTP port
                $mails->Encoding = '7bit';
                // Authentication  
                $mails->Username   = "GiftzzMailer@gmail.com"; // Your full Gmail address
                $mails->Password   = "ananass123"; // Your Gmail password                    
                // Compose
                $mails->SetFrom("contact@GIFTZZ.com", "GIFTZZ");
                $mails->AddReplyTo($fetch,$d['pseudo']); // l'adresse du destinataire.
                $mails->Subject = "Redefinition de votre mot de passe GiftZZ";      // Subject (which isn't required)  
                $mails->MsgHTML($mmessage); 
                // Send To  
                $mails->AddAddress($fetch,$d['pseudo']); // Where to send it - Recipient
                $result = $mails->Send();		// Send!  
	            $message = $result ? 'Successfully Sent!' : $mails->ErrorInfo;      
	            unset($mails); // on detruis l'instance de classe le mail a ete deja envoyer (desalocation de memoir)
		  
		  
		  //*************************************
		  $message = "un email de redefinition de votre mot de passe a ete envoyeée a votre adresse email , veuillez consulter votre messagerie";
			
		}else{ // il s'agit d'un pseudo
					$query = $bdd->prepare('select EMAIL_UTILI from utilisateur where pseudo = ? and activation = 1');
		            $query->execute(array($fetch));
		            $count  = $query->rowCount();
			if($count > 0){
				$d = $query->fetch();
		        $query->closeCursor();
			    $hidenMail = showHidenEmail($d[0]);
				$message =  'veuillez saisir l\'email qui correspond au pseudo saisie pour pouvoir renitialiser votre Compte '.$hidenMail;
			}else $message = "il n'existe aucun utilisateur avec ces donnes";
		}
	} else $message = "veuillez saisir un pseudo ou un email";
	echo $message;
}
// mot de passe oublier
// saisir votre pseudo ou votre adresse email [select email_util from user where pseudo = ?] si vrais envoyer mail s'il existe
//                                            [select pseudo from user where email = ?]   saisir mail a******b@mail.com -> envoyer s'il existe

?>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Giftzz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/smal.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
		<form action="forgot.php"  method="POST">
		<h2>saisir votre Email Ou Pseudo</h2>
	    <input type="text" placeholder="Pseudo ou Email" name="fetch" />
		<button type="submit" class="btn btn-default" name="submit">Connexion</button>
		</form>
</body>	
<html>
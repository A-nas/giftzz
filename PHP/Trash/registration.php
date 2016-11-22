<?php
require "./config.php"
require "phpmailer/class.phpmailer.php";
function registration(){
	 if(!empty($_POST['username']) or !empty($_POST['password']) or empty($_POST['mail']))
	  {  
	   $query = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE EMAIL_UTILI = ? or psuedo = ?');
	   if($query->execute(array($_POST['mail'],$_POST['username'])))
	   {
		   if($query->fetchcolumn()>0)
		   {
			   $message = "ce nom d'utilisateur ou adresse electronique est deja prise ou invalide : veuillez choisir un autre";
		   }
		   else
		   {
			    $username = mysql_real_escape_string($_POST['username']);
		        $password = mysql_real_escape_string($_POST['password']);
		        $mail = mysql_real_escape_string($_POST['mail']);
				$hash = md5( rand(0,1000) );
				//$password = rand(1000,5000); enregistrer le compte avec activation 0 , si les deux hashes s'applique donc on modifier le champ de modification
			   $query = $bdd->prepare("INSERT USERS(UserName,UserEMail,UserPassword,hash,active) VALUES(?,?,?,?,?)");
			   if($query->execute(array($username,$mail,$password,$hash,'0')/* or die(print_r($bdd->errorInfo()))   */ )) // on enregistre l'utilisateur avec une activation 0 ;
			   {	
			   // code d'envoie de mail 
			   $to      = $mail;              // Send email to our user
               $subject = 'Signup | Activation de votre compte E-TROC'; // Give the email a subject 
               $mailmessage = '
			   
                           Merci pour votre inscription!
                           Votre compte a ete creé, vous pouvez vous connecter avec les informations d\'identification suivantes après que vous avez activé votre compte en appuyant sur l\'url ci-dessous.
                           ------------------------
                           Username: '.$username.'
						   ------------------------
 
                            S\'il vous plaît cliquer sur ce lien pour activer votre compte:
							http://localhost/giftzz/verify.php?email='.$mail.'&hash='.$hash.'
							';
			   $headers = 'From:noreply@yourwebsite.com' . "\r\n";  // Set from headers
               sendActivation($message,$mail,$subject,$username);			   
               $message = "vous etes desormais inscris! veuillez consulter votre adresse electronique pour activer votre compte";			   
			   //$_SESSION['id']=$_POST['username']; faire au moment de l'activation
			   //header("Location: Bienvenu.php"); ***
			   }else echo $message = "il ya une erreur lors de l'enregistrement veuillez ressayer ulterierement";			   
		   }
	   }else echo $message = "une erreur est survenue lors de l\'enregistrement !!";
     }else  $message = "veuillez remplire tous les champs!";
return $message;
}
?>
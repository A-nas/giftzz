<?php
require "PHP/config.php";
require "PHP/stringcrypter.php";
require "PHP/phpmailer/class.phpmailer.php"; //include phpmailer class

if(isset($_POST['submit']))
{
	$hidenMail;
	//$message="";
	if(!empty($_POST['fetch'])){
		$fetch = $_POST['fetch'];
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
		  $success = 0;
			
		}else{ // il s'agit d'un pseudo
					$query = $bdd->prepare('select EMAIL_UTILI from utilisateur where pseudo = ? and activation = 1');
		            $query->execute(array($fetch));
		            $count  = $query->rowCount();
			if($count > 0){
				$d = $query->fetch();
		        $query->closeCursor();
			    $hidenMail = showHidenEmail($d[0]);
				$message =  'veuillez saisir l\'email qui correspond au pseudo saisie pour pouvoir renitialiser votre Compte '.$hidenMail;
				$success= 0;
			}else $message = "il n'existe aucun utilisateur avec ces donnes";
		}
	} else $message = "veuillez saisir un pseudo ou un email";
	//echo $message;
}
// mot de passe oublier
// saisir votre pseudo ou votre adresse email [select email_util from user where pseudo = ?] si vrais envoyer mail s'il existe
//                                            [select pseudo from user where email = ?]   saisir mail a******b@mail.com -> envoyer s'il existe

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | Giftzz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script src="js/panier.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<?php include('php\header.php');?>
				</div>
			</div>
		</div><!--/header-middle-->
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">l'accueil</a></li>
								<li class="dropdown"><a href="" >Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php" >produits</a></li>
										<li><a href="panier-details.php">panier</a></li> 
										<li><a href="login.php"> Login</a></li> 
                                    </ul>
                                </li>  
								<li class="dropdown"><a href="" >Propose Une idee Cadeau<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    </ul>
                                </li> 
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			 			    				    								
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center"> Mot de Passe Oublier</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				<?php  
				if(isset($message)){
					if(isset($success)){
						echo '<script>swal("^_____^!", "'.$message.'", "success")</script>';
						//unset($success);
					}
					else{
				echo '<script>swal({   title: "Erreur!",   text: "'.$message.'",   type: "error",   confirmButtonText: "OK" });</script>'; }} ?>
		<form action="forgot.php"  method="POST">
		<strong>saisir votre Email Ou Pseudo</strong>
	    <input type="text" placeholder="Pseudo ou Email" name="fetch" />
		<button type="submit" class="btn btn-default" name="submit">Valider</button>
		</form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<div class="social-networks">
	    					<h2 class="title text-center">Réseaux sociaux</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	<?php include 'footer.php';?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
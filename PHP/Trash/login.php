<!DOCTYPE html>
<?php 
require "PHP/config.php";
require "PHP/phpmailer/class.phpmailer.php"; //include phpmailer class

if(isset($_POST['registration']))
{
// no fct :( :( :( :( :( 
	 if(!empty($_POST['username']) or !empty($_POST['password']) or empty($_POST['mail']))
	  {  
	   $query = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE EMAIL_UTILI = ? or pseudo = ?');
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
			   $query = $bdd->prepare("INSERT utilisateur(pseudo,EMAIL_UTILI,MOT_DE_PASS_UTIL,hash,activation) VALUES(?,?,?,?,?)");
			   if($query->execute(array($username,$mail,$password,$hash,"0")/* or die(print_r($bdd->errorInfo()))   */ )) // on enregistre l'utilisateur avec une activation 0 ;
			   {	
			   // code d'envoie de mail 
			   $to      = $mail;              // Send email to our user
               $subject = 'Signup | Activation de votre compte GIFTZZ'; // Give the email a subject 
               $mailmessage = '
			   
                           Merci pour votre inscription!
                           Votre compte a ete creé, vous pouvez vous connecter avec les informations d\'identification suivantes après que vous avez activé votre compte en appuyant sur l\'url ci-dessous.
                           ------------------------
                           Username: '.$username.'
						   ------------------------
 
                            S\'il vous plaît cliquer sur ce lien pour activer votre compte:
							http://localhost/giftzz/php/verify.php?email='.$mail.'&hash='.$hash.'
							';
							//$mailmessage = "hello word";
			   //$headers = 'From:noreply@yourwebsite.com' . "\r\n";  // Set from headers
               //sendActivation($message,$mail,$subject,$username);		
               // *******************
$mmessage=
'
			   
                           Merci pour votre inscription! <br>
                           Votre compte a ete cree, vous pouvez vous connecter avec les informations d\'identification suivantes apres que vous avez active votre compte en appuyant sur l\'url ci-dessous. <br>
                           ------------------------ <br>
                           Username: '.$username.' <br>
						   ------------------------ <br>
 
                            S\'il vous plait cliquer sur ce lien pour activer votre compte: <br>
							http://localhost/giftzz/verify.php?email='.$mail.'&hash='.$hash.' <br>
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
    //$mail->Username   = "anass.laghouaouta@gmail.com"; // Your full Gmail address
    //$mail->Password   = "anassanass..."; // Your Gmail password
    $mails->Username   = "GiftzzMailer@gmail.com"; // Your full Gmail address
    $mails->Password   = "ananass123"; // Your Gmail password                    

	 
    // Compose
    $mails->SetFrom("contact@GIFTZZ.com", "GIFTZZ");
    $mails->AddReplyTo($mail,$username); // l'adresse du destinataire.
    $mails->Subject = "Activation du compte GIFTZZ";      // Subject (which isn't required)  
    $mails->MsgHTML($mmessage);
 
    // Send To  
    $mails->AddAddress($mail,$username); // Where to send it - Recipient
    $result = $mails->Send();		// Send!  
	$message = $result ? 'Successfully Sent!' : $mails->ErrorInfo;      
	unset($mails);
			   
               // *******************
               $message = "vous etes desormais inscris! veuillez consulter votre adresse electronique pour activer votre compte";			   
			   //$_SESSION['id']=$_POST['username']; faire au moment de l'activation
			   //header("Location: Bienvenu.php"); ***
			   }else echo $message = "il ya une erreur lors de l'enregistrement veuillez ressayer ulterierement";			   
		   }
	   }else echo $message = "une erreur est survenue lors de l'enregistrement ?!!";
     }else  $message = "veuillez remplire tous les champs!";
//return $message;
echo $message;
}

if(isset($_POST['login']))
{
	if(!empty($_POST['username']) or !empty($_POST['password']))
	{
	$query = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE pseudo = ? and MOT_DE_PASS_UTIL = ? and activation = 1');	
	  if($query->execute(array($_POST['username'],$_POST['password']))  )
      { 
             if($query->fetchcolumn()>0)
             {
	         //$_SESSION['id']=$_POST['username'];
	         //header("Location: Bienvenu.php");
			 $message = "vous etes connecté ^__^";
	         }else $message = "identifiant ou mot de passe incorrecte";
		
	  }else $message= "une erreur est survenue lors de la connexion veuillez ressayer ulterierement";
	}else $message = "veuillez remplire tous les champs"; 
	echo $message;
}
?>
<html lang="en">
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
	<header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Compte</a></li>
								
								
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								<li><a href="login.html" class="active"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
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
								<li><a href="index.html">Accueille</a></li>
								<li class="dropdown"><a href="#">boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Produit</a></li>
										<li><a href="product-details.html">Detail Produit</a></li> 
										
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html" class="active">Login</a></li> 
                                    </ul>
                                </li> 								
								
								<li><a href="contact-us.html">Contacte</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Recherche"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Connection a votre compte</h2>
						<form action="login.php"  method="POST">
							<input type="text" placeholder="pseudo" name="username" />
							<input type="password" placeholder="mot de passe" name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Me maintenir connecté							</span>
							<button type="submit" class="btn btn-default" name="login">Connexion</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OU</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Nouveau utilisateur!</h2>
						<form action="login.php" method="POST">
							<input type="text" placeholder="Nom" name="username"/>
							<input type="email" placeholder="Adresse Email" name="mail"/>
							<input type="password" placeholder="Mot de passe" name="password"/>
							<button type="submit" class="btn btn-default" name="registration">Enregistrer</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>G</span>iftzz</h2>
							<p>offrant en dormant</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>premier site de cadeau au Maroc</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>A propos de GIFTZZ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>A propos de GIFTZZ</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Obtenez les plus récentes mises  <br />à jour de notre site...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-Giftzz Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
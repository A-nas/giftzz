<!DOCTYPE html>
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
	<script src="js/panier.js"></script>    
    <link rel="shortcut icon" href="images/home/smal.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</head><!--/head-->
<?php
// tester les directives et introduit un head dynamique + redirection page connexions et pages intouvables
require "PHP/PasswordHash.php";
require "PHP/config.php";
require "PHP/phpmailer/class.phpmailer.php"; //include phpmailer class
//session_destroy();
//require "PHP/PasswordHash.php";
//
//echo $hash;
if(isset($_POST['registration']))
{
// no fct :( :( :( :( :( 
	 if(!empty($_POST['username']) or !empty($_POST['password']) or empty($_POST['mail']))
	  {
		  if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
	   $username = $_POST['username'];
	   $password = $_POST['password'];
	   $mail = $_POST['mail'];
	   $query = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE EMAIL_UTILI = ? or pseudo = ?');
	   if($query->execute(array($_POST['mail'],$_POST['username'])))
	   {
		   if($query->fetchcolumn()>0)
		   {
			   $message = "ce nom d'utilisateur ou adresse electronique est deja prise ou invalide : veuillez choisir un autre";
		   }
		   else
		   {
                // on genere un hash d'activation (cas d'enregistrement).
				$hash = md5( rand(0,1000) );
				//$password = rand(1000,5000); enregistrer le compte avec activation 0 , si les deux hashes s'applique donc on modifier le champ de modification
			    $password = create_hash($password); // on cree le salted hash pour le mdp saisi
			   
			   $query = $bdd->prepare("INSERT utilisateur(pseudo,EMAIL_UTILI,MOT_DE_PASS_UTIL,hash,activation,TYPE_UTILISATEUR) VALUES(?,?,?,?,?,'USER')");
			   if($query->execute(array($username,$mail,$password,$hash,"0")/* or die(print_r($bdd->errorInfo()))   */ )) // on enregistre l'utilisateur avec une activation 0 ;
			   {	
			   // code d'envoie de mail 
			   $to      = $mail; // Send email to our user
               $subject = 'Signup | Activation de votre compte GIFTZZ'; // Give the email a subject 
               $mmessage=
                           '
			   
                           Merci pour votre inscription! <br>
                           Votre compte a ete cree, vous pouvez vous connecter avec les informations d\'identification suivantes apres que vous avez active votre compte en appuyant sur l\'url ci-dessous. <br>
                           ------------------------ <br>
                           Username: '.$username.' <br>
						   ------------------------ <br>
 
                           S\'il vous plait cliquer sur ce lien pour activer votre compte: <br>
						   http://localhost/giftzz/php/verify.php?email='.$mail.'&hash='.$hash.' <br>
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
               $success = 0;			   
			   //$_SESSION['id']=$_POST['username']; faire au moment de l'activation
			   //header("Location: Bienvenu.php"); ***
			   
			   }else echo $message = "il ya une erreur lors de l'enregistrement veuillez ressayer ulterierement";	// a adapter le code n'est pas lisible :@		   
		   }
		   
	   }else  $message = "une erreur est survenue lors de l'enregistrement ?!!";
	  }else $message = "adresse de messagerie non valide";
	}else  $message = "veuillez remplire tous les champs!";
//echo '<script>swal({   title: "Erreur!",   text: "'.$_SESSION['role'].'",   type: "error",   confirmButtonText: "OK" });</script>';
//echo "<script>swal({   title: \"Erreur!\",   text: \"Here's my error message! \",   type: \"error\",   confirmButtonText: \"OK\" });</script>";
}

if(isset($_POST['login']))
{
	if(!empty($_POST['username']) or !empty($_POST['password'])){	
	
		// on enleve les carateres speciaux 
			    $username = $_POST['username'];
		        $password = $_POST['password'];
		// selectionner le mdp
	$query = $bdd->prepare('select MOT_DE_PASS_UTIL,TYPE_UTILISATEUR,EMAIL_UTILI from utilisateur where pseudo = ? and activation = 1');
    $query->execute(array($username));
	$count = $query->rowCount();	
	  if($query->execute(array($username)))
      {
             if($query->rowCount()>0)
             {
		        $d = $query->fetch();
		        $query->closeCursor();
				 if(validate_password($password,$d['MOT_DE_PASS_UTIL']))
				 {
					 // working code
					 $message = 'Bienvenu '.$username;
					 $success = 0;
					 $_SESSION['id']=$_POST['username'];  // activation de la session.
					 $_SESSION['role'] = $d['TYPE_UTILISATEUR'];
					 $_SESSION['mail'] = $d['EMAIL_UTILI'];
	                 if($_SESSION['role'] == 0){
						header("Location: index.php?page=1");
					 }else{
					 header("Location: admin/pages/index.php?page=1");
					 }
				 } else $message = "identifiant ou mot de passe incorrecte";
	         }else $message = "informations invalide";
	  }else $message= "une erreur est survenue lors de la connexion veuillez ressayer ulterierement";
	}else $message = "veuillez remplire tous les champs"; 
	//echo $message;
}
?>
<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php?page=1"><img src="images/home/logo.png" alt="" /></a>
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
								<li><a href="index.php?page=1">l'accueil</a></li>
								<li class="dropdown"><a href="" >Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php" >produits</a></li>
										<li><a href="panier-details.php">panier</a></li> 
										<li><a href="login.php"> Login</a></li> 
                                    </ul>
                                </li>  
                                <li class="dropdown"><a href="ideeCadeaux.php" >Propose Une idee Cadeau</a></li>								
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="search.php" method="POST">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search" name="search"/>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				
				
				<?php  
				if(isset($_POST['login']) or isset($_POST['registration'])){
					if(isset($success)){
						echo '<script>swal("Merci!", "'.$message.'", "success")</script>';
						//unset($success);
					}
					else{
				echo '<script>swal({   title: "Erreur!",   text: "'.$message.'",   type: "error",   confirmButtonText: "OK" });</script>'; }} ?>
				
					<div class="login-form"><!--login form-->
						<h2>Connection a votre compte</h2>
						<form action="login.php"  method="POST">
							<input type="text" placeholder="pseudo" name="username" />
							<input type="password" placeholder="mot de passe" name="password" />
							<span>
								<a href="forgot.php">Mot de passe oublier ?</a>
							</span>
							<button type="submit" class="btn btn-default" name="login">Connexion</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OU</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Nouvel utilisateur!</h2>
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
<?php include 'footer.php';?>
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
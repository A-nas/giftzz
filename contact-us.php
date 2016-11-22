<?php
// si l'utilisateur est connecter on demande que le message et le sujet
// si aucun utilisateur n'est connecter on prend l'email et le nom etc ... // tester si ca passe pour un email deja enregistrer
// redondance des informations dans la bdd :(
//
//            _____________________                ___________________               _______________
//           |        users       |               |      messages     |             |    NonUser    |
//           |____________________|               |___________________|             |_______________|
//           |Email (primary key) |<0,1-------inf>|#mail              |<0,1-----inf>|Nom            |
//           |...                 |               |sujet              |             |mail(primayK)  |
//           |...                 |               |messageTexte       |             |               |
//           |____________________|               |___________________|             |_______________|
//                   ^
//                   |
//                   |
//                   |
//            _______v____________       
//           |       (???)        |                        \/ 
//           |____________________|                       (¤¤)
//           |                    |                      --||> 
//           |                    |                        /\
//           |                    |
//           |____________________|
//  
// forget it, i fix'em :D
//
//
require "PHP/config.php";
if(isset($_POST['submit']))
{

   // si l'itulisateur n'est pas connecté il peux passer par un autre membre du site en entrant son adresse mail(a tester) --> bloquer
   // s'il fais rentrer 
	 if(!empty($_POST['subject']) or !empty($_POST['message'])){
		 if(!isset($_SESSION['mail'])){
		     if(!empty($_POST['name']) or !empty($_POST['email'])){
				 
				 
				 $name  = $_POST['name'];			 
                 $email = $_POST['email'];
                 $subject = $_POST['subject'];
                 $mmessage = $_POST['message'];
			    
		         $query = $bdd->prepare('select * from Utilisateur where EMAIL_UTILI = ?');
		         $query->execute(array($email)); //echo 'erreur requette';
		         $count = $query->rowCount();
		             if($count == 0 ){
		 		        $query = $bdd->prepare('select * from NonUtilisateur where EMAIL_UTILI = ?');
		                $count = $query->rowCount();
		                      if($count == 0 ){
		  		                 $query = $bdd->prepare('insert into NonUtilisateur(Nom,mail) values(?,?)');
		                         $query->execute(array($name,$email));
						         $message = "Votre message a ete bien trasmis, merci de votre contacte , veuillez inscrivez avec nous pour profiter des avantages d'espace membres";
		                      }
		            }else $message = "si vous etes utilisateur veuillez vous connecter pour envoyer un ticket au Support";
		 }else $message = "veuillez remplir tous les champs";
	 $query = $bdd->prepare('insert into message(mail,sujet,messageTexte) values(?,?,?)'); // insertion du message et du sujet dans ts les cas . 
	 $query->execute(array($email,$subject,$mmessage));	
	 $success = 0;
	 }else{
	 $subject = $_POST['subject'];
     $mmessage = $_POST['message'];
	 $query = $bdd->prepare('insert into message(sujet,messagetexte,mail) values(?,?,?)');
	 $query->execute(array($subject,$mmessage,$_SESSION['mail']));
	 $message = "Votre message a ete bien trasmis, merci de votre contacte";
	 $success = 0;
	        }
	 }else {$message = "veuillez remplir tous les camps requis"; $success = 1;}
}

?>
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
	    				<h2 class="title text-center"> contactez-Nous</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="contact-us.php" id="main-contact-form" class="contact-form row" name="contact-form" method="POST">
				            
							<?php
							//$_SESSION['mail']='ohsitlel';
							//unset($_SESSION['mail']);
                             if(!isset($_SESSION['id'])){
								 echo '<div class="form-group col-md-6">
				                       <input type="text" name="name" class="form-control" required="required" placeholder="Nom">
				                       </div>
				                       <div class="form-group col-md-6">
				                       <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				                       </div>';
							 }								 
							?>

							<?php
							if(isset($success))
								if($success == 0){
								echo '<script>swal("Merci!", "'.$message.'", "success")</script>';
								}else{
									echo '<script>swal({   title: "Erreur!",   text: "'.$message.'",   type: "error",   confirmButtonText: "OK" });</script>';
								}
								unset($success);
								?>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Sujet">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Votre message ici"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Envoyer">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">CONTACT</h2>
	    				<address>
	    					<p>Giftzz Inc.</p>
							<p>935 AVENU HASSANE 2,IMM EL KAWTAR</p>
							<p>RABAT MAROC</p>
							<p>Mobile: 06 61 12 23 44</p>
							<p>Fax:    05 37 69 83 12</p>
							<p>Email: info@Giftzz.com</p>
	    				</address>
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
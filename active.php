<?php 
require "PHP/config.php";
require "PHP/PasswordHash.php";
//if(isset($_GET['email'],$_GET['hash'])){}
// selectionne le compte en question avec le hash existant et activation 1 
// si le hash correspond a l'hash de la bd qui corrspond a l'email dans l'url on echo un formulaire de changement de mdp et on valide sinn le lien est expiré ou n'existe pas.
if(isset($_POST['submit'])){
	// enregistrer le nv mdp et passer le hash a null
	  $pass1 = $_POST['password1'];
	  $pass2 = $_POST['password2'];
	  if($pass1 === $pass2){
		  $pass1 = create_hash($pass1);
		  //$query = $bdd->prepare("update utilisateur set MOT_DE_PASS_UTIL = ? and hash = NULL where EMAIL_UTILI = ? ");
		  // UPDATE `giftzz`.`utilisateur` SET `MOT_DE_PASS_UTIL` = 'ceci est un mdp' WHERE `utilisateur`.`EMAIL_UTILI` = 'anass.laghouaouta@gmail.com'
          $query = $bdd->prepare("UPDATE `giftzz`.`utilisateur` SET `MOT_DE_PASS_UTIL` = ?  , `hash` = NULL WHERE `utilisateur`.`EMAIL_UTILI` = ?");		  
	      $query->execute(array($pass1,$_SESSION['emailcb']));
		  $message = 'Votre mot de passe a ete changée , veuillez vous authentifier votre nouveau mot de passe';
		  $send = 0;
		  //echo 'mot de passe == '.$pass1.'email =='.$_SESSION['emailcb'].'';
		  unset($_SESSION['emailcb']);
	  }else $message = 'mot de passe non identique';
}else{
	  if(isset($_GET['email'],$_GET['hash'])){
	  $email = $_GET['email'];
      $hash = $_GET['hash'];
      $query = $bdd->prepare("select * from utilisateur where EMAIL_UTILI = ? and hash = ? and activation = 1 and hash is not NULL");
      $query->execute(array($email,$hash));
         if($query->rowCount() > 0){
					        $confirmed = 0;
							$message = 'veuillez rentrer votre nouveau mot de passe';
							$_SESSION['emailcb']=$email;					
							//$_SESSION['']=;
         } else $message = 'Lien non valide ou expiré ! ';
     } else $message = 'Page Introuvable'; // parametres manquates
}
//echo $message;
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
                            
							
							<?php if(isset($confirmed)){
							echo '<form action="active.php" id="main-contact-form" class="contact-form row" name="contact-form" method="POST">				            
				            <div class="form-group col-md-12">
				            <input type="password" name="password1" class="form-control" required="required" placeholder="mot de passe">
				            <br/>
				            <input type="password" name="password2" class="form-control" required="required" placeholder="Confirmer mot de passe">
				            </div>
				            <div class="form-group col-md-12">
				            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Envoyer">
				            </div>
				            </form>';
							}else
							{
								if(isset($send))
									echo '<script>swal("^_____^!", "'.$message.'", "success")</script>';
									else
								echo '<script>swal({   title: "Erreur!",   text: "'.$message.'",   type: "error",   confirmButtonText: "OK" });</script>'; } ?>
							
							

							
							
							
							
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
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>G</span>iftzz</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
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
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
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
							<h2>About Giftzz</h2>
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
							<h2>About Giftzz</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 Giftzz Inc.Tous les droits sont réservés.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
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
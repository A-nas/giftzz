<!DOCTYPE html>
<?php
require_once'connect.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Compte | Giftzz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<script src="js/panier.js"></script>
	<link href="css/responsive.css" rel="stylesheet">     
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
<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php?page=1"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<?php 
					require_once 'connect.php';
					include('php\header.php');
					?>
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
						<h2>Modifier votre compte</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
						<?php
								try
								{$bdd= new PDO('mysql:host=localhost;dbname=giftzz','root','');}
								catch(Exception $e)
								{die('Erreur: '.$e->getMessage());}
								$user=$_SESSION['id'];
								$art="select EMAIL_UTILI from utilisateur where pseudo =\"$user\"";
                                $redart=mysql_query($art);
								$lire= mysql_fetch_assoc($redart);
								$email=$lire['EMAIL_UTILI'];
								$req="select * from utilisateur where pseudo =\"$user\"";
								$reponse=$bdd->query($req);
								while($donnees=$reponse->fetch())
								{$nom=$donnees['NOM_UTILI'];
								$pre=$donnees['PRENOM_UTIL'];
								$civ=$donnees['CIVILITE_UTIL'];
								$dat=$donnees['DATE_NAISS_UTIL'];
								$adr=$donnees['ADRESSE_UTIL'];
								$cod=$donnees['CODE_POSTALE_UTIL'];
								$vil=$donnees['VILLE_UTIL'];
								$tel_d=$donnees['TELE_DOMICILE'];
								$tel_p=$donnees['TELE_PORTABLE'];
								echo "<input type=\"text\" placeholder=\"Nom\" value=\"$nom\" name=\"nom\"/>";
								echo "<input type=\"text\" placeholder=\"Prénom\" value=\"$pre\" name=\"pre\"/>";
								echo "<b>Civilité :</b></br>";
								echo "M.   <input type=\"radio\" name=\"sex\" id=\"M\" value=\"M\"";
								if ($civ=="M") echo 'checked="checked"';echo"/>";
								echo "Mlle <input type=\"radio\" name=\"sex\" id=\"Mlle\" value=\"Mlle\"";
								if ($civ=="Mlle") echo 'checked="checked"';echo"/>";
								echo "Mme  <input type=\"radio\" name=\"sex\" id=\"Mme\" value=\"Mme\"";
								if ($civ=="Mme") echo 'checked="checked"';echo"/>";
								echo"<input type=\"text\" placeholder=\"date\" value=\"$dat\" name=\"dat\"/>";
								echo"<input type=\"text\" placeholder=\"Adresse\" value=\"$adr\" name=\"adr\"/>";
								echo"<input type=\"text\" placeholder=\"Code postale\" value=\"$cod\" name=\"cod\"/>";
								echo "<input type=\"text\" placeholder=\"Ville\" value=\"$vil\" name=\"vil\"/>";
								echo "<input type=\"text\" placeholder=\"Tele domicile\" value=\"$tel_d\" name=\"tel_d\"/>";
								echo "<input type=\"text\" placeholder=\"Tele portable\" value=\"$tel_p\" name=\"tel_p\"/>";
								echo "<input type=\"submit\" class=\"btn btn-primary\" name=\"Mod\" value=\"Modifier\"/>";
								$reponse->closeCursor();
								}
								//code de la modification
								if(@$_REQUEST['Mod'] == 'Modifier'){
								$nom=$_POST['nom'];
								$pre=$_POST['pre'];
								if($_POST['sex'] == "M")
								  {$civ="M";}
								elseif($_POST['sex'] == "Mlle")
								  {$civ='Mlle';}
								elseif($_POST['sex'] == "Mme")
								  {$civ='Mme';}
								$dat=$_POST['dat'];
								$adr=$_POST['adr'];
								$cod=$_POST['cod'];
								$vil=$_POST['vil'];
								$tel_d=$_POST['tel_d'];
								$tel_p=$_POST['tel_p'];
                                $update="UPDATE utilisateur SET NOM_UTILI = :nom,PRENOM_UTIL = :pre,
                                CIVILITE_UTIL = :civ ,DATE_NAISS_UTIL = :dat ,ADRESSE_UTIL = :adr,CODE_POSTALE_UTIL = :cod,VILLE_UTIL = :vil,
	                            TELE_DOMICILE = :tel_d,TELE_PORTABLE= :tel_p WHERE  EMAIL_UTILI =\"$email\"";
								$req = $bdd->prepare($update);
								$req->execute(array(
								'nom' => $nom,
								'pre' => $pre,
								'civ' => $civ,
								'dat' => $dat,
								'adr' => $adr,
								'cod' => $cod,
								'vil' => $vil,
								'tel_d' => $tel_d,
								'tel_p' => $tel_p
								));
								echo '<script>swal("Merci!","Votre compte a ete modifier !!", "success")</script>';
								echo"<SCRIPT LANGUAGE=\"JavaScript\">document.location.href = \"compte.php\"</script>";}
								?>
						</form>
					</div>
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
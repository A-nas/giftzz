<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Idee Cadeaux | Giftzz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/remake.css" rel="stylesheet"> <!-- remake css page -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<script src="js/panier.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="AnimatedCheckboxes/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="AnimatedCheckboxes/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="AnimatedCheckboxes/css/component.css" />
		<script src="AnimatedCheckboxes/js/modernizr.custom.js"></script>
</head><!--/head-->
<?php 
require_once'connect.php';
if(isset($_POST['rechercher'])){
	// tester pour chaque checkbox checkec 
	// tester le radiobutton selectionner (une seul fois pour eviter les anomalies)
	// tester la liste deroulante (seul valeur)
	// tester l'age ^$
	$requette = 'select * from Article a 
	             join categorie c on c.code_cat=a.code_cat 
				 join lier l on l.cod_article=a.cod_article 
				 join destination d on d.id_des=l.id_des 
				 join attacher at on at.cod_article=a.cod_article
				 join evenement e on e.ID_EVENEMENT=at.ID_EVENEMENT
				 where 1=1 ';
	if(isset($_POST['r1'])){ // si un radiobutton a ete selectionné
	$requette = $requette . 'and c.Nom_cat = \''.$_POST['r1'].'\' ';
	//echo '-----'.$requette.'-------';
		//echo 'tu vien de selectionné le radiobutton  '.$_POST['r1'];
	}
	if(isset($_POST['Age']) and !empty($_POST['Age'])){ 
	  $requette = $requette . 'and '.$_POST['Age'].' between AGE_MIN and AGE_MAX ';
	  //echo 'vous avez mis l\'age '.$_POST['Age']; // si l'age e ete mis
	}
	if(!empty($_POST['check_list'])) { // tous les checkbox selectionné
	$premier = true;
	//echo '-----'.count($_POST['check_list']).'-----';
	$count = count($_POST['check_list']);
    $c = 0;
	foreach($_POST['check_list'] as $check) {
		if($premier){
		 $requette = $requette . 'and d.Nom_des = \''.$check.'\' and ';
		 $premier = false;
		}else{
		 $requette = $requette . 'd.Nom_des = \''.$check.'\' ';
		 if($count-1 != $c ){ $requette = $requette . ' and ';}
		}
            //echo $check; // A REVOIR
    $c = $c + 1;
	}
}	
	/*if(isset($_POST['evenement'])){ // l'evenement selectionné
		$requette = $requette . 'and e.Nom_evenement = \''.$_POST['evenement'].'\'';
		//echo 'tu a selectionné le : '.$_POST['evenement'];
	}*/
	$_SESSION['rech'] = $requette;
	header('location:idee.php');
//********* Maintenant il faut construire la requette puis rediriger vers la page qui affiche les articles en question *********************//
//===========> demain voir le modele relationnel et elaborer la requette .	
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
								<li><a href="index.php?page=1">Aceuille</a></li>
								<li class="dropdown"><a href="shop.php">Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Produit</a></li>
										<li><a href="panier-details.php">Panier</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li>							
								<li><a href="contact-us.php">Contacte</a></li>
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
		</div>
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			 			    				    								
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  
                  <h2 class="title text-center"> IDÉES DE CADEAUX </h2>			
	    		<div class="col-sm-8">
				
				<form method="POST"  action="ideeCadeaux.php">
				<table>
   <tr>
       <td>
	                    <h1>Je sais qu'il aime</h1>
						<div class="ac-custom ac-checkbox ac-cross" autocomplete="off">
						<ul>
						<li><input id="cb1" name="check_list[]" type="checkbox" value="ANIMAUX"><label for="cb1">ANIMAUX</label></li>
						<li><input id="cb2" name="check_list[]" type="checkbox" value="AUTO"><label for="cb2">AUTO/MOTO</label></li>
						<li><input id="cb3" name="check_list[]" type="checkbox" value="BRICOLAGE"><label for="cb3">BRICOLAGE</label></li>
						<li><input id="cb4" name="check_list[]" type="checkbox" value="CUISINE"><label for="cb4">CUISINE</label></li>
						<li><input id="cb5" name="check_list[]" type="checkbox" value="LECTURE"><label for="cb5">LECTURE</label></li>
						<li><input id="cb6" name="check_list[]" type="checkbox" value="JEUX"><label for="cb5">JEUX</label></li>
						<li><input id="cb7" name="check_list[]" type="checkbox" value="SPORT"><label for="cb5">SPORT</label></li>
						<li><input id="cb8" name="check_list[]" type="checkbox" value="MUSIC"><label for="cb5">MUSIC</label></li>
						<li><input id="cb9" name="check_list[]" type="checkbox" value="TECHNOLOGIE"><label for="cb5">TECHNOLOGIE / HI-TECH</label></li>
					    <li><input id="cb10" name="check_list[]" type="checkbox" value="MODE"><label for="cb5">MODE</label></li>
						<li><input id="cb11" name="check_list[]" type="checkbox" value="DECORATION"><label for="cb5">DECORATION</label></li>
						</ul>
						</div>
	   </td>
	   <td>
   <div class="ac-custom ac-radio ac-fill" autocomplete="off">
						<h1>J'offre à</h1>
						<ul>
						<li><input id="r1" name="r1" value="HOMMES" type="radio"><label for="r1">UN HOMME</label></li>
						<li><input id="r2" name="r1" value="FEMMES" type="radio"><label for="r2">UNE FEMME</label></li>
						<li><input id="r3" name="r1" value="COUPLE" type="radio"><label for="r3">UN COUPLE</label></li>
						<li><input id="r4" name="r1" value="ENFANT" type="radio"><label for="r4">UN ENFANT</label></li>
						<li><input id="r4" name="r1" value="NOUVERLLE TECHNOLOGIE" type="radio"><label for="r4">NOUVERLLE TECHNOLOGIE</label></li>
						</ul>
						</div>

	   </td>
	   <td>
	                    <h1>Il a</h1>
						<input type="text" placeholder="Age" name="Age" />
	   </td>
	   <td>
	                      <h1>événement</h1>
						  <select name="evenement" id="webmenu">
						  <option value="Sélectionner_une_occasion" >Sélectionner une occasion</option>
                          <option value="Anniversaire">Anniversaire</option>
                          <option value="Anniversaire de mariage">Anniversaire de mariage</option>
                          <option value="Baptème">Baptème</option>
                          <option value="Diplôme"  >Diplôme</option>
                          <option value="Fête des Mères">Fête des Mères</option>
                          <option value="Halloween">Halloween</option>
						  <option value="Mariage">Mariage</option>
						  <option value="Naissance">Naissance</option>
						  <option value="Nouvel an">Nouvel an</option>
						  <option value="Retraite">Retraite</option>
						  <option value="Saint-Valentin">Saint-Valentin</option>
                          </select>
						  
	   </td>
	   <td>
	    <br><br><button type="submit" class="btn btn-default" name="rechercher">RECHERCHER</button>	
	   </td>
   </tr>
</table>
 </form>		  
	   		</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<?php include 'footer.php';?>
    <script src="AnimatedCheckboxes/js/svgcheckbx.js"></script>
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
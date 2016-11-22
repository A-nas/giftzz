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
	$_SESSION['rech'] ="select * from article";
	require_once'connect.php';
	if(isset($_POST['rechercher'])){
	$requette = 'select distinct * from Article a 
	             left join categorie c on c.code_cat=a.code_cat 
                 left join lier l on l.cod_article=a.cod_article 
				 left join destination d on d.id_des=l.id_des 
				 left join attacher at on at.cod_article=a.cod_article
				 left join evenement e on e.ID_EVENEMENT=at.ID_EVENEMENT
				 where 1=1 ';
				 if(!empty($_POST['check_list'])) 
				 { 
						$premier = true;
						$count = count($_POST['check_list']);
						foreach($_POST['check_list'] as $check) 
						{
							if($premier)
							{$requette = $requette . 'and c.Nom_cat = \''.$check.'\'';
							 $premier = false;}else
							{$requette = $requette . 'or c.Nom_cat = \''.$check.'\' ';}
							}
				}
				
				if(isset($_POST['r1']))
				{ 
						$requette = $requette . 'and d.Nom_des = \''.$_POST['r1'].'\' ';
				}
				if(isset($_POST['Age']) and !empty($_POST['Age']))
				{ 
				$requette = $requette . 'and '.$_POST['Age'].' between AGE_MIN and AGE_MAX ';
				}
				if(/*isset($_POST['evenement'])*/ strcmp($_POST['evenement'], 'SELECTIONNER UN EVENEMENT') !== 0)
				{ 
				$requette = $requette . 'and e.Nom_evenement = \''.$_POST['evenement'].'\'';
				}
				$requette = $requette . ' group by a.COD_ARTICLE';
	$_SESSION['rech'] = $requette;
	header('location:idee.php');			 
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
	   <?php
require_once'connect.php';
$cat="select * from categorie";
$redcat=mysql_query($cat);
?>
	                    <h1>Je sais qu'il aime</h1>
						<div class="ac-custom ac-checkbox ac-cross" autocomplete="off">
						<ul>
						<?php while($lire= mysql_fetch_assoc($redcat)){?>
						<li><input id="cb1" name="check_list[]" type="checkbox" value="<?php echo $lire['NOM_CAT'];?>"><label for="cb1"><?php echo $lire['NOM_CAT'];?></label></li>
						<?php }?>
						</ul>
						</div>
	   </td>
	   <td>
   <div class="ac-custom ac-radio ac-fill" autocomplete="off">
   	   <?php
$des="select * from destination";
$reddes=mysql_query($des);
?>
						<h1>J'offre à</h1>
						<ul>
						<?php while($lire= mysql_fetch_assoc($reddes)){?>
						<li><input id="r1" name="r1" value="<?php echo $lire['NOM_DES'];?>" type="radio"><label for="r1"><?php echo $lire['NOM_DES'];?></label></li>
						<?php }?>
						</ul>
						</div>
	   </td>
	   <td>
	                    <h1>Il a</h1>
						<input type="text" placeholder="Age" name="Age" />
	   </td>
	   <td>
	      	   <?php
$eve="select * from evenement";
$redeve=mysql_query($eve);
?>
	                     <h1>événement</h1>
						  <select name="evenement" id="webmenu">
					      <option value="SELECTIONNER UN EVENEMENT" selected>SELECTIONNER UN EVENEMENT</option>
						  <?php while($lire= mysql_fetch_assoc($redeve)){?>
						  <option value="<?php echo $lire['NOM_EVENEMENT'];?>" ><?php echo $lire['NOM_EVENEMENT'];?></option>
                           						  
						  <?php }?>
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
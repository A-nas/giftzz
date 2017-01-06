<!DOCTYPE html>
<?php
require_once 'connect.php';
?>
<?php
$getcat=$_GET['COD_S_CAT'];
?>
<?php
$scat='select * 
from article a , categorie c ,sous_categorie s 
where a.CODE_CAT=c.CODE_CAT
and c.CODE_CAT= s.CODE_CAT
and a.code_cat = '.$_GET['COD_CAT'].' and s.COD_S_CAT = '.$getcat;

//echo $scat;



$redcat=mysql_query($scat);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Giftzz</title>
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
								<li class="dropdown"><a href="" class="active">boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php" class="active">produits</a></li>
										<li><a href="product-details.php?id=<?php echo $a["id"] ?>" >produits détails</a></li> 
										<li><a href="Panier.php">panier</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li> 
                                    <ul role="menu" class="sub-menu">
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
			</div>
	</header>
	
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.png" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>SOUS CATEGORIE</h2>
						<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						<?php $lire= mysql_fetch_assoc($redcat)?>
						<div class="MARQUES_products">
							<div class="MARQUES-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> + <?php echo $lire['NOM_S_CAT'];?></a></li>
								</ul>
							</div>
						</div>
						
						<!--/category-productsr-->
						</div>
						<div class="price-range"><!--price-range-->
							<h2>GAMME DE PRIX</h2>
							<div class="well text-center">
							<form action="search_prix.php" method="POST">
							<?php $min="select min(PRIX) as PRIX from article" ; $redmin=mysql_query($min);?>
									<?php $liremin= mysql_fetch_assoc($redmin)?>
									<?php $max="select max(PRIX) as PRIX from article" ; $redmax=mysql_query($max);?>
									<?php $liremax= mysql_fetch_assoc($redmax)?>
								 <input type="text" class="span2" value="250" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"name="prix" ><br />
								 <b class="pull-left"><?php echo $liremin['PRIX']."€";?></b> <b class="pull-right"><?php echo $liremax['PRIX']."€";?></b>
								 <br>
								 <input class="btn btn-default add-to-cart" type="submit"  value="ok"/>
								  </form>
							</div>
						</div><!--/price-range-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">propose des articles</h2>	
		   <!------------------------arcicle-----><!------------------------arcicle-----><!------------------------arcicle----->
		   <?php while($lire2= mysql_fetch_assoc($redcat)){?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/shop/<?php echo $lire2['IMAGE'];?>"/>
									<h2><?php echo $lire2['PRIX'];?></h2>
                                    <p><?php echo $lire2['LIBELLE_ARTICLE'];?></p>									
									<a href="pr<oduct-details.php?COD_ARTICLE=<?php echo $lire2['COD_ARTICLE'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shoppingcart"></i>afficher detail</a>
				                </div>
							</div>
						</div>
					</div>
			<?php }?>
           <!------------------------arcicle-----><!------------------------arcicle-----><!------------------------arcicle----->
					</div>
					<!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php include 'footer.php';?>
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
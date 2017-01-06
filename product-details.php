<!DOCTYPE html>
<?php
require_once 'connect.php';
$getart=$_GET['COD_ARTICLE'];
$art="select * from article where COD_ARTICLE = ".$getart;
$redart=mysql_query($art);
$artnum=mysql_num_rows($redart);
$cat="select * from categorie";
$redcat=mysql_query($cat);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | Giftzz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<script src="js/jquery-1.2.6.min.js"></script>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/jquery.elevatezoom.js"></script>
	<script src="js/panier.js"></script>
	<link href="css/responsive.css" rel="stylesheet">
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
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
								<li><a href="index.php?page=1">l'accueil </a></li>
								<li class="dropdown"><a href="">boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">produits</a></li>
										<li><a href="panier-details.php">panier</a></li> 
										<li><a href="login.php"> Login</a></li> 
                                    </ul>
                                </li> 
                                    <ul role="menu" class="sub-menu">
                                    </ul>
                                </li>
								<li class="dropdown"><a href="ideeCadeaux.php" >Propose Une idee Cadeau</a></li>
								<li><a href="contact-us.php">contact</a></li>
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
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>CATEGORIE</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr--> 
							<?php while($lire= mysql_fetch_assoc($redcat)){?>
						<div class="MARQUES_products">
							<div class="MARQUES-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="categorie.php?CODE_CAT=<?php echo $lire['CODE_CAT'];?>"> +  <?php echo $lire['NOM_CAT'];?></a></li>
								</ul>
							</div>
						</div>
						<?php }?>
						</div><!--/category-products-->
						<div class="price-range"><!--price-range-->
							<h2>GAMME DE PRIX</h2>
							<div class="well text-center">
							<form action="search_prix.php" method="POST">
							<?php $min="select min(PRIX) as PRIX from article" ; $redmin=mysql_query($min);?>
									<?php $liremin= mysql_fetch_assoc($redmin)?>
									<?php $max="select max(PRIX) as PRIX from article" ; $redmax=mysql_query($max);?>
									<?php $liremax= mysql_fetch_assoc($redmax)?>
								 <input type="text" class="span2" value="250" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" name="prix" ><br />
								 <b class="pull-left"><?php echo $liremin['PRIX']."€";?></b> <b class="pull-right"><?php echo $liremax['PRIX']."€";?></b>
								 <br>
								 <input class="btn btn-default add-to-cart" type="submit"  value="ok"/>
							 </form>
							</div>
						</div><!--/price-range-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						<div class="view-product">
						<?php if($artnum > 0) {?>
						<?php while($lire= mysql_fetch_assoc($redart)){?>
						<img id="zoom_01" src='images/shop/<?php echo $lire['IMAGE'];?>' data-zoom-image="images/large/<?php echo $lire['IMAGE'];?>"/>
         <script>
         $('#zoom_01').elevateZoom({
         zoomType: "inner",
         cursor: "crosshair",
         zoomWindowFadeIn: 500,
         zoomWindowFadeOut: 750}); 
         </script>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information">
							<!--/product-information-->
							        
								<p><b>Web ID: <?php echo $lire['COD_ARTICLE'];?></b></p><br>
								<p><b>Nom de produit : </b><?php echo $lire['LIBELLE_ARTICLE'];?></p>
								<span>
									<span>Prix : <?php echo $lire['PRIX'];?> €</span>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										ajouter au panier
									</button>
									<br><br>
									<input id="iid" value="<?php echo $lire['COD_ARTICLE'];?>" type="hidden" />
								</span>
								<p><b>La Quantité En Stocke : </b><?php echo $lire['QTE'];?> </p><br>
								<p><b>Description : </b><?php echo $lire['DESCRIPTION'];?></p><br>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<?php }?>	
						<?php } else{  echo"<SCRIPT LANGUAGE=\"JavaScript\">document.location.href = \"404.php\"</script>";} ?>					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Avis</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<form action="" method="POST">
										<span>
											<input type="text" name ="nom" placeholder="Voter Nom"/>
											<input type="email" name ="email" placeholder="Votre Email"/>
										</span>
										<textarea name="message" placeholder="Message a Envoyer"></textarea>
										<button type="submit" name = "ok" class="btn btn-default pull-right">
											Envoyer
										</button>
									</form>
									<?php
									if(isset($_POST['ok']))
									{
									if(!empty($_POST['nom']) and !empty($_POST['email']) and !empty($_POST['message']) ){
									$nom=$_POST['nom'];
									$email=$_POST['email'];
									$message=$_POST['message'];
									$date=date("Y/m/d");
									$sql=mysql_query("insert into avis values('$nom','$email','$message','$date')");
									echo '<script>swal("Merci '.$nom.'", "Votre Message a ete Envoyer", "success")</script>';}
									else
								    {
									echo '<script>swal({   title: "Erreur!",   text: "veuillez remplire tous les champs",   type: "error",   confirmButtonText: "OK" });</script>';
								    }
									}
									?>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
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
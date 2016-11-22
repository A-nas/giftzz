<!DOCTYPE html>
<?php
require_once'connect.php';
$art="select * from article limit 0,9";
$redart=mysql_query($art);
$cat="select * from categorie";
$redcat=mysql_query($cat);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aceuille | Giftzz</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<script src="js/panier.js"></script>
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
								<li><a href="index.php" class="active">Aceuille</a></li>
								<li class="dropdown"><a href="shop.php">Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Produit</a></li>
										<li><a href="panier-details.php">Panier</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="ideeCadeaux.php" >Propose Une idee Cadeau</a></li> 								
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
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>G</span>iftzz</h1>
									<h2></h2>
									<button type="button" class="btn btn-default get">l'obtenir</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/abdel.png" class="girl img-responsive" alt="" />
									<img src="images/home/pircing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>G</span>iftzz</h1>
									<h2></h2>
									<p></p>
									<button type="button" class="btn btn-default get">l'obtenir</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/img1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/..png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>G</span>iftzz</h1>
									<h2></h2>
									<p></p>
									<button type="button" class="btn btn-default get">l'obtenir</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/img1.png" class="girl img-responsive" alt="" />
									<img src="images/home/pircing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>G</span>iftzz</h1>
									<h2></h2>
									<p></p>
									<button type="button" class="btn btn-default get">l'obtenir</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/img2.png " class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
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
								 <input type="text" class="span2" value="250" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"name="prix" ><br />
								 <b class="pull-left"><?php echo $liremin['PRIX']."DH";?></b> <b class="pull-right"><?php echo $liremax['PRIX']."DH";?></b>
								 <br>
								 <input class="btn btn-default add-to-cart" type="submit"  value="ok"/>
								  </form>
							</div>
						</div><!--/price-range-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">articles proposés</h2>	
<!------------------------arcicle-----><!------------------------arcicle-----><!------------------------arcicle-----><!------------------------arcicle----->
		   <?php while($lire= mysql_fetch_assoc($redart)){?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/shop/<?php echo $lire['IMAGE'];?>"	 />
									<h2><?php echo $lire['PRIX']."DH";?></h2>
                                    <p><?php echo $lire['LIBELLE_ARTICLE'];?></p>									
									<a href="product-details.php?COD_ARTICLE=<?php echo $lire['COD_ARTICLE'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shoppingcart"></i>afficher detail</a>
				                </div>
							</div>
						</div>
					</div>
			<?php }?>
<!------------------------arcicle-----><!------------------------arcicle-----><!------------------------arcicle-----><!------------------------arcicle----->
				</div><!--features_items-->
					<?php
                         $art="select * from article";
                         $redart=mysql_query($art);
                     ?>
				<ul class="pagination">
					 <?php $lire= mysql_num_rows($redart);
					 $a=$lire/9;
					 $a=ceil($a);
					 for($b=2;$b<=$a;$b++)
					 {
					 ?>
					 <li class=""><a href="pagination.php?page=<?php echo $b; ?>"><?php echo $b; ?></a></li>
					 <?php  } ?>
					<li><a href="pagination.php?page=<?php echo $b-1; ?>">&raquo;</a></li>
					
				</div>
			</div>
		</div>
	</section>
	<?php include 'footer.php';?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
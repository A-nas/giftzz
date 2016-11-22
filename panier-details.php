<!DOCTYPE html>
<?php
require_once'connect.php';
$a=Objet::instance("article");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Panier | GIFTZZ</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<script src="js/panier.js"></script>
	<link href="css/responsive.css" rel="stylesheet">
	<script src="js/jquery-1.2.6.min.js"></script>       
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
								<li><a href="index.php?page=1">Accueil</a></li>
								<li class="dropdown"><a href="shop.php">Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Produit</a></li>
										<li><a href="panier-details.php" class="active">Panier</a></li> 
										<li><a href="login.php">s'authentifier</a></li> 
                                    </ul>
                                </li>
								<li class="dropdown"><a href="ideeCadeaux.php" >Propose Une idee Cadeau</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php?page=1">Accueil</a></li>
				  <li class="active">Panier</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Description </td>
							<td class="price">Prix</td>
							<td class="quantity">La Quantité</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody class="panier">
					<tr>
					</tr>
					</tbody>
					<tbody class="test">
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="Panier_items">
		<div class="container">
			<div class="breadcrumbs">
			</div>
			<div class="table-responsive-Panier_info">
			<div class="col-sm-6" class="table table-condensed total-result">
			</div>
			</div>
		</div>
	</section> <!--/#Panier_items-->
<?php include 'footer.php';?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
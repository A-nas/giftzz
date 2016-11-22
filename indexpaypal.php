<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<script src="js/panier.js"></script>    
	<link href="css/responsive.css" rel="stylesheet">  
	<script src="js/jquery-1.2.6.min.js"></script>	
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<title> PayPal </title>
</head>
<?php
require_once 'connect.php';
$prix=$_POST['prix'];
$dol=$prix/9.74;
$con= round($dol,2);
$qte=$_POST['qte'];
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
					<?php include('php\header.php');
					if(isset($_SESSION['id'],$_SESSION['role'])){
                    if($_SESSION['role'] == 'USER'){}}else{
  	echo '<script>swal({   title: "Erreur!",   text: "Authentification est exigée au moment d’achat",   type: "error",   confirmButtonText: "OK" });</script>';
					echo"<SCRIPT LANGUAGE=\"JavaScript\">document.location.href = \"login.php\"</script>";}
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
								<li><a href="index.php?page=1">Accueil</a></li>
								<li class="dropdown"><a href="">Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Produit</a></li>
										<li><a href="panier-details.php" class="active">Panier</a></li> 
										<li><a href="login.php">s'authentifier</a></li> 
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="" >Propose Une idee Cadeau</a></li>								
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
	                    <div class="shopper-info">
						<form><input type="hidden" ><input type="hidden" ><input type="hidden" ><input type="hidden" ></form>
					</div>
				</div>
<div class="as_wrapper">
	<div class="col-sm-5 ">
	<div class="form-two">
	</br></br>
    <form action="paypal.php" method="POST"> <?php // remove sandbox=1 for live transactions ?>
    <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="invoice" value="<?php echo date("His").rand(1234, 9632); ?>" />
    <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="invoice" value="" />
	<input type="text" name="payer_fname" value="<?php echo $_SESSION['id'];?>" />
    <input type="text" name="product_name" value="Produit : Cadeau" />
        <input type="hidden" name="product_amount" value="<?php echo $con ;?>" />
        <input type="text"  value="Prix : <?php echo $con ;?> $" />
		<input type="text" name="" value="Qte : <?php echo $qte ;?>" />
		<input type="hidden" name="payer_email" value="" />
        <input class="btn btn-primary" type="submit" name="submit" value="Valider" />
    </form><br><br><br><br><br><br><br><br>
	<?php 
	if(isset($_POST['submit']))
	{
		if(session_start())
		{
			echo"<SCRIPT LANGUAGE=\"JavaScript\">document.location.href = \"login.php\"</script>";
		}
	}
	?>
 </div>
</div>
</div>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
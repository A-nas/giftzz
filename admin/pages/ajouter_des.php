<!DOCTYPE html>
<?php
require_once'connect.php';
include 'securite.php';
$ms="select * from avis LIMIT 0 , 5";
$redms=mysql_query($ms);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giftzz Admin</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
							<a href="../../index.php"><img src="images/logo.png" alt="" /></a>
							<a class="navbar-brand" href="index.php"> Administrateur</a>
            </div>
			<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="divider"></li>
						<?php while($lirems=mysql_fetch_assoc($redms)){?>
                        <li>
                            <a href="message.php">
                                <div>
                                    <strong><?php echo $lirems['nom'];?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $lirems['date'];?></em>
                                    </span>
                                </div>
                                <div><?php echo $lirems['message']." ...";?></div>
                            </a>
                        </li>                         
                        <?php }?>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="message.php">
                                <strong>Lire Tous les Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
					
                    <ul class="dropdown-menu dropdown-user">
					   
                        <li><a href="../../login.php"><i class="fa fa-sign-out fa-fw"></i> Deconexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
			</ul>
			
			 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Gestion utilisateur<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="ajouter_uts.php">Ajouter des utilisateur</a>
                                </li>
                                <li>
                                    <a href="sup_uts.php">Supprimer des utilisateur</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Gestion des articles<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ajouter_art.php">Ajouter des articles</a>
                                </li>
                                <li>
                                    <a href="sup_art.php">Supprimer des articles</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Gestion des Categories<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="ajouter_cat.php">Ajouter des Categories</a>
                                </li>
                                <li>
                                    <a href="sup_cat.php">Supprimer des Categories</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="tables.html"><i class="fa fa-files-o fa-fw"></i> Gestion des Evenement<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="ajouter_eve.php">Ajouter des Evenement</a>
                                </li>
                                <li>
                                    <a href="sup_eve.php">Supprimer des Evenement</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Gestion des Destination<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="ajouter_des.php">Ajouter des Destination</a>
                                </li>
                                <li>
                                    <a href="sup_des.php">Supprimer des Destination</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="attacher.php"><i class="fa fa-dashboard fa-fw"></i> attacher des articles</a>
                        </li>
						<li>
                            <a href="lier.php"><i class="fa fa-table fa-fw"></i>  lier des articles</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter des destination</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Ajouter les informations sur une destination
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action ="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                        <div class="form-group">
                                            <label>CODE destination</label>
                                            <input name="acode" class="form-control">
                                        </div>
										
										<div class="form-group">
                                            <label>Nom destination</label>
                                            <input name="anom" class="form-control">
                                        </div>
										
                                        <button  name ="ok" type="submit" class="btn btn-default">Valider</button>
                                        <button type="reset" class="btn btn-default">Effacer</button>
                                    </form>
									<?php
									if(isset($_POST['ok']))
									{
									$code=$_POST['acode'];
									$nom=$_POST['anom'];
									$sql=mysql_query("insert into destination values('$code','$nom')");
									if($sql){echo "bien ajouter";}else{echo "non ajouter";}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>

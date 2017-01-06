<!DOCTYPE html>
<?php
include 'connect.php';
// include 'securite.php';
$sql="select * from article ";
$redsql= mysql_query($sql);
$cmd="select count(*) from avis";
$count= mysql_query($cmd);
$pop=mysql_fetch_assoc($count);
$ms="select * from avis order by date desc limit 0,5 ";
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
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css?" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- revoir le conflict avec les icones -->
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
					   
                        <li><a href="../../PHP/logout.php"><i class="fa fa-sign-out fa-fw"></i> Deconexion</a>
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
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Gestion des articles<span class="fa arrow"></span></a>
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
                            <a href="lier.php"><i class="fa fa-table fa-fw"></i> lier des articles</a>
                        </li>
<!--  -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
                <!-- /.sidebar-collapse -->
    </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenue Administrateur Giftzz</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Information sur les articles 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>COD_ARTICLE</th>
                                            <th>CODE_CAT</th>
                                            <th>LIBELLE_ARTICLE</th>
                                            <th>PRIX</th>
                                            <th>IMAGE</th>
											<th>DESCRIPTION</th>
                                            <th>QTE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr class="gradeA">
                                            <td><?php echo $lire['COD_ARTICLE'];?></td>
                                            <td><?php echo $lire['CODE_CAT'];?></td>
                                            <td><?php echo $lire['LIBELLE_ARTICLE'];?></td>
                                            <td class="center"><?php echo $lire['PRIX']." DH";?></td>
                                            <td class="center"><?php echo $lire['IMAGE'];?></td>
											<td class="center"><?php echo $lire['DESCRIPTION'];?></td>
                                            <td class="center"><?php echo $lire['QTE'];?></td>
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive --> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Information sur les utilisateur 
                        </div>
<?php $sql="select * from utilisateur ";
$redsql= mysql_query($sql);?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <th>EMAIL_UTILI</th>
                                            <th>NOM_UTILI</th>
                                            <th>PRENOM_UTIL</th>
                                            <th>pseudo</th>
											 <th>DATE_NAISS_UTIL</th>
                                            <th>ADRESSE_UTIL</th>
                                            <th>TYPE_UTILI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr>
                                            <td><?php echo $lire['EMAIL_UTILI'];?></td>
                                            <td><?php echo $lire['NOM_UTILI'];?></td>
                                            <td><?php echo $lire['PRENOM_UTIL'];?></td>
                                            <td><?php echo $lire['pseudo'];?></td>
											<td><?php echo $lire['DATE_NAISS_UTIL'];?></td>
                                            <td><?php echo $lire['ADRESSE_UTIL'];?></td>
                                            <td><?php echo $lire['TYPE_UTILISATEUR'];?></td>
                                        </tr>
                                     <?php }?>      
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Categories
                        </div>
<?php 
$sql="select * from Categorie ";
$redsql= mysql_query($sql);
?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>CODE Categorie</th>
                                            <th>NOM Categorie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 <?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr>
                                            <td><?php echo $lire['CODE_CAT'];?></td>
                                            <td><?php echo $lire['NOM_CAT'];?></td>
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Destination
                        </div>
<?php 
$sql="select * from Destination ";
$redsql= mysql_query($sql);
?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Destination</th>
                                            <th>NOM Destination</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 <?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr>
                                            <td><?php echo $lire['ID_DES'];?></td>
                                            <td><?php echo $lire['NOM_DES'];?></td>
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           evenement
                        </div>
<?php 
$sql="select * from evenement ";
$redsql= mysql_query($sql);
?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID EVENEMENT</th>
                                            <th>NOM EVENEMENT</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									 <?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr>
                                            <td><?php echo $lire['ID_EVENEMENT'];?></td>
                                            <td><?php echo $lire['NOM_EVENEMENT'];?></td>
                                     <?php }?>       
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           les articles attacher à des evenements
                        </div>
<?php 
$sql="select * from attacher ";
$redsql= mysql_query($sql);
?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>CODE ARTICLE</th>
                                            <th>ID EVENEMENT</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									 <?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr>
                                            <td><?php echo $lire['COD_ARTICLE'];?></td>
                                            <td><?php echo $lire['ID_EVENEMENT'];?></td>
                                        <?php }?>           
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            les articles lier à des Destination
                        </div>
<?php 
$sql="select * from lier ";
$redsql= mysql_query($sql);
?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>CODE ARTICLE</th>
                                            <th>ID Destination</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									 <?php while($lire=mysql_fetch_assoc($redsql)){?>
                                        <tr>
                                            <td><?php echo $lire['COD_ARTICLE'];?></td>
                                            <td><?php echo $lire['ID_DES'];?></td>
                                       <?php }?>          
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>

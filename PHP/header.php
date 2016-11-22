<script src="../js/panier.js"></script>
<?php

                      if(isset($_SESSION['id'],$_SESSION['role'])){
						 if($_SESSION['role'] == 0 ){
						  echo '<div class="col-sm-8">
						        <div class="shop-menu pull-right">
							    <ul class="nav navbar-nav">
								<li><a href="Compte.php"><i class="fa fa-desktop"></i> Bienvenu '.$_SESSION['id'].'</a></li>
								<li><a href="panier-details.php"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								<li><a href="panier-details.php"><i class="fa-fa-crosshairs"></i></a></li>
								<li><a href="PHP/logout.php" class="active"><i class="fa fa-unlock"></i>Deconexion</a></li>
						     	</ul>
					        	</div>
					            </div>';
						 }else if($_SESSION['role'] == 1 ){
							 echo '<div class="col-sm-8">
						        <div class="shop-menu pull-right">
							    <ul class="nav navbar-nav">
								<li><a href="Compte.php"><i class="fa fa-desktop"></i> Bienvenu '.$_SESSION['id'].'</a></li>
								<li><a href="admin/pages/index.php"><i class="fa fa-pencil-square-o"></i>Panel Admin</a></li>
								<li><a href="panier-details.php"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								<li><a href="panier-details.php"><i class="fa-fa-crosshairs"></i></a></li>
								<li><a href="PHP/logout.php" class="active"><i class="fa fa-unlock"></i>Deconexion</a></li>
						     	</ul>
					        	</div>
					            </div>';
						 }
					  }else{
						  						 echo  '<div class="col-sm-8">
						        <div class="shop-menu pull-right">
							    <ul class="nav navbar-nav">
								<li><a href="panier-details.php"><i class="fa fa-shopping-cart"></i> Panier</a></li>
								<li><a href="panier-details.php"><i class="fa-fa-crosshairs"></i></a></li>
								<li><a href="login.php" class="active"><i class="fa fa-lock"></i> Login</a></li>
						     	</ul>
					        	</div>
					            </div>';
					  }
					  
					  ?>
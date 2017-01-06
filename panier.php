<?php
require_once 'connect.php';
require_once 'count.php';
$p=0;
$q=0;
$a=Objet::instance("article");
extract($_POST);
if($action == "addpanier")
{
	$_SESSION['cart'][]=$id;
	echo "oui";	
}
if($action == "getpanier")
{
if(isset($_SESSION['cart']))
{
	$som=0;
	foreach($_SESSION['cart'] as $k=>$v)
	{
		$a->COD_ARTICLE=$v;
		$a->find_one();
		$som += $a->PRIX;
		$total=$som;
	}
	echo'<li><a href="panier-details.php"><i class="fa fa-crosshairs"></i> '.count($_SESSION['cart']).' Produit(s) Total est : '.$som.' € </a></li>';
	
    }
	else
	{
	echo'<li><a href="panier-details.php"><i class="fa fa-crosshairs"></i> 0 Produit(s) Total est : 0 € </a></li>';	
	}
}
if($action == "getcommand")
{
	if(isset($_SESSION['cart'])){
		foreach(countproduct($_SESSION['cart'])as $k=>$v)
		{
			$a->COD_ARTICLE=$k;
			$a->find_one();
		    echo'<tr>
					        <td class="cart_product">
								<a href="product-details.php?COD_ARTICLE='.$a->COD_ARTICLE.'"><img src="images/small/'.$a->IMAGE.'" alt=""></a>
							</td>
							<td class="cart_description">
							
								<h4><a href="product-details.php?COD_ARTICLE='.$a->COD_ARTICLE.'">'.$a->LIBELLE_ARTICLE.'</a></h4><br>
								<p>Web ID:'.$a->COD_ARTICLE.'</p>
							</td>
							<td class="cart_price">
								<p>'.$a->PRIX.' €</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""></a>
									<input class="cart_quantity_input" type="text" name="quantity" value="'.$v.'" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""></a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.$a->PRIX*$v.' €</p>
							</td>
							<td class="cart_delete">
								<a onclick="deleteart('.$k.') ; return false" ;class=cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
				</tr>';		
				$p=$p+($a->PRIX*$v);
				$q=$q+$v;
				$newqte=0;
				//$qtedb=mysql_query("select qte from article where COD_ARTICLE=".$a->COD_ARTICLE);
				//$newqte=$qtedb-$v;
				//mysql_query("update article set QTE = $newqte where COD_ARTICLE =".$a->COD_ARTICLE);
		}	
	}
echo'<tr class="table table-condensed total-result"><td><h3>
	<form action="indexpaypal.php" method="POST">
	Total : '.$p.' € </br></br>
	&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="hidden" name="prix" value='.$p.' />
	<input type="hidden" name="qte" value='.$q.' />
	<input type="submit" class="btn btn-default" name="ok" value="Acheter" >
	</form></h3></td></tr>';
}
if($action=="deleteart"){
	foreach($_SESSION['cart'] as $v => $c){
		if($id==$c){
			unset($_SESSION['cart'][$v]);
		}
	}
}

?>
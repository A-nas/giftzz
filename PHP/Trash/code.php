<?php
if(isset($_SESSION['re_mail'],$_SESSION['re_pseudo'])){
  if($_SESSION['isemail']){
	  echo 'etes vous sur de renitialiser votre Compte GiftZZ';  
  }else{
	  echo //input
  }

  }else header("Location: forgot.php");
?>
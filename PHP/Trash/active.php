<?php 
require "PHP/config.php";
require "PHP/PasswordHash.php";
//if(isset($_GET['email'],$_GET['hash'])){}
// selectionne le compte en question avec le hash existant et activation 1 
// si le hash correspond a l'hash de la bd qui corrspond a l'email dans l'url on echo un formulaire de changement de mdp et on valide sinn le lien est expiré ou n'existe pas.
if(isset($_POST['submit'])){
	// enregistrer le nv mdp et passer le hash a null
	  $pass1 = mysql_real_escape_string($_POST['password1']);
	  $pass2 = mysql_real_escape_string($_POST['password2']);
	  if($pass1 === $pass2){
		  $pass1 = create_hash($pass1);
		  //$query = $bdd->prepare("update utilisateur set MOT_DE_PASS_UTIL = ? and hash = NULL where EMAIL_UTILI = ? ");
		  // UPDATE `giftzz`.`utilisateur` SET `MOT_DE_PASS_UTIL` = 'ceci est un mdp' WHERE `utilisateur`.`EMAIL_UTILI` = 'anass.laghouaouta@gmail.com'
          $query = $bdd->prepare("UPDATE `giftzz`.`utilisateur` SET `MOT_DE_PASS_UTIL` = ?  , `hash` = NULL WHERE `utilisateur`.`EMAIL_UTILI` = ?");		  
	      $query->execute(array($pass1,$_SESSION['emailcb']));
		  $message = 'Votre mot de passe a ete changée , veuillez vous authentifier votre nouveau mot de passe';
		  //echo 'mot de passe == '.$pass1.'email =='.$_SESSION['emailcb'].'';
		  unset($_SESSION['emailcb']);
	  }else $message = 'mot de passe non identique';
}else{
	  if(isset($_GET['email'],$_GET['hash'])){
	  $email = mysql_real_escape_string($_GET['email']);
      $hash = mysql_real_escape_string($_GET['hash']);
      $query = $bdd->prepare("select * from utilisateur where EMAIL_UTILI = ? and hash = ? and activation = 1 and hash is not NULL");
      $query->execute(array($email,$hash));
         if($query->rowCount() > 0){
					   echo '<form action="active.php" id="main-contact-form" class="contact-form row" name="contact-form" method="POST">				            
				            <div class="form-group col-md-12">
				            <input type="password" name="password1" class="form-control" required="required" placeholder="mot de passe">
				            <div class="form-group col-md-12">
				            <input type="password" name="password2" class="form-control" required="required" placeholder="mot de passe">
				            </div>
				            <div class="form-group col-md-12">
				            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Envoyer">
				            </div>
				            </form>';
							$message = 'veuillez rentrer votre nouveau mot de passe';
							$_SESSION['emailcb']=$email;					
							//$_SESSION['']=;
         } else $message = 'Lien non valide ou expiré ! ';
     } else $message = 'Page Introuvable'; // parametres manquates
}
echo $message;
?>
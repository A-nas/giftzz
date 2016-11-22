<?php
require "config.php";           
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    $query = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE EMAIL_UTILI = ? and hash = ? and activation = 0 and hash is not null');
    if($query->execute(array($email,$hash)))
	{
		//echo $query[0];
		if($query->fetchcolumn()>0){
			//si le hash passé en url et le hash de la bd sont egaux on renitialise le hash a NULL et on active le compte
			//si le comptee a ete deja activé et le hash existe donc une demande de renitialisation de mot de passe a ete passé
			//on remet le hash a NULL si le lien n'est pas clické dans une periode de 1h (trigger).
			//si le compte est active et le hash a NULL donc tt vas bien 
			//si le le compte n'est pas active et le hash sur NULL (ce cas est impossible a le realiser) sinn il ya une erreur;
			// optimiser avec une date d'expiration ^_^ forget the trigger :p.
			$query = $bdd->prepare('Update utilisateur set activation = 1, hash = NULL where EMAIL_UTILI = ? '); // and hash = ?
			$query->execute(array($email));
			echo '<div class="statusmsg">Votre compte a ete activé, vous pouvez desormais vous connectez</div>';
			
		}else echo '<div class="statusmsg">l\' url est invalide ou vous avez deja activer votre compte.</div>';// No match -> invalid url or account has already been activated.
        
	}else echo '<div class="statusmsg">une erreur est survenu veillez ressayer uterierement</div>';
   //********************************************************************              
//*****************************************************************************************************************
}else echo '<div class="statusmsg">Approche non valide, s\'il vous plait utilisez le lien qui vous a ete envoye a votre e-mail.</div>';
?>
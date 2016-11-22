<?php
session_start();
//if(isset($_SESSION['mail'])) $_SESSION['mail']='';
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=giftzz', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
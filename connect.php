<?php
@mysql_connect('localhost','root','');
mysql_select_db('giftzz')or die ("erreur connexion avec la base de donnée");
require_once 'objet.php';
 session_start();
?>
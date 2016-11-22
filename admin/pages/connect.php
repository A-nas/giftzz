<?php
session_start();
@mysql_connect('localhost','root','');
mysql_select_db('giftzz')or die ("erreur connexion avec la base de donnée");
?>
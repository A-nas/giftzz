<?php
   require "config.php";
   session_destroy();
   header("Location: ../login.php"); //  a modifer apres ^__^ 
?>
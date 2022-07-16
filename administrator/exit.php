<?php
session_start(); 
if(isset($_POST['logout_admin']))
  {
          session_unset(); 
	  session_destroy(); 
  	  //unset($_SESSION['logout_master']);
	  header('location:login.php');
	  exit;
  }


?>

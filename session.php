<?php
session_start();
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
         $session = $_SESSION['loginuser'];
         echo $session['first_name'];
    }


if (isset($_GET['sion']) && $_GET['sion'] == 'logout') {
	
		session_unset();
    header("location:login.php");
	
    
 }
 
?>
<?php
include "../core/carteR.php";
session_start();
$idclient=$_SESSION['Id'];
if(isset($_POST['verif']))
{$test = new CarteR();
if($test->verfier($idclient))
	 
	exit("desactiver");
else
	exit("activer");}
?>
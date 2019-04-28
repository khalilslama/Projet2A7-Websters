<?php
	include "../../entities/rdvc.php";
	session_start();
	$idclient=$_SESSION['Id'];
	$date=$_POST['date'];
	$type=$_POST['type'];
	if($type=="1")
	{
		$type="Retouche";
	}
	else
	{
		$type="Essayage";
	}
	$status="Non confirmé";
	$rdvc = new rdvc($idclient,$date,$type,$status);
	$rdvc->addrdvc();
	//header("location:RendezVousClient.html");
?>
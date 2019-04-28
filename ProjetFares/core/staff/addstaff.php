<?php
	include "../../entities/staff.php";
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	$mdp = implode($pass);
	$staff = new staff($nom,$prenom,$telephone,$email,$mdp);
	$staff->addstaff();
	$rdvprof = new rdvprof("","","","","","","","","","","","","");
	$rdvprof->embauche($_POST['id'],$email,$mdp);
	//header("location:../../views/stafftable.php");
?>
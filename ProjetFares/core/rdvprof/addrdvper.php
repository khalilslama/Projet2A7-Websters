	<?php
	include "../../entities/rdvper.php";
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$region = $_POST['region'];
		$localite = $_POST['localite'];
		$nivetud = $_POST['nivetud'];
		$date = $_POST['date'];
		$diplome = $_POST['diplome'];
		$spec = $_POST['spec'];
		$adresse = $_POST['adresse'];
		$piccv =  addslashes(file_get_contents($_FILES['piccv']['tmp_name']));
		$status="Non confirmé";
		$rdvprof =  new rdvprof($nom,$prenom,$telephone,$email,$region,$localite,$nivetud,$date,$diplome,$spec,$adresse,$piccv,$status);
		$rdvprof->addrdvper();
	header("location:../../views/RendezVousProfessionel.html");
?>
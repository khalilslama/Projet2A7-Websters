<?php
	include "rdvper.php";
	class staff{
		private $nom;
		private $prenom;
		private $telephone;
		private $email;
		private $mdp;
		
		function __construct($nom,$prenom,$telephone,$email,$mdp)
		{
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->telephone=$telephone;
			$this->email=$email;
			$this->mdp=$mdp;
		}
		
		function addstaff()
		{
			$sql="insert into staff(nom,prenom,telephone,email,mdp) values(:nom,:prenom,:telephone,:email,:mdp)";
			$db=config::getConnexion();
			try
		{
			$req=$db->prepare($sql);
			$nom=$this->nom;
			$prenom=$this->prenom;
			$telephone=$this->telephone;
			$email=$this->email;
			$mdp=$this->mdp;
			$req->bindValue(':nom',$nom);
			$req->bindValue(':prenom',$prenom);
			$req->bindValue(':telephone',$telephone);
			$req->bindValue(':email',$email);
			$req->bindValue(':mdp',$mdp);
			$req->execute();
		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
		}
	}
?>
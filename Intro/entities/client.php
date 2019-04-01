<?php

class Client 
{
	private $Nom;
	private $Prenom;
	private $Email;
	private $Numero;
	private $Mdp;
	private $avatar;
	private $DatCreation;
	private $Tourpoitrine;
	private $tourtaille;
	private $tourbassin;
	private $L_taille;
	private $H_poitrine;
	private $E_poitrine;
	private $Carruredos;
	private $Carruredevant;
	private $L_epaule;
	private $Grosseurbras;
	private $Tourpoignet;
	private $Hauteurgenou;
	private $L_taille_terre;
	private $Longeurtotale;

	 function getEmail(){
		return $this->Email;
	}
	function getNom(){
		return $this->Nom;
	}
	function getPrenom(){
		return $this->Prenom;
	}
	function getNumero(){
		return $this->Numero;
	}
	function getMdp(){
		return $this->Mdp;
	}
	
	function __construct($Nom,$Prenom,$Email,$Mdp,$Numero)
	{
		$this->Nom=$Nom;
		$this->Prenom=$Prenom;
		$this->Email=$Email;
		$this->Mdp=$Mdp;
		$this->Numero=$Numero;
	}
	



	
}

?>
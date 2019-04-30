<?php
 /**
  * 
  */
 class Carte 
 {
 	private $datactivation;
 	private $idclient;
 	function __construct($id)
 	{
 		$this->idclient=$id;
 	}
 	function getid(){
 		return $this->idclient;
 	}
 }

?>
<?php
	include "config.php";
	class rdvc{
		private $idclient;
		private $daterdvc;
		private $type;
		private $status;
		
		function __construct($idclient,$date,$type,$status)
		{
			if($idclient=="")
			{
				$this->idclient="1";
			}
			else
			{
				$this->idclient=$idclient;
			}
			$this->daterdvc=$date;
			$this->type=$type;
			$this->status=$status;
			
		}
		
		function addrdvc()
		{
			$sql="insert into rdvc(idclient,date,type,status)
			values(:idclient,:date,:type,:status)";
			$db=config::getConnexion();
			try
		{
			$req=$db->prepare($sql);
			$date=$this->daterdvc;
			$type=$this->type;
			$status=$this->status;
			$idclient=$this->idclient;
			$req->bindValue(':idclient',$idclient);
			$req->bindValue(':date',$date);
			$req->bindValue(':type',$type);
			$req->bindValue(':status',$status);
			$req->execute();
		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
		}
	}
?>
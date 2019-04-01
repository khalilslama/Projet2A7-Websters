<?php
include "config.php";
class CarteR
{
	function ajoutercaret($client)
	{
        $bdd = config::getConnexion();
		try{
		$req= $bdd->prepare("INSERT INTO carte(Idclient,DateActivation) VALUES(:id,CURDATE())");
		$clientid=$client->getid();
         
		 $req->bindValue(':id',$clientid);
		 
		
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }



	}
	function suppcarte($client)
	{
            $sql="DELETE FROM carte where Idclient= :id";
            $bdd = config::getConnexion();
            $req=$bdd->prepare($sql);
            $idclient=$client->getid();
            $req->bindValue(':id',$idclient);
            try{
             $req->execute();
           // header('Location: index.php');
             }
            catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            }
	}
	function verfier($idclient)
	{
              $bdd = config::getConnexion();
              $verif = $bdd->prepare('SELECT Id FROM carte WHERE Idclient=?');
              $verif->execute(array($idclient));
              $user = $verif->fetch();
              if($user)
              {
                return true;
              }
              else
              	return false;
	}
}







?>
<?php
include "config.php";
/**
 * 
 */
class ClientR 
{   
       function verifieremail($email)
       {      $bdd = config::getConnexion();
              $verif = $bdd->prepare('SELECT Id FROM client WHERE Email=?');
              $verif->execute(array($email));
              $user = $verif->fetch();
              if($user)
              {
                return false;
              }
              else
              	return true;
       }
       function verfiernumero($numero)
       {    $bdd = config::getConnexion();
            $verif = $bdd->prepare('SELECT Id FROM client WHERE Numero=?');
              $verif->execute(array($numero));
              $user = $verif->fetch();
              if($user)
              {
                return false;
              }
              else
              	return true;


       }
	
	function ajouter2($Myclient)
	{
        
        $bdd = config::getConnexion();
		try{
		$req= $bdd->prepare("INSERT INTO client(Email,Nom,Prenom,Numero,Mdp,DatCreation) VALUES(:email,:nom,:prenom,:numero,:mdp,CURDATE())");
		 $nom=$Myclient->getNom();
         $prenom=$Myclient->getPrenom();
         $email=$Myclient->getEmail();
         $numero=$Myclient->getNumero();
         $password=$Myclient->getMdp();
		 $req->bindValue(':email',$email);
		 $req->bindValue(':nom',$nom);
		 $req->bindValue(':prenom',$prenom);
		 $req->bindValue(':numero',$numero);
		 $req->bindValue(':mdp',$password);
		
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
                     
                     


	}
  function updateclient($nom,$prenom,$email,$num,$idclient){
        $bdd = config::getConnexion();
        $req = $bdd->prepare("UPDATE client SET Nom = :nom , Prenom = :prenom ,
                Email = :email , Numero = :numero WHERE Id = :id");
                 $req->bindValue(':email',$email);
                 $req->bindValue(':nom',$nom);
                 $req->bindValue(':prenom',$prenom);
                 $req->bindValue(':numero',$num);
                 $req->bindValue(':id',$idclient);
                 $req->execute();

           }
           function updateimg($idclient,$extension)
           {
             $bdd = config::getConnexion();
             $req = $bdd->prepare('UPDATE client SET avatar = :avatar WHERE Id = :id');
             
               $nomphoto=$idclient.".".$extension;
               $req->bindValue(':avatar',$nomphoto);
               $req->bindValue(':id',$idclient);
               $req->execute();
           }
           function supprimerclient($idclient)
           {

            $sql="DELETE FROM client where Id= :id";
            $bdd = config::getConnexion();
            $req=$bdd->prepare($sql);
            $req->bindValue(':id',$idclient);
            try{
            $req->execute();
           // header('Location: index.php');
             }
            catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            }
           }
	
}







?>